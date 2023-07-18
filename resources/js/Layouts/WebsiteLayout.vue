<template>
    <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
        <!-- Page Content -->
        <main>
            <div>
                <!-- Navbar -->
                <Header :page="page"/>
                <slot />
            </div>

            <!-- Footer -->
            <Footer />
        </main>
    </body>
</template>

<script setup>

import Header from './WebsitePartials/Header.vue';
import Footer from './WebsitePartials/Footer.vue'

const props = defineProps({
    page: Object
});

</script>

<!--Add color theme-->
<script>
export default {

    data: () => ({
        color: "",
    }),

    mounted() {
        let value = this.$page.props.themeColor;

        this.color = value.config_value;
        if (this.color) {
            document.documentElement.style.setProperty('--color-primary', this.color);
        }

    },
}
</script>
