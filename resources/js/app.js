// import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import Layout from "@/Layouts/AuthenticatedLayout.vue";
import Footer from '@/Layouts/Partials/Footer.vue'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .component('Layout', Layout)
            .component('Footer', Footer)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
