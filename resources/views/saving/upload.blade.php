@extends('layouts.user')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Payment Confirmation</h3>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center">Total Payment</h4>
                            <h2 class="text-center">{{ formatPrice($transaction['amount']) }}</h2>
                            <p>No.Rekening Perusahaan</p>
                            <p>Bank Name: BCA</p>
                            <p>Bank Account Name : PT.Blalblabla</p>
                            <p>Bank Account Number : 123456</p>
                            <hr>
                            <form action="{{ route('my.saving.upload.payment', $transaction['id']) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Upload Bukti Transfer</label>
                                <input type="file" name="payment_proof" class="form-control" required>
                                <br>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>

                        <!-- /.card-body -->
                    </div>
                </div><!-- /.container-fluid -->
    </section>
@endsection
