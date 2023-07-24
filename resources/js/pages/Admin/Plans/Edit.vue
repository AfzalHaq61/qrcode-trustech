<template>
    <Head title="Plan Edit" />
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
                            <h6>Plan Details</h6>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-6 overflow-x-auto">
                                <form @submit.prevent="submit" role="form">
                                    <div class="grid grid-cols-12 mt-10">
                                        <div class="col-span-2 mt-1.5">
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="recommended">Recommended</Label>
                                            <div class="ml-12">
                                                <Checkbox name="recommended" v-model:checked="form.recommended" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>

                                        <div class="col-span-10">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="plan_name">Plan
                                                Name
                                                <span class="text-red-600">*</span></Label>
                                            <TextInput id="plan_name" type="text" v-model="form.plan_name" autofocus
                                                autocomplete="username" placeholder="Plan Name..." class="focus:shadow-themeColor focus:ring-themeColor"/>

                                            <InputError class="mt-2" :message="form.errors.plan_name" />
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700"
                                            for="plan_description">Description
                                            <span class="text-red-600">*</span></Label>
                                        <textarea
                                            class="focus:shadow-themeColor focus:ring-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                            name="plan_description" id="plan_description" v-model="form.plan_description"
                                            autofocus placeholder="Plan Description..." cols="10" rows="5"></textarea>

                                        <InputError class="mt-2" :message="form.errors.plan_description" />
                                    </div>

                                    <div
                                        class="mt-10 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                        <h6>Plan Prices</h6>
                                    </div>

                                    <div class="grid grid-cols-2 gap-x-6">
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="plan_price">Price
                                                <span class="text-gray-600">(For free: 0)</span> <span
                                                    class="text-red-600">*</span></Label>
                                            <TextInput id="plan_price" type="number" class="focus:shadow-themeColor focus:ring-themeColor" v-model="form.plan_price" autofocus
                                                placeholder="Plan Name..." />

                                            <InputError class="mt-2" :message="form.errors.plan_price" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700"
                                                for="validity">Validity <span class="text-gray-600">(Enter no. of days) (For
                                                    forever: 9999)</span> <span class="text-red-600">*</span></Label>
                                            <TextInput id="validity" type="number" v-model="form.validity" autofocus
                                                placeholder="Validity..." class="focus:shadow-themeColor focus:ring-themeColor"/>
                                            <span class="mb-2 ml-1 font-bold text-xs text-slate-700">Please enter validy in
                                                multiple of months</span>

                                            <InputError class="mt-2" :message="form.errors.validity" />
                                        </div>
                                    </div>

                                    <div
                                        class="mt-10 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                        <h6>Plan Features</h6>
                                    </div>

                                    <div class="grid grid-cols-3 gap-x-6 mt-5">
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">QR
                                                Code Types <span class="text-red-600">*</span></Label>
                                            <TextInput id="no_access_qr" type="number" v-model="form.no_access_qr" autofocus
                                                placeholder="QR Code Types..." class="focus:shadow-themeColor focus:ring-themeColor"/>

                                            <InputError class="mt-2" :message="form.errors.no_access_qr" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">No.
                                                Of QR Codes <span class="text-gray-600">(For unlimited: 999)</span> <span
                                                    class="text-red-600">*</span></Label>
                                            <TextInput id="no_qrcodes" type="number" v-model="form.no_qrcodes" autofocus
                                                placeholder="No. Of QR Codes..." class="focus:shadow-themeColor focus:ring-themeColor"/>

                                            <InputError class="mt-2" :message="form.errors.no_qrcodes" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="no_barcodes">No.
                                                Of Barcodes <span class="text-gray-600">((For unlimited: 999))</span> <span
                                                    class="text-red-600">*</span></Label>
                                            <TextInput id="no_barcodes" type="number" v-model="form.no_barcodes" autofocus
                                                placeholder="No. Of Barcodes..." class="focus:shadow-themeColor focus:ring-themeColor"/>

                                            <InputError class="mt-2" :message="form.errors.no_barcodes" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-4 gap-x-6 gap-y-6 mt-5">
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="text">Text</Label>
                                            <div class="ml-12">
                                                <Checkbox name="text" v-model:checked="form.text" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="url">URL</Label>
                                            <div class="ml-12">
                                                <Checkbox name="url" v-model:checked="form.url" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="phone">Phone</Label>
                                            <div class="ml-12">
                                                <Checkbox name="phone" v-model:checked="form.phone" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="sms">SMS</Label>
                                            <div class="ml-12">
                                                <Checkbox name="sms" v-model:checked="form.sms" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="email">Email</Label>
                                            <div class="ml-12">
                                                <Checkbox name="email" v-model:checked="form.email" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="whatsapp">WhatsApp</Label>
                                            <div class="ml-12">
                                                <Checkbox name="whatsapp" v-model:checked="form.whatsapp" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="facetime">Facetime</Label>
                                            <div class="ml-12">
                                                <Checkbox name="facetime" v-model:checked="form.facetime" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="location">Location</Label>
                                            <div class="ml-12">
                                                <Checkbox name="location" v-model:checked="form.location" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="wifi">Wifi</Label>
                                            <div class="ml-12">
                                                <Checkbox name="wifi" v-model:checked="form.wifi" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="event">Event</Label>
                                            <div class="ml-12">
                                                <Checkbox name="event" v-model:checked="form.event" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="crypto">Crypto</Label>
                                            <div class="ml-12">
                                                <Checkbox name="crypto" v-model:checked="form.crypto" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="vcard">vCard</Label>
                                            <div class="ml-12">
                                                <Checkbox name="vcard" v-model:checked="form.vcard" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="paypal">Paypal</Label>
                                            <div class="ml-12">
                                                <Checkbox name="paypal" v-model:checked="form.paypal" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="upi">UPI</Label>
                                            <div class="ml-12">
                                                <Checkbox name="upi" v-model:checked="form.upi" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="additional_tools">Additional Tools</Label>
                                            <div class="ml-12">
                                                <Checkbox name="additional_tools" v-model:checked="form.additional_tools" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="enable_analaytics">Enable Analytics</Label>
                                            <div class="ml-12">
                                                <Checkbox name="enable_analaytics"
                                                    v-model:checked="form.enable_analaytics" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="hide_branding">Hide Branding</Label>
                                            <div class="ml-12">
                                                <Checkbox name="hide_branding" v-model:checked="form.hide_branding" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700"
                                                for="support">Support</Label>
                                            <div class="ml-12">
                                                <Checkbox name="support" v-model:checked="form.support" class="text-themeColor focus:ring-themeColor"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing">
                                            Add
                                        </PrimaryButton>
                                    </div>
                                </form>
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

