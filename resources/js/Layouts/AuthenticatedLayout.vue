<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Sidebar from './Partials/Sidebar.vue';
import Header from './Partials/Header.vue';
import Footer from './Partials/Footer.vue'

const showingNavigationDropdown = ref(false);
</script>

<template>
    <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
        <!-- Sidebar  -->
        <Sidebar/>
        <!-- Page Content -->
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            <!-- Navbar -->
            <Header/>
            <slot />
        </main>
    </body>
</template>
