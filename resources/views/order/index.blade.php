@extends('layouts.user')

@section('title') Order @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h1>Stock udangKambing lagi banyak guys, buruan di order say</h1>
                        <a href="{{ route('my.order.new') }}" class="btn btn-success">Beli sekarang</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Order List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Address</th>
                                <th>Total item</th>
                                <th>Option</th>
                                <th>Amount</th>
                                <th>Wallet Cash</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order['shipping_address'] }}</td>
                                    <td>{{ $order['total_item'] }} ({{ $order['total_weight'] }})</td>
                                    <td>{{ $order['shipping']}}</td>
                                    <td>{{ $order['amount'] }}</td>
                                    <td>{{ $order['saldo'] }}</td>
                                    <td>{{ $order['total_payment'] }}</td>
                                    <td>{{ $order['status'] }}</td>
                                    <td>
                                        <a href="/my/order/invoice/{{ $order['id'] }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
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