const props = defineProps({
    plan_details: Object,
    settings: Object,
    config: Object
});

const form = useForm({
    plan_id: props.plan_details.id,
    plan_name: props.plan_details.plan_name,
    plan_description: props.plan_details.plan_description,
    plan_price: props.plan_details.plan_price,
    validity: props.plan_details.validity,
    no_access_qr: props.plan_details.no_access_qr,
    no_qrcodes: props.plan_details.no_qrcodes,
    no_barcodes: props.plan_details.no_barcodes,
    text: props.plan_details.access_text === 1 ? true : false,
    url: props.plan_details.access_url === 1 ? true : false,
    phone: props.plan_details.access_phone === 1 ? true : false,
    sms: props.plan_details.access_sms === 1 ? true : false,
    email: props.plan_details.access_email === 1 ? true : false,
    whatsapp: props.plan_details.access_whatsapp === 1 ? true : false,
    facetime: props.plan_details.access_facetime === 1 ? true : false,
    location: props.plan_details.access_location === 1 ? true : false,
    wifi: props.plan_details.access_wifi === 1 ? true : false,
    event: props.plan_details.access_event === 1 ? true : false,
    crypto: props.plan_details.access_crypto === 1 ? true : false,
    vcard: props.plan_details.access_vcard === 1 ? true : false,
    paypal: props.plan_details.access_paypal === 1 ? true : false,
    upi: props.plan_details.access_upi === 1 ? true : false,
    additional_tools: props.plan_details.additional_tools === 1 ? true : false,
    enable_analaytics: props.plan_details.enable_analaytics === 1 ? true : false,
    hide_branding: props.plan_details.hide_branding === 1 ? true : false,
    free_setup: props.plan_details.free_setup === 1 ? true : false,
    support: props.plan_details.support === 1 ? true : false,
    recommended: props.plan_details.recommended === 1 ? true : false,
});

const submit = () => {
    form.post(route('admin.update.plan'));
};
</script>
