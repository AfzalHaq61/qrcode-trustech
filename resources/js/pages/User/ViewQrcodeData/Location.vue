@extends('qrcode.layout.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        @php
            $decodedData = json_decode($content);
        @endphp
        <div class="card px-5" style="width: 60vh;">
            <div class="card-header d-flex justify-content-center">
                <h1>Location</h1>
            </div>
            <div class="card-body py-3">
                <div class="row">
                    <div class="col-6">
                        <h4 class="mb-3">Latitude:</h4>
                        <h4 class="mb-3">Longitude:</h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $decodedData->location_latitude_value }}</p>
                        <p>{{ $decodedData->location_longitude_value }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
