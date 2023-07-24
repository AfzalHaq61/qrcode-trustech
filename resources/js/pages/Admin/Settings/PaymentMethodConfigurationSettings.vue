<template>
    <SettingSideBarLayout>
        <div class="col-span-8 w-full px-6 py-6 mx-auto">
            <!-- Update Payments Settings -->
            <form @submit.prevent="submit" role="form">

                <h6 class="text-lg font-bold dark:text-white">Payment Methods Configuration Settings</h6>

                <!-- Paypal Settings -->
                <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-themeColor-600/100">PayPal Settings</h6>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <!-- Mode -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="paypal_mode">Mode <span class="text-red-600">*</span></Label>
                        <div class="sm:col-span-3">
                            <select v-model="form.paypal_mode" id="paypal_mode" name="paypal_mode" required class="focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                                <option value="sandbox">Sandbox</option>
                                <option value="live">Live</option>
                            </select>
                        </div>
                    </div>

                    <!-- Client Key -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="paypal_client_key">Client Key <span class="text-red-600">*</span></Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.paypal_client_key"
                            name="paypal_client_key"
                            id="paypal_client_key"
                            placeholder="Client Key ..."
                            ref="input"
                            required
                        />
                    </div>

                    <!-- Secret -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="paypal_secret">Secret</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.paypal_secret"
                            name="paypal_secret"
                            id="paypal_secret"
                            placeholder="Secret ..."
                            ref="input"
                            required
                        />
                    </div>
                </div>

                <!-- Razorpay Settings -->
                <div class="mt-10 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-themeColor-600/100">Razorpay Settings</h6>
                </div>


                <div class="grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <!-- Client Key -->
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="razorpay_client_key">Client Key<span class="text-red-600"> *</span></Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.razorpay_client_key"
                            name="razorpay_client_key"
                            id="razorpay_client_key"
                            placeholder="Client Key ..."
                            ref="input"
                            required
                        />
                    </div>

                    <!-- Secret -->
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="razorpay_secret">Secret<span class="text-red-600"> *</span></Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.razorpay_secret"
                            name="razorpay_secret"
                            id="razorpay_secret"
                            placeholder="Secret ..."
                            ref="input"
                            required
                        />
                    </div>
                </div>

                <!-- Stripe Settings -->
                <div class="mt-10 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-themeColor-600/100">Stripe Settings</h6>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <!-- Publishable Key -->
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="stripe_publishable_key">Publishable Key<span class="text-red-600"> *</span></Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.stripe_publishable_key"
                            name="stripe_publishable_key"
                            id="stripe_publishable_key"
                            placeholder="Publishable Key ..."
                            ref="input"
                            required
                        />
                    </div>

                    <!-- Secret -->
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="stripe_secret">Secret<span class="text-red-600"> *</span></Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.stripe_secret"
                            name="stripe_secret"
                            id="stripe_secret"
                            placeholder="Secret ..."
                            ref="input"
                            required
                        />
                    </div>
                </div>

                <!-- Offline (Bank Transfer) Settings -->
                <div class="mt-10 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-themeColor-600/100">Offline (Bank Transfer) Settings</h6>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="bank_transfer">Offline (Bank Transfer) Details<span class="text-red-600"> *</span></Label>
                        <textarea
                            id="bank_transfer"
                            v-model="form.bank_transfer"
                            name="bank_transfer"
                            placeholder="Offline (Bank Transfer) Details ..."
                            ref="input"
                            rows="4"
                            required
                            class="focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                        </textarea>
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

import SettingSideBarLayout from '../../../AdminSettingLayout/sidebar.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    config: Object,
    settings: Object,
    breadcrumbs: Object,
});

const form = useForm({
    paypal_mode: props.config[3].config_value,
    paypal_client_key: props.config[4].config_value,
    paypal_secret: props.config[5].config_value,
    razorpay_client_key: props.config[6].config_value,
    razorpay_secret: props.config[7].config_value,
    stripe_publishable_key: props.config[9].config_value,
    stripe_secret: props.config[10].config_value,
    bank_transfer: props.config[31].config_value,
});

const submit = () => {
    form.post(route('admin.change.payments.settings'));
};

</script>
