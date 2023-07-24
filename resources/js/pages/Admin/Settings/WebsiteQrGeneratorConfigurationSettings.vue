<template>
    <SettingSideBarLayout>
      <div class="col-span-8 w-full px-6 py-6 mx-auto">
        <!-- Website QR Generator Configuration Settings -->
        <form @submit.prevent="submit" role="form">
            <h6 class="text-lg font-bold dark:text-white">Website QR Generator Configuration Settings</h6>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-6 mt-10">
                <!-- Enable or disable QR -->
                <div class="sm:col-span-3">
                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Show QR Generator in Website<span class="text-red-600"> *</span></Label>
                    <select v-model="form.show"  class="focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" required>
                        <option value="1">Show</option>
                        <option value="0">Hide</option>
                    </select>
                </div>

                <!-- Maximum Generate Count for Customer IP Address -->
                <div class="sm:col-span-3">
                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Maximum QR Code Count<span class="text-red-600"> *</span></Label>
                    <input
                        type="text" name="qr_count" id="qr_count"
                        v-model="form.qr_count" placeholder="Maximum QR code count ..."
                        class="focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                    />
                    <span class="mb-2 ml-1 font-bold text-[10px] text-slate-700">Maximum QR Counts (per actions) that can be generated from ip address and per day</span>
                </div>
            </div>

            <div class="mt-5">
                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700">Accessable QR</Label>
            </div>

            <!-- Accessable QR -->
            <div class="grid grid-cols-5 gap-6">
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.text" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Text</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.url" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">URL</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.pdf" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">PDF</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.phone" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.sms" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">SMS</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.email" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.whatsapp" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">WhatsApp</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.facetime" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Location</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.location" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Facetime</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.wifi" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wifi</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.event" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Event</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.crypto" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Crypto</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.vcard" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">vCard</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.paypal" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Paypal</label>
                </div>
                <div class="flex">
                    <input id="inline-checkbox" type="checkbox" value="" v-model="form.upi" class="w-4 h-4 mt-0.5 text-themeColor bg-gray-100 border-gray-300 rounded focus:ring-themeColor dark:focus:ring-fuchsia-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">UPI</label>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    Update
                </PrimaryButton>
            </div>
        </form>
      </div>
    </SettingSideBarLayout>
</template>

<script setup>
import SettingSideBarLayout from '../../../AdminSettingLayout/sidebar.vue'
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    config: Object,
    settings: Object
});

const access = ref(JSON.parse(props.settings.accessable_qr));

const form = useForm({
    show: props.settings.show_qr,
    qr_count: props.settings.qr_count,
    text: access.value.text,
    url: access.value.url,
    pdf: access.value.pdf,
    phone: access.value.phone,
    sms: access.value.sms,
    email: access.value.email,
    whatsapp: access.value.whatsapp,
    facetime: access.value.facetime,
    location: access.value.location,
    wifi: access.value.wifi,
    event: access.value.event,
    crypto: access.value.crypto,
    vcard: access.value.vcard,
    paypal: access.value.paypal,
    upi: access.value.upi,
});

const submit = () => {
    form.post(route('admin.change.website.qr.generator.settings'));
};

</script>
