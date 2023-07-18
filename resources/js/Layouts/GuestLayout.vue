<script setup>
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
    </body>
</template>
