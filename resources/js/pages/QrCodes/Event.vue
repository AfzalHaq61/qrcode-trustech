<template>
    <Head title="Plain Text Qr Code" />
    <div class="flex flex-col items-center justify-center w-screen h-screen">
        <div class="flex items-center justify-between pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6>Qr Code</h6>
        </div>
        <div class="p-6 w-1/2 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex items-center justify-between pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Event</h6>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Title</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.event_name_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Message</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.event_location_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">Location</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.event_note_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">From</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.event_start_datetime_value }}</span>
            </div>
            <div class="mb-2">
                <Label class="mb-1 block font-bold text-sm text-slate-700">To</Label>
                <span class="block text-sm text-slate-500 bg-gray-100 p-2 rounded">{{ qrcodeDetails.event_end_datetime_value }}</span>
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
