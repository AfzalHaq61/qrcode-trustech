<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import Header from './GuestLayoutPartials/Header.vue';
import Footer from './GuestLayoutPartials/Footer.vue';
</script>

<template>
    <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
        <!-- Navbar -->
        <Header/>
        <!-- Content -->
        <main class="mt-0 transition-all duration-200 ease-soft-in-out">
            <slot />
        </main>
        <Footer/>
        <!-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <Link href="/">
                    <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                </Link>
            </div>

            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
            >
                <slot />
            </div>
        </div> -->
    </body>
</template>
