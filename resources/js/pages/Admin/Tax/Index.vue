<template>
    <SettingSideBarLayout>
    <div class="col-span-8 w-full px-6 py-6 mx-auto">
        <div>
            <div>
                <!-- Update tax setting -->
                <form @submit.prevent="taxForm" role="form">
                    <h6 class="text-lg font-bold dark:text-white">Tax Settings</h6>

                    <div class="mt-10 grid grid-cols-1 gap-6  sm:grid-cols-6">
                        <!-- Invoice Number Prefix -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="invoice_prefix">Invoice Number Prefix<span class="text-red-600"> *</span></Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.invoice_prefix" name="invoice_prefix" id="invoice_prefix"
                                placeholder="Invoice Number Prefix ..." ref="input" required
                            />
                        </div>

                        <!-- Name -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="invoice_name">Name<span class="text-red-600"> *</span></Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.invoice_name" name="invoice_name" id="invoice_name"
                                placeholder="Name ..." ref="input" required
                            />
                        </div>

                        <!-- Email -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="invoice_email">Email<span class="text-red-600"> *</span></Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.invoice_email" name="invoice_email" id="invoice_email"
                                placeholder="Email ..." ref="input" required
                            />
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-6  sm:grid-cols-6">
                        <!-- Phone -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Phone<span class="text-red-600"> *</span></Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.invoice_phone" name="invoice_phone" id="invoice_phone"
                                placeholder="Phone ..." ref="input" required
                            />
                        </div>

                        <!-- Address -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="invoice_address">Address<span class="text-red-600"> *</span></Label>
                            <textarea
                                v-model="form.invoice_address" name="invoice_address" id="invoice_address" cols="2" rows="3"
                                placeholder="Address ..." ref="input" required
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                            </textarea>
                        </div>

                        <!-- City -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="invoice_city">City<span class="text-red-600"> *</span></Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.invoice_city" name="invoice_city" id="invoice_city"
                                placeholder="City ..." ref="input" required
                            />
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-6  sm:grid-cols-6">
                        <!-- State/Province -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="invoice_state">State/Province<span class="text-red-600"> *</span></Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.invoice_state" name="invoice_state" id="invoice_state"
                                placeholder="State/Province ..." ref="input" required
                            />
                        </div>

                        <!-- Zip Code  -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="invoice_zipcode">Zip Code<span class="text-red-600"> *</span></Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.invoice_zipcode" name="invoice_zipcode" id="invoice_zipcode"
                                placeholder="Zip Code ..." ref="input" required
                            />
                        </div>

                        <!-- Country -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="invoice_country">Country<span class="text-red-600"> *</span></Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.invoice_country" name="invoice_country" id="invoice_country"
                                placeholder="Country ..." ref="input" required
                            />
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-6  sm:grid-cols-6">
                        <!-- Tax Name -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="tax_name">Tax Name</Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.tax_name" name="tax_name" id="tax_name"
                                placeholder="Tax Name ..." ref="input"
                            />
                        </div>

                        <!-- Tax ID -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="tax_number">Tax ID</Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.tax_number" name="tax_number" id="tax_number"
                                placeholder="Tax ID ..." ref="input"
                            />
                        </div>

                        <!-- Tax Value -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="tax_value">Tax Value</Label>
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.tax_value" name="tax_value" id="tax_value"
                                placeholder="Tax Value ..." ref="input"
                            />
                        </div>
                    </div>

                    <!-- Invoice Footer -->
                    <div class="mt-10 grid grid-cols-1 gap-6  sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="tax_value">Invoice Footer<span class="text-red-600"> *</span></Label>
                            <textarea
                                v-model="form.tax_value" name="tax_value" id="tax_value"
                                placeholder="Invoice Footer ..." ref="input" required cols="10" rows="3"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                            </textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4 mr-5">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </div>
                </form>

                <!-- Update email setting -->
                <form @submit.prevent="emailForm" role="form" class="mt-10">
                    <h6 class="text-lg font-bold dark:text-white">Invoice Email Settings</h6>

                    <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-12">
                        <!-- Email Heading -->
                        <div class="sm:col-span-6">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="email_heading">Email Heading<span class="text-red-600">*</span></Label>
                            <textarea
                                v-model="form.email_heading" name="email_heading" id="email_heading"
                                placeholder="Email Heading ..." ref="input" required cols="30" rows="3"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                            </textarea>
                        </div>

                        <!-- Email footer -->
                        <div class="sm:col-span-6">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="email_footer">Email Footer<span class="text-red-600">*</span></Label>
                            <textarea
                                v-model="form.email_footer" name="email_footer" id="email_footer"
                                placeholder="Email Footer ..." ref="input" required cols="30" rows="3"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                            </textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4 mr-5">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </SettingSideBarLayout>
</template>

<script setup>

import SettingSideBarLayout from '../../../AdminSettingLayout/sidebar.vue'
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    config: Object,
});

const form = useForm({
    invoice_prefix: props.config[15].config_value,
    invoice_name: props.config[16].config_value,
    invoice_email: props.config[17].config_value,
    invoice_phone: props.config[18].config_value,
    invoice_address: props.config[19].config_value,
    invoice_city: props.config[20].config_value,
    invoice_state: props.config[21].config_value,
    invoice_zipcode: props.config[22].config_value,
    invoice_country: props.config[23].config_value,
    tax_name: props.config[24].config_value,
    tax_number: props.config[26].config_value,
    tax_value: props.config[25].config_value,
    invoice_footer: props.config[29].config_value,
    email_heading: props.config[27].config_value,
    email_footer: props.config[28].config_value
});

const taxForm = () => {
    form.post(route('admin.update.tax.setting'));
};

const emailForm = () => {
    form.post(route('admin.update.email.setting'));
};

</script>
