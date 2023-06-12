<template>
    <div v-if="$page.props.flash.success && display"
        class="flex p-4 my-10 bg-green-100 text-sm font-medium text-green-800 rounded-md shadow-md">
        <div class="flex-shrink-0 pr-3">
            <CheckCircleIcon size="25" class="h-5 w-5 text-green-400" aria-hidden="true" />
        </div>
        <div role="alert">{{ $page.props.flash.success }}</div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button @click="remove()" type="button"
                    class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                    <span class="sr-only">Dismiss</span>
                    <XIcon class="h-5 w-5" aria-hidden="true" />
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { CheckCircleIcon, XIcon } from '@heroicons/vue/solid';

const display = ref(true);

function remove() {
    display.value = false;
}

// Hide the message after 5 seconds
setTimeout(() => {
    display.value = false;
}, 5000);
</script>
