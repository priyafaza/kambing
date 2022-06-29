@extends('layouts.user')

@section('title') My Saving @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Saving</h3>
                    </div>
                </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td>Deposit</td>
                                            <td colspan="2"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%"> 40% Complete (success)
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addSaving"><i
                                class="fas fa-plus"></i> Go Saving Today
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date Saving</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> </td>
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

    <div id="addSaving" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Saving</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" min="0" class="form-control" name="amount" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="{{ route('my.saving.upload') }}" class="btn btn-success">Saving Now</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop
