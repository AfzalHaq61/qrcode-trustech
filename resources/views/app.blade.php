<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Fetch project name dynamically -->
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    {{-- CSS --}}
    @vite('resources/css/app.css')

    <!-- Scripts -->
    @vite('resources/js/app.js') @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
