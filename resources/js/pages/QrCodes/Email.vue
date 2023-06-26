<template>
    <Head title="Plain Text Qr Code" />
    <div class="flex flex-col items-center justify-center w-screen h-screen">
        <div class="flex items-center justify-between pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6>Qr Code</h6>
        </div>
        <div class="p-6 w-1/2 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex items-center justify-between pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Email</h6>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Email ID</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.email_address_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Subject</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.email_subject_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Body</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.email_body_value }}</span>
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
