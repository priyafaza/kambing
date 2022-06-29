@extends('layouts.admin')

@section('title') Saving User @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Waiting Approval Saving List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                                <th>Name Saving</th>
                                <th>Deposit</th>
                                <th>Payment Proof</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction['created_at']->format('Y-m-d H:i') }}</td>
                                    <td>{{ $transaction['wallet']['user']['name'] }}<br>Saldo : {{ formatPrice($transaction['wallet']['cash']) }}</td>
                                    <td>{{ $transaction['savingRelation']['name'] }}</td>
                                    <td>{{ formatPrice($transaction['amount']) }}</td>
                                    <td>
                                        @if($transaction['payment_proof'] !== null)
                                            <a href="{{ $transaction['payment_proof'] }}">Lihat bukti transfer</a>
                                        @else
                                            Belum ada bukti transfer
                                        @endif
                                    </td>
                                    <td>
                                        @if($transaction['status'] === \App\Models\Transaction::STATUS_WAITING_APPROVAL)
                                            <div class="row">
                                                <div class="col-6">
                                                    <form action="{{ route('saving.update', $transaction['id']) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="PATCH">
                                                        <input type="hidden" name="status" value="{{ \App\Models\Transaction::STATUS_SUCCESS }}">
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-6">
                                                    <form action="{{ route('saving.update', $transaction['id']) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="PATCH">
                                                        <input type="hidden" name="status" value="{{ \App\Models\Transaction::STATUS_FAILED }}">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                                    </form>
                                                </div>
                                            </div>
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
@stop
