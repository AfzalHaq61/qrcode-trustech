@extends('qrcode.layout.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        @php
            $decodedData = json_decode($content);
        @endphp
        <div class="card px-3" style="width: 60vh;">
            <div class="card-header d-flex justify-content-center">
                <h1>Wifi</h1>
            </div>
            <div class="card-body py-4">
                <div class="row">
                    <div class="col-4">
                        <h4 class="mb-3">Network:</h4>
                        <h4 class="mb-3">Security:</h4>
                        <h4 class="mb-3">Password:</h4>
                        <h4 class="mb-3">Hidden:</h4>
                    </div>
                    <div class="col-8">
                        <p>{{ $decodedData->wifi_ssid_value }}</p>
                        <p>{{ $decodedData->wifi_encryption_value }}</p>
                        <p>{{ $decodedData->wifi_password_value }}</p>
                        @if ($decodedData->wifi_is_hidden_value == 1)
                            <p>Yes</p>
                        @else
                            <p>No</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
