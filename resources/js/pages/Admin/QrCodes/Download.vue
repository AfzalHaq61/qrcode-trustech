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
                                            <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24"
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
                                    <div @click="open = true">
                                        <PrimaryButton>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-share"
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
                                        <PrimaryButton @click="downloadQrCode()">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon-tabler icon-tabler-download" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                <polyline points="7 11 12 16 17 11"></polyline>
                                                <line x1="12" y1="4" x2="12" y2="16"></line>
                                            </svg>
                                        </PrimaryButton>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <TransitionRoot as="template" :show="open">
            <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <DialogTitle as="h3" class="flex justify-center text-base font-semibold leading-6 text-gray-900">Share</DialogTitle>
                            <div class="my-10">
                                <div class="w-full">
                                    <TextInput id="qrLink" :value="$page.props.imagePath + qrcode_details.qr_code" type="text"/>
                                </div>
                                <div class="flex justify-center gap-x-1 mt-4">
                                    <!-- Facebook -->
                                    <a @click="link('facebook')" id="facebook" target="_blank" class="p-1 bg-gradient-to-tl from-gray-900 to-gray-700 rounded-md text-white cursor-pointer" aria-label="Facebook">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                                        </svg>
                                    </a>

                                    <!-- Twitter -->
                                    <a @click="link('twitter')" id="twitter" target="_blank" class="p-1 bg-gradient-to-tl from-gray-900 to-gray-700 rounded-md text-white cursor-pointer" aria-label="Twitter">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- LinkedIn -->
                                    <a @click="link('linkedin')" id="linkedin" class="p-1 bg-gradient-to-tl from-gray-900 to-gray-700 rounded-md text-white cursor-pointer" aria-label="LinkedIn">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-linkedin"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                            <line x1="8" y1="11" x2="8" y2="16"></line>
                                            <line x1="8" y1="8" x2="8" y2="8.01"></line>
                                            <line x1="12" y1="16" x2="12" y2="11"></line>
                                            <path d="M16 16v-3a2 2 0 0 0 -4 0"></path>
                                        </svg>
                                    </a>

                                    <!-- WhatsApp -->
                                    <a @click="link('whatsapp')" id="whatsapp" target="_blank" class="p-1 bg-gradient-to-tl from-gray-900 to-gray-700 rounded-md text-white cursor-pointer" aria-label="Whatsapp">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                                            <path
                                                d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Telegram -->
                                    <a @click="link('telegram')" id="telegram" target="_blank" class="p-1 bg-gradient-to-tl from-gray-900 to-gray-700 rounded-md text-white cursor-pointer" aria-label="Telegram">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4"></path>
                                        </svg>
                                    </a>

                                    <!-- Email -->
                                    <a @click="link('email')" id="email" class="p-1 bg-gradient-to-tl from-gray-900 to-gray-700 rounded-md text-white cursor-pointer" aria-label="Email">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                            <polyline points="3 7 12 13 21 7"></polyline>
                                        </svg>
                                    </a>

                                    <!-- Copy link -->
                                    <button @click="link('copylink')" id="copylink" type="button" class="p-1 bg-gradient-to-tl from-gray-900 to-gray-700 rounded-md text-white cursor-pointer" data-clipboard-target="#qrLink" title="{{ __('Copy') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="8" y="8" width="12" height="12" rx="2"></rect>
                                            <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 px-10">
                        <CancelButton @click="open = false" class="w-full">Cancel</CancelButton>
                    </div>
                    </DialogPanel>
                </TransitionChild>
                </div>
            </div>
            </Dialog>
        </TransitionRoot>
    </AdminLayout>
</template>

<script setup>
import TextInput from '@/Components/TextInput.vue';
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'

const open = ref(false);

const qrcodeImage = ref(null);

const props = defineProps({
    qrcode_details: Object,
    config: Object,
    shareContent: Object,
});

const shareContent = props.config[30].config_value;
shareContent.replace();
//$shareContent = str_replace("{ appName }", env('APP_NAME'), $shareContent);
//$shareContent = str_replace("{ qr_code_link }", asset($qrcode_details->qr_code), $shareContent);

const appUrl=  computed(() => usePage().props.appUrl).value;
const imgUrl=  computed(() => usePage().props.imagePath).value;

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
    
    // Get the QR code image URL
    const qrCodeImageUrl = appUrl + props.qrcode_details.qr_code; // Replace with the actual URL of your QR code image
    console.log(qrCodeImageUrl);
    // Create an anchor element
    const downloadLink = document.createElement("a");
    downloadLink.href = qrCodeImageUrl;

    // Set the download attribute to specify the file name
    downloadLink.download = props.qrcode_details.name + '.png';

    // Append the anchor element to the document body
    document.body.appendChild(downloadLink);

    // Simulate a click event to trigger the download
    downloadLink.click();

    // Remove the anchor element from the document body
    document.body.removeChild(downloadLink);
}

function link(data){
    //  alert(appUrl);$page.props.imagePath + qrcode_details.qr_code
    if(data == 'facebook'){
    var facebookLink = 'https://www.facebook.com/sharer.php?u=' +  imgUrl+props.qrcode_details.qr_code+ '&t=' + props.shareContent;
    facebookLink = facebookLink.replace(':qrCodeId', data);
    var facebookLinkPreview = document.getElementById("facebook");
    facebookLinkPreview.setAttribute("href", facebookLink);
    }
    if(data == 'twitter'){

        // Set Twitter link
    var twitterLink = 'https://twitter.com/intent/tweet?text='+ props.shareContent;
    twitterLink = twitterLink.replace(':qrCodeId', data);
    var twitterLinkPreview = document.getElementById("twitter");
    twitterLinkPreview.setAttribute("href", twitterLink);


    }
    if(data == "linkedin"){

        // Set LinkedIn link
    var linkedInLink = 'http://www.linkedin.com/shareArticle?mini=true&url=' + imgUrl+props.qrcode_details.qr_code + '&title=This is your QR code link&summary=This is your QR code link&source='+appUrl;
    linkedInLink = linkedInLink.replace(':qrCodeId', data);
    var linkedInLinkPreview = document.getElementById("linkedin");
    linkedInLinkPreview.setAttribute("href", linkedInLink);

    }

    if(data == "whatsapp"){

// Set Whatsapp link
    var whatsappLink = 'https://api.whatsapp.com/send?text='+ props.shareContent;
    whatsappLink = whatsappLink.replace(':qrCodeId', data);
    var whatsappLinkPreview = document.getElementById("whatsapp");
    whatsappLinkPreview.setAttribute("href", whatsappLink);

}

if(data == "telegram"){

// Set Telegram link
var telegramLink = 'https://telegram.me/share/url?text='+ props.shareContent + 'url=' + imgUrl+props.qrcode_details.qr_code;
    telegramLink = telegramLink.replace(':qrCodeId', data);
    var telegramLinkPreview = document.getElementById("telegram");
    telegramLinkPreview.setAttribute("href", telegramLink);

}


if(data == "email"){

    // Set Email link
    var emailLink = 'mailto:?subject=My QR Code&amp;body=This is your QR code link :'+ imgUrl+props.qrcode_details.qr_code;
    emailLink = emailLink.replace(':qrCodeId', data);
    var emailLinkPreview = document.getElementById("email");
    emailLinkPreview.setAttribute("href", emailLink);

}
}
</script>
