@extends('layouts.guest')

@section('content')
{{-- 429 --}}
<section class="relative py-24 md:py-44 lg:py-64 bg-white"
    style="background-image: url('{{ asset('images/web/elements/pattern-white.svg') }}'); background-position: center;">
    <div class="relative z-10 container px-4 mx-auto">
        <div class="max-w-4xl mx-auto text-center">
            <span
                class="inline-block py-px px-2 mb-4 text-xs leading-5 text-green-500 bg-green-100 font-medium rounded-full shadow-sm">Error
                {{ __('429') }}</span>
            <h2 class="mb-4 text-4xl md:text-5xl leading-tight font-bold tracking-tighter">{{ __('Too Many Requests') }}
            </h2>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-auto py-1 md:py-0 md:mr-6"><a
                        class="hidden lg:inline-block py-2 px-6 bg-green-500 hover:bg-green-600 text-sm text-white font-bold rounded-l-xl rounded-t-xl transition duration-200"
                        href="{{ route('web.index') }}">{{ __('Go back to Homepage') }}</a></div>
                <div class="w-full md:w-auto py-1 md:py-0"><a
                        class="hidden lg:inline-block py-2 px-6 bg-gray-900 hover:bg-gray-600 text-sm text-white font-bold rounded-l-xl rounded-t-xl transition duration-200"
                        href="{{ url()->previous() }}">{{ __('Try Again') }}</a></div>
            </div>
        </div>
    </div>
    <img class="absolute top-0 left-0 w-28 md:w-auto" src="{{ asset('images/web/elements/wave2-yellow.svg') }}" alt="">
    <img class="absolute right-6 top-6 w-28 md:w-auto" src="{{ asset('images/web/elements/dots3-green.svg') }}" alt="">
    <img class="absolute right-0 bottom-0 w-28 md:w-auto" src="{{ asset('images/web/elements/wave3-red.svg') }}" alt="">
    <img class="absolute left-6 bottom-6 w-28 md:w-auto" src="{{ asset('images/web/elements/dots3-violet.svg') }}"
        alt="">
</section>
@endsection