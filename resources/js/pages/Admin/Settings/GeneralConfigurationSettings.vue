<template>
    <SettingSideBarLayout>
        <div class="col-span-8 w-full px-6 py-6 mx-auto">
            <!-- General Configuration Settings -->
            <form @submit.prevent="submit" role="form">

                <h6 class="text-lg font-bold dark:text-white">General Configuration Settings</h6>

                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <!-- Script Type -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="app_type">Application Type <span class="text-red-600">*</span></Label>
                        <div class="sm:col-span-3">
                            <select v-model="form.app_type"  class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" required>
                                <option value="QRCODE">QR Code</option>
                                <option value="BARCODE">Barcode</option>
                                <option value="BOTH">Both</option>
                            </select>
                        </div>
                    </div>

                    <!-- Timezone -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="timezone">Timezone <span class="text-red-600">*</span></Label>
                        <select  v-model="form.timezone"   class="focus:ring-themeColor focus:shadow-themeColor  focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" required>
                            <option v-for="timezone in timezonelist" :value="timezone">{{ timezone }}</option>
                        </select>
                    </div>

                    <!-- Currency -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="currency">Currency <span class="text-red-600">*</span></Label>
                        <select  v-model="form.currency" class="focus:ring-themeColor focus:shadow-themeColor  focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" required>
                            <option v-for="currency in  currencies" :value=" currency.name ">{{ currency.name }}</option>
                        </select>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <!-- Default Plan Term Detting -->
                    <div class="sm:col-span-2">
                        <h6 class="text-themeColor">Default Plan Term Settings</h6>
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="term">Default Plan Term <span class="text-red-600">*</span></Label>
                        <select v-model="form.term"  class="focus:ring-themeColor focus:shadow-themeColor  focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" required>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>

                    <!-- Cookie Consent Settings -->
                    <div class="sm:col-span-2">
                        <h6 class="text-themeColor">Cookie Consent Settings</h6>
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="cookie">Cookie Consent Settings <span class="text-red-600">*</span></Label>
                        <select v-model="form.cookie"  class="focus:ring-themeColor focus:shadow-themeColor  focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" required>
                            <option value="true">Enable</option>
                            <option value="">Disable</option>
                        </select>
                    </div>

                    <!-- Image Upload Limit -->
                    <div class="sm:col-span-2">
                        <h6 class="text-themeColor">Image Upload Limit</h6>
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="image_limit">Size</Label>
                        <input
                            type="number"
                            class="focus:ring-themeColor focus:shadow-themeColor  focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.image_limit"
                            ref="input"
                            required
                        />
                    </div>
                </div>

                <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-themeColor">Share Content Setting</h6>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <!-- Share Content Settings -->
                    <div class="sm:col-span-4">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="share_content">Share Content<span class="text-red-600"> *</span></Label>
                        <textarea id="message" v-model="form.share_content" rows="4" class="focus:shadow-themeColor  focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" placeholder="Write your thoughts here..." required></textarea>
                        <InputError class="mt-2"  />
                    </div>

                    <!-- Short codes -->
                    <div class="sm:col-span-2">
                        <label class="font-bold mt-6 mb-2">Short Codes:</label>
                        <div>
                            <span class="text-xs block">##QRLINK## - QR Code Image Link</span>
                            <span class="text-xs">##APPNAME## - APP NAME</span>
                        </div>
                    </div>
                </div>

                <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-themeColor">Tawk Chat Settings</h6>
                </div>

                <!-- Tawk Chat Settings -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="tawk_chat_bot_key">Tawk Chat URL (s1.src)<span class="text-red-600"> *</span></Label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                https://embed.tawk.to/
                                </span>
                                <input type="text" v-model="form.tawk_chat_bot_key" id="website-admin" class="focus:shadow-themeColor focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-tr-lg rounded-br-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" placeholder="Tawk Chat Key" required>
                            </div>
                        <InputError class="mt-2"  />
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
import { usePage } from '@inertiajs/vue3'
import SettingSideBarLayout from '../../../AdminSettingLayout/sidebar.vue'
import { useForm } from '@inertiajs/vue3';

const page = usePage();

const props = defineProps({
    settings: Object,
    timezonelist: Object,
    currencies: Object,
    config: Object,
});

const form = useForm({
    app_type: page.props.APP_TYPE,
    timezone: props.config[2].config_value,
    currency: props.config[1].config_value,
    term: props.config[8].config_value,
    cookie: page.props.COOKIE_CONSENT_ENABLED,
    image_limit: page.props.SIZE_LIMIT,
    share_content: props.config[30].config_value,
    tawk_chat_bot_key: props.settings.tawk_chat_bot_key ? props.settings.tawk_chat_bot_key : 'https://embed.tawk.to/',
});

const submit = () => {
    form.post(route('admin.change.general.settings'));
};
</script>
