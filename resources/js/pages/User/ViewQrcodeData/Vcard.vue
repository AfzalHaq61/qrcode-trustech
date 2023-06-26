@extends('qrcode.layout.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        @php
            $decodedData = json_decode($content);
        @endphp
        <div class="card px-3" style="width: 60vh;">
            <div class="card-header d-flex justify-content-center">
                <h1>Contact Information</h1>
            </div>
            <div class="card-body py-4">
                <div class="row">
                    <div class="col-4">
                        <h4 class="mb-3">Name:</h4>
                        <h4 class="mb-3">Contact:</h4>
                        <h4 class="mb-3">Email:</h4>
                        <h4 class="mb-3">Web Link:</h4>
                        <h4 class="mb-3">Company:</h4>
                        <h4 class="mb-3">Job Position:</h4>
                        <h4 class="mb-3">DOB:</h4>
                        <h4 class="mb-3">Street:</h4>
                        <h4 class="mb-3">City:</h4>
                        <h4 class="mb-3">Postal Code:</h4>
                        <h4 class="mb-3">Region:</h4>
                        <h4 class="mb-3">Country:</h4>
                        <h4 class="mb-3">More Info:</h4>
                    </div>
                    <div class="col-8">
                        <p>{{ $decodedData->vcard_first_name_value }} {{ $decodedData->vcard_last_name_value }}</p>
                        <p>{{ $decodedData->vcard_phone_value }}</p>
                        <p>{{ $decodedData->vcard_email_value }}</p>
                        <p><a href="{{ $decodedData->vcard_url_value }}">{{ $decodedData->vcard_url_value }}</a></p>
                        <p>{{ $decodedData->vcard_company_value }}</p>
                        <p>{{ $decodedData->vcard_job_title_value }}</p>
                        <p>{{ $decodedData->vcard_birthday_value }}</p>
                        <p>{{ $decodedData->vcard_street_value }}</p>
                        <p>{{ $decodedData->vcard_city_value }}</p>
                        <p>{{ $decodedData->vcard_postal_value }}</p>
                        <p>{{ $decodedData->vcard_region_value }}</p>
                        <p>{{ $decodedData->vcard_country_value }}</p>
                        <p>{{ $decodedData->vcard_note_value }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
