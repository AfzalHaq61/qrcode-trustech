@extends('qrcode.layout.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        @php
            $decodedData = json_decode($content);
        @endphp
        <div class="card px-3" style="width: 60vh;">
            <div class="card-header d-flex justify-content-center">
                <h1>Event</h1>
            </div>
            <div class="card-body py-4">
                <div class="row">
                    <div class="col-4">
                        <h4 class="mb-3">Title:</h4>
                        <h4 class="mb-3">Messege:</h4>
                        <h4 class="mb-3">Start Time:</h4>
                        <h4 class="mb-3">End Time:</h4>
                        <h4 class="mb-3">Location:</h4>
                    </div>
                    <div class="col-8">
                        <p>{{ $decodedData->event_name_value }}</p>
                        <p>{{ $decodedData->event_location_value }}</p>
                        <p>{{ $decodedData->event_start_datetime_value }}</p>
                        <p>{{ $decodedData->event_end_datetime_value }}</p>
                        <p>{{ $decodedData->event_note_value }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
