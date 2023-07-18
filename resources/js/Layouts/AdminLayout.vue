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

<script setup>
import { ref } from 'vue';
import Sidebar from '@/Layouts/AdminPartials/Sidebar.vue';
import Header from '@/Layouts/AdminPartials/Header.vue';
import Footer from '@/Layouts/AdminPartials/Footer.vue'

const showingNavigationDropdown = ref(false);
</script>

<!--Add color theme-->
<script>
export default {

  data: () => ({
    color: "",
  }),

  mounted(){
  let value = this.$page.props.themeColor;

  this.color = value.config_value;
    if(this.color){
       document.documentElement.style.setProperty('--color-primary', this.color);
    }

  },
}
</script>
