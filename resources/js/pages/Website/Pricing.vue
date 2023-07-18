<template>
    <Head title="Pricing" />
    <WebsiteLayout>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-4xl text-center">
                    <h2 class="text-base font-semibold leading-7 text-themeColor">{{ page[1].body }}</h2>
                    <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">{{ page[2].body }}</p>
                </div>

                <div class="isolate mx-auto mt-10 grid max-w-md grid-cols-1 gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <template v-for="plan in plans">
                        <div v-if="plan.plan_name != 'Free Trial'" :class="[plan.recommended == '1' ? 'bg-themeColor ring-themeColor' : 'ring-gray-200', 'rounded-3xl p-8 ring-1 xl:p-10']">
                            <h3 :id="plan.id" :class="[plan.recommended == '1' ? 'text-white' : 'text-gray-900', 'text-lg font-semibold leading-8']">{{ plan.plan_name }}</h3>
                            <p :class="[plan.recommended == '1' ? 'text-gray-300' : 'text-gray-600', 'mt-4 text-sm leading-6']">{{ plan.plan_description }}</p>
                             <p class="mt-6 flex items-baseline gap-x-1">
                                <span :class="[plan.recommended == '1' ? 'text-white' : 'text-gray-900', 'text-4xl font-bold tracking-tight']">${{ plan.plan_price }}</span>
                                <span :class="[plan.recommended == '1' ? 'text-gray-300' : 'text-gray-600', 'text-sm font-semibold leading-6']">Per Month</span>
                            </p>
                            <Link :href="route('register')" :class="[plan.recommended == '1' ? 'bg-white/10 text-white hover:bg-white/20 focus-visible:outline-white' : 'bg-themeColor text-white shadow-sm hover:opacity-80 focus-visible:outline-indigo-600', 'mt-6 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2']">Buy</Link>
                            <ul role="list" :class="[plan.recommended == '1' ? 'text-gray-300' : 'text-themeColor', 'mt-8 space-y-3 text-sm leading-6 xl:mt-10']">
                                <!-- QR Code Types -->
                                <li class="flex">
                                    <span aria-hidden="true">
                                        <svg class="w-6 h-6"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span :class="[plan.recommended == '1' ? 'text-gray-300' : 'text-gray-600']">
                                        {{ plan.no_access_qr == '999' ? Unlimited : plan.no_access_qr }} QRCode Types
                                    </span>
                                </li>

                                <!-- QRCodes -->
                                <li class="flex">
                                    <span aria-hidden="true">
                                        <svg class="w-6 h-6"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span :class="[plan.recommended == '1' ? 'text-gray-300' : 'text-gray-600']">
                                        {{ plan.no_qrcodes == '999' ? Unlimited : plan.no_qrcodes }} QRCodes
                                    </span>
                                </li>

                                <!-- BarCodes -->
                                <li class="flex">
                                    <span aria-hidden="true">
                                        <svg class="w-6 h-6"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span :class="[plan.recommended == '1' ? 'text-gray-300' : 'text-gray-600']">
                                        {{ plan.no_barcodes == '999' ? Unlimited : plan.no_barcodes }} Barcodes
                                    </span>
                                </li>

                                <!-- Additional Tools -->
                                <li class="flex">
                                    <span v-if="plan.additional_tools === 1">
                                        <svg class="w-6 h-6"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span v-else>
                                        <svg
                                            class="w-5 h-5"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <path d="M10 10l4 4m0 -4l-4 4"></path>
                                        </svg>
                                    </span>
                                    <span :class="[plan.recommended == '1' ? 'text-gray-300' : 'text-gray-600']">
                                        Additional Tools
                                    </span>
                                </li>

                                <!-- Enable Analytics -->
                                <li class="flex">
                                    <span v-if="plan.enable_analaytics === 1">
                                        <svg class="w-6 h-6"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span v-else>
                                        <svg
                                            class="w-5 h-5"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <path d="M10 10l4 4m0 -4l-4 4"></path>
                                        </svg>
                                    </span>
                                    <span :class="[plan.recommended == '1' ? 'text-gray-300' : 'text-gray-600']">
                                        Enable Analytics
                                    </span>
                                </li>

                                <!-- Hide Branding -->
                                <li class="flex">
                                    <span v-if="plan.hide_branding === 1">
                                        <svg class="w-6 h-6"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span v-else>
                                        <svg
                                            class="w-5 h-5"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <path d="M10 10l4 4m0 -4l-4 4"></path>
                                        </svg>
                                    </span>
                                    <span :class="[plan.recommended == '1' ? 'text-gray-300' : 'text-gray-600']">
                                        Hide Branding
                                    </span>
                                </li>

                                <!-- Support -->
                                <li class="flex">
                                    <span v-if="plan.support === 1">
                                        <svg class="w-6 h-6"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span v-else>
                                        <svg
                                            class="w-5 h-5"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <path d="M10 10l4 4m0 -4l-4 4"></path>
                                        </svg>
                                    </span>
                                    <span :class="[plan.recommended == '1' ? 'text-gray-300' : 'text-gray-600']">
                                        Support
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </WebsiteLayout>
</template>

<script setup>

const props = defineProps({
    plans: Object,
    settings: Object,
    currency: Object,
    config: Object,
    page: Object
});

</script>
