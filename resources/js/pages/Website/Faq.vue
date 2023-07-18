<template>
    <Head title="FAQS" />
    <WebsiteLayout>
        <div class="bg-white">
            <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8 lg:py-40">
            <div class="mx-auto max-w-4xl">
                <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">{{ page[1].body }}</h2>
                <p class="mt-6 max-w-2xl text-base leading-7 text-gray-600">{{ page[2].body }}</p>
                <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
                <Disclosure as="div" v-for="faq in faqs" :key="faq.question" class="pt-6" v-slot="{ open }">
                    <dt>
                    <DisclosureButton class="flex w-full items-start justify-between text-left text-gray-900">
                        <span class="text-base font-semibold leading-7">{{ faq.question }}</span>
                        <span class="ml-6 flex h-7 items-center">
                        <span v-if="!open">
                            <svg class="text-black w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                        </span>
                        <span v-else>
                            <svg class="text-black w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                        </span>
                        </span>
                    </DisclosureButton>
                    </dt>
                    <DisclosurePanel as="dd" class="mt-2 pr-12">
                    <p class="text-base leading-7 text-gray-600">{{ faq.answer }}</p>
                    </DisclosurePanel>
                </Disclosure>
                </dl>
            </div>
            </div>
        </div>
    </WebsiteLayout>
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'

const props = defineProps({
    settings: Object,
    config: Object,
    page: Object
});

const faqs = [
    {
        question: props.page[3].body,
        answer: props.page[4].body,
    },
    {
        question: props.page[5].body,
        answer: props.page[6].body
    },
    {
        question: props.page[7].body,
        answer: props.page[8].body
    },
    {
        question: props.page[9].body,
        answer: props.page[10].body
    },
    {
        question: props.page[11].body,
        answer: props.page[12].body
    },
    {
        question: props.page[13].body,
        answer: props.page[14].body
    },
]
</script>
