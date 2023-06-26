@extends('qrcode.layout.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        @php
            $decodedData = json_decode($content);
        @endphp
        <div class="card px-3" style="width: 60vh;">
            <div class="card-header d-flex justify-content-center">
                <h1>PDF</h1>
            </div>
            <div class="card-body d-flex justify-content-center py-4">
                <iframe src="{{ Storage::url($decodedData->pdf_path_value) }}" width="60%" height="400px"></iframe>
            </div>
        </div>
    </div>
@endsection
