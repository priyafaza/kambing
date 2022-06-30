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
                        <button class="btn btn-success" data-toggle="modal" data-target="#addWithdrawal"><i class="fas fa-plus"></i>
                            Withdrawal
                        </button>
                        <div class="row">
                            <div class="col-12">
                                <h2>Saldo : </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Date Withdrawal</th>
                            <th>Amount</th>
                            <th>Withdrawal Proof</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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

    <div id="addSaldo" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Withdrawal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Amount Withdrawal</label>
                            <input type="number" class="form-control" name="withdrawal" required>
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
