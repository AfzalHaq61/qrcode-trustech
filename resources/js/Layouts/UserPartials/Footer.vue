<template>
    <footer class="pt-4">
        <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
         
         <p class="mt-10 text-center text-xs leading-5 text-gray-500">&copy; {{ currentYear }} {{ $page.props.appName }}. All rights reserved.</p>
       </div>
    </footer>
</template>
<script setup>
import { ref } from 'vue';
const currentYear = ref(new Date().getFullYear());
</script>
