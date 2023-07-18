<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Sidebar from './UserPartials/Sidebar.vue';
import Header from './UserPartials/Header.vue';
import Footer from './UserPartials/Footer.vue'

const showingNavigationDropdown = ref(false);
</script>

<template>


    <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
        <!-- Sidebar  -->
        <Sidebar/>
        <!-- Page Content -->
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full min-h-screen rounded-xl transition-all duration-200">
            <!-- Navbar -->
            <Header/>

            <slot />

            <!-- Footer -->
            <Footer />
        </main>
    </body>
</template>
