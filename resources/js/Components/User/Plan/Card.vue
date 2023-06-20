<template>
  <div>

<div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 relative overflow-hidden">
   <pre>{{props}}</pre>
    <div class="absolute right-0 top-0 h-16 w-16">
        <div
        class="absolute transform rotate-45 bg-green-600 text-center text-white font-semibold py-1 right-[-35px] top-[32px] w-[170px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                </svg>
        </div>
    </div>
    <h5 class="mb-4 text-sm font-medium text-gray-500 dark:text-gray-400">3 Months</h5>

    <div class="flex items-baseline text-gray-900 dark:text-white">
        <span class="text-3xl font-semibold">$</span>
        <span class="text-4xl font-extrabold tracking-tight">30</span>
        <h5 class="mb-4 text-sm font-medium text-gray-500 dark:text-gray-400">Per Month</h5>
        <!-- <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">/month</span> -->
    </div>

    <!-- List -->
    <ul role="list" class="space-y-2 my-7">
        <li class="flex space-x-3">
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Invoiced each quarter</span>
        </li>
        <li class="flex space-x-3">
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">10 QRCode Types ?</span>
        </li>
        <li class="flex space-x-3">
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">100 QRCodes</span>
        </li>
        <li class="flex space-x-3">
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">96 Barcodes</span>
        </li>
        <li class="flex space-x-3">
            <!-- Icon -->
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Additional Tools</span>
        </li>
        <li class="flex space-x-3">
            <!-- Icon -->
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Enable Analytics</span>
        </li>
        <li class="flex space-x-3">
            <!-- Icon -->
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Hide Branding</span>
        </li>
        <li class="flex space-x-3">
            <!-- Icon -->
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Support</span>
        </li>
    </ul>
    <button type="button" class="text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose plan</button>
</div>
</div>

</template>
<script scoped>
import { defineProps } from 'vue';
const props = defineProps({ cardData: Array });

  
</script>