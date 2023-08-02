<template>
    welcome welcome welcome welcome welcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcomewelcome welcome welcome welcome
<div class="w-full max-w-sm p-8 bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border relative overflow-hidden">
    <!-- Check plan is "recommended" -->
    <div v-if="plan[0].recommended == '0'" class="absolute right-0 top-0 h-16 w-16">
        <div class="absolute transform rotate-45 bg-green-600 text-center text-white font-semibold py-1 right-[-35px] top-[32px] w-[170px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
            </svg>
        </div>
    </div>

    <div class="font-bold text-5xl text-slate-700">
        <span class="block mb-5">${{ plan[0].plan_price }}</span>
        <h5 class="font-bold text-sm text-slate-700">Per Month</h5>
    </div>

    <hr class="h-px my-5 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <ul role="list">
        <li class="flex space-x-3">
            <span class="font-bold text-sm text-slate-700">{{ plan[0].plan_description }}</span>
        </li>

        <!-- QRCode Types -->
        <li class="flex">
            <span class="font-bold text-sm text-slate-700 mr-2">{{ plan[0].no_access_qr == '999' ? 'Unlimited' : plan[0].no_access_qr }} QRCode Types</span>
            <div class="flex items-center justify-center font-bold text-xs text-slate-700 bg-gray-100 rounded-full w-6 cursor-pointer hover:bg-fuchsia-600 hover:text-white" data-bs-toggle="tooltip"
                data-bs-placement="top"
                :title="plan.access_types">?
            </div>
        </li>

        <!-- No. Of QRCodes -->
        <li>
            <span class="font-bold text-sm text-slate-700">{{ plan[0].no_qrcodes == '999' ? 'Unlimited' : plan[0].no_qrcodes }} QRCodes</span>
        </li>

        <!-- No. Of Barcodes -->
        <li>
            <span class="font-bold text-sm text-slate-700">{{ plan[0].no_barcodes == '999' ? 'Unlimited' : plan[0].no_barcodes }} Barcodes</span>
        </li>

        <hr class="h-px my-5 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

        <!-- Additional Tools -->
        <li>
            <span v-if="plan[0].additional_tools == '1'">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l5 5l10 -10" />
                </svg>
            </span>
            <span v-else>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-danger"
                    width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="18" y1="6" x2="6"
                        y2="18" />
                    <line x1="6" y1="6" x2="18"
                        y2="18" />
                </svg>
            </span>
            <span class="font-bold text-sm text-slate-700">Additional Tools</span>
        </li>

        <!-- Enable Analytics -->
        <li>
            <span v-if="plan[0].enable_analaytics == '1'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </span>
                <span v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-danger"
                        width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="18" y1="6" x2="6"
                            y2="18" />
                        <line x1="6" y1="6" x2="18"
                            y2="18" />
                    </svg>
                </span>
            <span class="font-bold text-sm text-slate-700">Enable Analytics</span>
        </li>

        <!-- Hide Branding -->
        <li>
            <span v-if="plan[0].hide_branding == '1'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </span>
                <span v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-danger"
                        width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="18" y1="6" x2="6"
                            y2="18" />
                        <line x1="6" y1="6" x2="18"
                            y2="18" />
                    </svg>
                </span>
            <span class="font-bold text-sm text-slate-700">Hide Branding</span>
        </li>

        <!-- Support -->
        <li>
            <span v-if="plan[0].support == '1'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-success"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </span>
                <span v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 text-danger"
                        width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="18" y1="6" x2="6"
                            y2="18" />
                        <line x1="6" y1="6" x2="18"
                            y2="18" />
                    </svg>
                </span>
            <span class="font-bold text-sm text-slate-700">Support</span>
        </li>
    </ul>

    <div class="mt-10">
        <Link :href="route('user.checkout', { id: plan[0].id })"
            class="w-full inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-themeColor hover:scale-102 hover:shadow-soft-xs active:opacity-85">
            Choose plan
        </Link>
    </div>
</div>
</template>
<script setup>

const props = defineProps({
    plan: Object,
    currency: Object
});

</script>
