@extends('qrcode.layout.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        @php
            $decodedData = json_decode($content);
        @endphp
        <div class="card px-3" style="width: 60vh;">
            <div class="card-header d-flex justify-content-center">
                <h1>UPI Payment</h1>
            </div>
            <div class="card-body py-4">
                <div class="row">
                    <div class="col-4">
                        <h4 class="mb-3">UPI ID / VPA:</h4>
                        <h4 class="mb-3">Payee Name:</h4>
                        <h4 class="mb-3">Upi Email:</h4>
                        <h4 class="mb-3">Currency:</h4>
                        <h4 class="mb-3">Amount:</h4>
                        <h4 class="mb-3">Remarks:</h4>
                    </div>
                    <div class="col-8">
                        <p>{{ $decodedData->upi_id_value }}</p>
                        <p>{{ $decodedData->upi_payee_name_value }}</p>
                        <p><a href="{{ $decodedData->upi_payee_email_value }}">Upi Email</a>
                        </p>
                        <p>{{ $decodedData->upi_currency_value }}</p>
                        <p>{{ $decodedData->upi_amount_value }}</p>
                        <p>{{ $decodedData->upi_msg_value }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
