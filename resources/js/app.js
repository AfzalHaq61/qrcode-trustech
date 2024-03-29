// import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import WebsiteLayout from "@/Layouts/WebsiteLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import UserLayout from "@/Layouts/UserLayout.vue";
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Pagination from "@/Components/Shared/Pagiantion.vue";
import Notifications from "@/Components/Shared/Notifications.vue";
import Accordian from "@/Components/Shared/Accordian.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DashboardButton from '@/Components/DashboardButton.vue';
import BackButton from '@/Components/BackButton.vue';
import CancelButton from '@/Components/CancelButton.vue';
import Checkbox from '@/Components/Checkbox.vue';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .component('WebsiteLayout', WebsiteLayout)
            .component('AdminLayout', AdminLayout)
            .component('UserLayout', UserLayout)
            .component('ApplicationLogo', ApplicationLogo)
            .component('Pagination', Pagination)
            .component('Notifications', Notifications)
            .component('Accordian', Accordian)
            .component('DashboardButton', DashboardButton)
            .component('PrimaryButton', PrimaryButton)
            .component('BackButton', BackButton)
            .component('CancelButton', CancelButton)
            .component('Checkbox', Checkbox)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
