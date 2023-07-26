<template>      
    <SettingSideBarLayout>
        <div class="col-span-8 w-full px-6 py-6 mx-auto">
            <!-- Update Google Settings -->
            <form @submit.prevent="submit" role="form">
                
                <h6 class="text-lg font-bold dark:text-white">Google Configuration Settings</h6>
                
                <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-themeColor-600/100">Google reCAPTCHA Configuration Settings</h6>
                </div>

                <div class="grid grid-cols-1 gap-6  sm:grid-cols-6">
                    <!-- Google reCAPTCHA Settings -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="recaptcha_enable">reCaptcha Enable</Label>
                        <div class="sm:col-span-3">
                            <select v-model="form.recaptcha_enable" name="recaptcha_enable" id="recaptcha_enable" 
                                class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                                <option value="on">On</option>
                                <option value="off">Off</option>
                            </select>
                            <span class="mb-2 ml-1 font-bold text-[10px] text-slate-700">if you did not get a reCAPTCHA (v2 Checkbox), create a <a href="https://www.google.com/recaptcha/about/" class="text-themeColor-600/100 text-sm">reCAPTCHA</a>.</span>
                        </div>                 
                    </div>

                    <!-- reCAPTCHA Site Key -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="recaptcha_site_key">reCAPTCHA Site Key</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.recaptcha_site_key"
                            name="recaptcha_site_key"
                            id="recaptcha_site_key"
                            placeholder="reCAPTCHA Site Key ..."
                            ref="input"
                            readonly
                        />
                    </div>

                    <!-- reCAPTCHA Secret Key -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="recaptcha_secret_key">reCAPTCHA Secret Key</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.recaptcha_secret_key"
                            name="recaptcha_secret_key"
                            id="recaptcha_secret_key"
                            placeholder="reCAPTCHA Secret Key ..."
                            ref="input"
                            readonly
                        />
                    </div>
                </div>

                <!-- Google OAuth Settings -->
                <div class="mt-10 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-themeColor-600/100">Google OAuth Configuration Settings</h6>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-12">
                    <!-- Google Auth Enable -->
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="google_auth_enable">Google Auth Enable</Label>
                        <select v-model="form.google_auth_enable" name="google_auth_enable" id="google_auth_enable"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                            <option value="on">On</option>
                            <option value="off">Off</option>
                        </select>
                    </div>

                    <!-- Google Client ID -->
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="google_client_id">Google Client ID</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.google_client_id"
                            name="google_client_id"
                            id="google_client_id"
                            placeholder="Google CLIENT ID ..."
                            ref="input"
                            readonly
                        /> 
                    </div>

                    <!-- Google Client Secret -->
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="google_client_secret">Google Client Secret</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.google_client_secret"
                            name="google_client_secret"
                            id="google_client_secret"
                            placeholder="Google CLIENT Secret ..."
                            ref="input"
                            readonly
                        /> 
                    </div>

                    <!-- Google Redirect -->
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="google_redirect">Google Redirect</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.google_redirect"
                            name="google_redirect"
                            id="google_redirect"
                            placeholder="Google Redirect ..."
                            ref="input"
                            readonly
                        /> 
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-12">
                    <div class="sm:col-span-8">
                        <span class="mb-2 ml-1 font-bold text-[10px] text-slate-700">if you did not get a google OAuth Client ID & Secret Key, follow a <a href="https://support.google.com/cloud/answer/6158849?hl=en#zippy=%2Cuser-consent%2Cpublic-and-internal-applications%2Cauthorized-domains/" class="text-themeColor-600/100 text-sm">steps</a>.</span>
                    </div>
                </div>  

                <!-- Google Analytics ID -->
                <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-themeColor-600/100">Google Analytics Configuration Settings</h6>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Google Analytics ID<span class="text-red-600"> *</span></Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.google_analytics_id"
                            name="google_analytics_id"
                            id="google_analytics_id"
                            placeholder="Google Analytics ID ..."
                            ref="input"
                            required
                        />
                        <span class="mb-2 ml-1 font-bold text-[10px] text-slate-700">if you did not get a google analytics id, create a <a href="https://analytics.google.com/analytics/web/" class="text-themeColor-600/100 text-sm">new analytics id.</a></span>
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

const props = defineProps({
    settings: Object
});

const form = useForm({
    recaptcha_enable: props.settings.recaptcha_configuration['RECAPTCHA_ENABLE'],
    recaptcha_site_key: props.settings.recaptcha_configuration['RECAPTCHA_SITE_KEY'],
    recaptcha_secret_key: props.settings.recaptcha_configuration['RECAPTCHA_SECRET_KEY'],
    google_auth_enable: props.settings.google_configuration['GOOGLE_ENABLE'],
    google_client_id: props.settings.google_configuration['GOOGLE_CLIENT_ID'],
    google_client_secret: props.settings.google_configuration['GOOGLE_CLIENT_SECRET'],
    google_redirect: props.settings.google_configuration['GOOGLE_REDIRECT'],
    google_analytics_id: props.settings.google_analytics_id,
});

const submit = () => {
    form.post(route('admin.change.google.settings'));
};

</script>
