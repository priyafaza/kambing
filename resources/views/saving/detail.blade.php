@extends('layouts.user')

@section('title') {{ $saving['name'] }} @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $saving['name'] }}</h3>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Tujuan menabung</td>
                                        <td colspan="2">{{ $saving['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Target yang ingin dicapai</td>
                                        <td colspan="2">{{ formatPrice($saving['target']) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu ingin dicapai</td>
                                        <td colspan="2">{{ $saving['due_date']->format('j F Y') }}
                                            ({{ $saving['count_down'] }})
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Periode rutin menabung</td>
                                        <td colspan="2">{{ $saving['trans_period'] }} </td>
                                    </tr>
                                    <tr>
                                        <td>Rekomendasi menabung {{ $saving['trans_period'] }}</td>
                                        <td colspan="2">{{ formatPrice($saving['recommendation_amount']) }} setiap
                                            menabung
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tabungan yang sudah dikumpulkan</td>
                                        <td colspan="2">{{ formatPrice($saving['total']) }}
                                            dari {{ formatPrice($saving['target']) }} ({{ $saving['progress_percent'] }}
                                            %)
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar"
                             aria-valuenow="{{ $saving['progress_percent'] }}" aria-valuemin="0" aria-valuemax="100"
                             style="width:{{ $saving['progress_percent'] }}%"> {{ $saving['progress_percent'] }}%
                            Complete
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addSaving"><i
                            class="fas fa-plus"></i> Menabung sekarang
                    </button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Date Saving</th>
                            <th>Amount</th>
                            <th>Payment Proof</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($saving->transactions as $transaction)
                            <tr>
                                <td>{{ $transaction['created_at']->format('Y-m-d H:i') }}</td>
                                <td>{{ formatPrice($transaction['amount']) }}</td>
                                <td>
                                    @if($transaction['payment_proof'] !== null)
                                        <a href="{{ $transaction['payment_proof'] }}">Lihat bukti transfer</a>
                                    @else
                                        Belum ada bukti transfer
                                    @endif
                                </td>
                                <td>{{ $transaction['status'] }}</td>
                                <td>
                                    @if($transaction['status'] === \App\Models\Transaction::STATUS_PENDING)
                                        <a href="{{ route('my.saving.upload', $transaction['id']) }}"
                                           class="btn btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('my.saving.cancel', $transaction['id']) }}"
                                           class="btn btn-danger">
                                            <i class="fas fa-trash"></i> cancel
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    <div id="addSaving" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Menabung untuk {{ $saving['name'] }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('my.saving.detail.start',$saving['id']) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Anda ingin menabung berapa?</label>
                            <input type="number" min="0" class="form-control" name="amount" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Mulai</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop
