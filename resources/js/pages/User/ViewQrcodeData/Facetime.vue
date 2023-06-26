@extends('qrcode.layout.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        @php
            $decodedData = json_decode($content);
        @endphp
        <div class="card px-3" style="width: 60vh;">
            <div class="card-header d-flex justify-content-center">
                <h1>FaceTime</h1>
            </div>
            <div class="card-body py-4">
                <div class="row">
                    <div class="col-4">
                        <h4 class="mb-3">Facetime Info:</h4>
                    </div>
                    <div class="col-8">
                        <p>{{ $decodedData->facetime_value }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
