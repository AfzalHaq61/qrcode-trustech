<template>
    <Head title="QR Code Download" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Download QR Code</h6>
                        </div>
                        <div id="printable-area" class="flex-auto px-0 pt-0 pb-2">
                            <div class="flex items-center justify-center p-6 overflow-x-auto">
                                <!-- Show Bar code -->
                                <img class="w-96 h-96" :src="$page.props.imagePath + qrcode_details.qr_code">
                            </div>
                        </div>

                        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <div class="text-center">    
                                <h6>Options</h6>
                            </div>
                            <div class="flex-auto px-0 pt-0 pb-2">
                                <div class="flex items-center justify-center pt-2 pb-6 overflow-x-auto space-x-2">
                                    <div @click="printQrCode">
                                        <PrimaryButton>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                                <rect x="7" y="13" width="10" height="8" rx="2" />
                                            </svg>
                                        </PrimaryButton>
                                    </div>
                                    <div>
                                        <PrimaryButton>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-share"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="6" cy="12" r="3"></circle>
                                                <circle cx="18" cy="6" r="3"></circle>
                                                <circle cx="18" cy="18" r="3"></circle>
                                                <line x1="8.7" y1="10.7" x2="15.3" y2="7.3"></line>
                                                <line x1="8.7" y1="13.3" x2="15.3" y2="16.7"></line>
                                            </svg>
                                        </PrimaryButton>
                                    </div>
                                    <div>
                                    <a :download="qrcode_details.name" :href="$page.props.imagePath + qrcode_details.qr_code">
                                        <PrimaryButton>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-download" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                <polyline points="7 11 12 16 17 11"></polyline>
                                                <line x1="12" y1="4" x2="12" y2="16"></line>
                                            </svg>
                                        </PrimaryButton>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { computed, ref } from 'vue';

const qrcodeImage = ref(null);

const props = defineProps({
    qrcode_details: Object,
    config: Object
});

function printQrCode() {
    const printQrCode = document.getElementById('printable-area');
    if (printQrCode) {
        const originalContents = document.body.innerHTML;
        const newContents = printQrCode.innerHTML;
        document.body.innerHTML = newContents;
        window.print();
        document.body.innerHTML = originalContents;
    } else {
        console.error('Print content element not found.');
    }
};

function downloadQrCode() {
    const printQrCode = document.getElementById('printable-area');
    if (printQrCode) {
        const originalContents = document.body.innerHTML;
        const newContents = printQrCode.innerHTML;
        document.body.innerHTML = newContents;
        window.print();
        document.body.innerHTML = originalContents;
    } else {
        console.error('Print content element not found.');
    }
};
</script>
