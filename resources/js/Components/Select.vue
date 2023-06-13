<template>
        <div class="sm:col-span-3">
            <select id="plan_id" :name="props.options.name"  class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                    <option v-for="opt in options" :value="opt.value">{{ opt.text }}</option>
            </select>
        </div>
</template>
<script setup>
const props = defineProps(['options'])
const options=props.options.data;
</script>
