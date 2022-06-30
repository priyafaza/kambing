@extends('layouts.user')

@section('title') My Withdrawal @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Withdrawal</h3>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h2>Saldo : {{ formatPrice($wallet['cash']) }}</h2>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addWithdrawal"><i
                            class="fas fa-wallet"></i>
                        Withdrawal
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Date Withdrawal</th>
                            <th>Amount</th>
                            <th>Withdrawal Proof</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction['created_at']->format('Y-m-d H:i') }}</td>
                                <td>{{ formatPrice($transaction['amount']) }}</td>
                                <td>{!! $transaction['payment_proof_link'] !!}</td>
                                <td>{{ $transaction['status'] }}</td>
                                <td>
                                    @if($transaction['description'] !== null)
                                        @foreach(json_decode($transaction['description'], true) as $name => $value)
                                            {{ $name }} : {{ $value }}<br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if($transaction['status'] === \App\Models\Transaction::STATUS_WAITING_APPROVAL)
                                        <a href="#"
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

    <div id="addWithdrawal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Withdrawal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('my.withdrawal.submit') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Amount Withdrawal</label>
                            <input type="number" class="form-control" min="0" name="amount" required>
                        </div>
                        <div class="form-group">
                            <label>Alasan penarikan</label>
                            <textarea class="form-control" rows="4" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop
