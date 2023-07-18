<template>
    <Head title="QrCode" />
    <WebsiteLayout :page="page">
        <!-- Banner -->
        <Banner :page="page" :config="config"></Banner>

        <!-- Feature -->
        <Feature :page="page"></Feature>

        <!-- QrCodes -->
        <Qrcode :page="page"></Qrcode>

        <!-- pricing -->
        <Pricing :plans="plans" :page="page"></Pricing>

    </WebsiteLayout>
</template>

<script setup>
import Banner from '@/Components/Home/Banner.vue';
import Feature from '@/Components/Home/Feature.vue';
import Qrcode from '@/Components/Home/Qrcode.vue';
import Pricing from '@/Components/Home/Pricing.vue';

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    plans: Object,
    settings: Object,
    currency: Object,
    config: Object,
    page: Object
});

</script>
