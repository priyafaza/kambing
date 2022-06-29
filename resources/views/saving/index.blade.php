@extends('layouts.user')

@section('title') Saving @stop

@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <button class="btn btn-success" data-toggle="modal" data-target="#addSaldo"><i class="fas fa-wallet"></i> Make Saving</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Tabungan</h3>

                                <div class="card-tools">
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body text-center">
                               <p>Tabungan Ku</p>
                               <a href="{{ route('my.saving.detail') }}" class="btn btn-info">See Saving</a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="addSaldo" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Saving</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" min="0" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Target</label>
                            <input type="text" min="0" class="form-control" name="target" required>
                        </div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <input type="number" min="0" class="form-control" name="duedate" required>
                        </div>
                        <div class="form-group">
                            <label>period</label>
                            <input type="number" min="0" class="form-control" name="period" required>
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
