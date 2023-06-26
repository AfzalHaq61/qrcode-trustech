<template>
    <Head title="Plain Text Qr Code" />
    <div class="flex flex-col items-center justify-center w-screen min-h-screen my-10">
        <div class="flex items-center justify-between pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6>Qr Code</h6>
        </div>
        <div class="p-6 w-1/2 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex items-center justify-between pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Vcard</h6>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">First Name</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_first_name_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Last Name</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_last_name_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Mobile Number</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_phone_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Email Address</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_email_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Website Link</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded"><Link :href="qrcodeDetails.vcard_url_value">{{ qrcodeDetails.vcard_url_value }}</Link></span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Company Name</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_company_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Job Position</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_job_title_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">DOB</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_birthday_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Street</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_street_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">City</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_city_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Postal Code</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_postal_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Region</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_region_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Country</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_country_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">More Info</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.vcard_note_value }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';

    var qrcodeDetails = ref();

    const props = defineProps({
        content: Object,
    });

    qrcodeDetails = JSON.parse(props.content);

</script>
