<template>
    <div class="grid grid-cols-3 p-6 space-x-5 min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border cursor-pointer">
        <div :class="{ 'border-fuchsia-600 py-2 hover:border-fuchsia-800': stepcount >= 1, 'border-gray-600 py-2 hover:border-gray-800': stepcount < 1 }" class="flex flex-col border-l-4 md:border-l-0 md:border-t-4 md:pb-0 md:pl-0 md:pt-4">
            <span :class="{ 'text-fuchsia-600 hover:text-fuchsia-800': stepcount >= 1, 'text-gray-600 hover:text-gray-800': stepcount < 1 }" class="text-sm font-bold">Step 1</span>
            <span class="text-sm font-bold text-gray-600 hover:text-gray-800">Type of QR Code </span>
        </div>
        <div :class="{ 'border-fuchsia-600 py-2 hover:border-fuchsia-800': stepcount >= 2, 'border-gray-600 py-2 hover:border-gray-800': stepcount < 2 }" class="flex flex-col border-l-4 md:border-l-0 md:border-t-4 md:pb-0 md:pl-0 md:pt-4">
            <span :class="{ 'text-fuchsia-600 hover:text-fuchsia-800': stepcount >= 2, 'text-gray-600 hover:text-gray-800': stepcount < 2 }" class="text-sm font-bold">Step 2</span>
            <span class="text-sm font-bold text-gray-600 hover:text-gray-800">Content</span>
        </div>
        <div :class="{ 'border-fuchsia-600 py-2 hover:border-fuchsia-800': stepcount >= 3, 'border-gray-600 py-2 hover:border-gray-800': stepcount < 3 }" class="flex flex-col border-l-4 md:border-l-0 md:border-t-4 md:pb-0 md:pl-0 md:pt-4">
            <span :class="{ 'text-fuchsia-600 hover:text-fuchsia-800': stepcount >= 3, 'text-gray-600 hover:text-gray-800': stepcount < 3 }" class="text-sm font-bold">Step 3</span>
            <span class="text-sm font-bold text-gray-600 hover:text-gray-800">QR Design</span>
        </div>
    </div>
</template>

<script setup>

const props = defineProps({
    stepcount: Number,
});

</script>
