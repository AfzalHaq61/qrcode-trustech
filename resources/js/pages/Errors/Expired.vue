// @extends('layouts.guest')

// @section('content')
// {{-- 401 --}}
// <section class="relative py-24 md:py-44 lg:py-64 bg-white"
//     style="background-image: url('{{ asset('images/web/elements/pattern-white.svg') }}'); background-position: center;">
//     <div class="relative z-10 container px-4 mx-auto">
//         <div class="max-w-4xl mx-auto text-center">
//             <span
//                 class="inline-block py-px px-2 mb-4 text-xs leading-5 text-green-500 bg-green-100 font-medium rounded-full shadow-sm">Error
//                 {{ __('401') }}</span>
//             <h2 class="mb-4 text-4xl md:text-5xl leading-tight font-bold tracking-tighter">{{ __('Unauthorized') }}
//             </h2>
//             <div class="flex flex-wrap justify-center">
//                 <div class="w-full md:w-auto py-1 md:py-0 md:mr-6"><a
//                         class="hidden lg:inline-block py-2 px-6 bg-green-500 hover:bg-green-600 text-sm text-white font-bold rounded-l-xl rounded-t-xl transition duration-200"
//                         href="{{ route('web.index') }}">{{ __('Go back to Homepage') }}</a></div>
//                 <div class="w-full md:w-auto py-1 md:py-0"><a
//                         class="hidden lg:inline-block py-2 px-6 bg-gray-900 hover:bg-gray-600 text-sm text-white font-bold rounded-l-xl rounded-t-xl transition duration-200"
//                         href="{{ url()->previous() }}">{{ __('Try Again') }}</a></div>
//             </div>
//         </div>
//     </div>
//     <img class="absolute top-0 left-0 w-28 md:w-auto" src="{{ asset('images/web/elements/wave2-yellow.svg') }}" alt="">
//     <img class="absolute right-6 top-6 w-28 md:w-auto" src="{{ asset('images/web/elements/dots3-green.svg') }}" alt="">
//     <img class="absolute right-0 bottom-0 w-28 md:w-auto" src="{{ asset('images/web/elements/wave3-red.svg') }}" alt="">
//     <img class="absolute left-6 bottom-6 w-28 md:w-auto" src="{{ asset('images/web/elements/dots3-violet.svg') }}"
//         alt="">
// </section>
// @endsection

<template>
    <section>
          <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
            <div class="container z-10">
              <div class="flex flex-wrap mt-0 -mx-3">
                <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                  <div class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                      <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">401 - Unauthorized</h3>
                      <p class="mb-0">You are not authorized to access this page.</p>
                    </div>
                    <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                      <p class="mx-auto mb-6 leading-normal text-sm">
                        <router-link to="/" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Go to Homepage</router-link>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
                  <div class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                    <div class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10" style="background-image: url('assets/img/curved-images/curved6.jpg')"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
</template>
