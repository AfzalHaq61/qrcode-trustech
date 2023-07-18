<template>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <div>
                    <h2 class="text-lg font-semibold text-themeColor">{{ page[7].body }}</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ page[8].body }}</p>
                </div>
                <div class="col-span-2 grid grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2">
                    <div v-for="feature in features" :key="feature.name" class="pt-6">
                        <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                            <div class="-mt-6 h-60">
                                <div>
                                    <span class="inline-flex items-center justify-center rounded-xl bg-themeColor p-3 shadow-lg">
                                        <div v-html="feature.icon"></div>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">{{ feature.name }}</h3>
                                <p class="mt-5 text-base leading-7 text-gray-600">{{ feature.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>

const props = defineProps({
    page: Object
});

const features = [
    {
        name: props.page[9].body,
        description: props.page[10].body,
        icon: '<svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor"> <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"> </path> </svg>',
    },
    {
        name: props.page[11].body,
        description: props.page[12].body,
        icon: '<svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"> </path> </svg > ',
    },
    {
        name: props.page[13].body,
        description: props.page[14].body,
        icon: '<svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"> </path> </svg > ',
    },
    {
        name: props.page[15].body,
        description: props.page[16].body,
        icon: '<svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" > <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"> </path> </svg > ',
    },
    {
        name: props.page[17].body,
        description: props.page[18].body,
        icon: '<svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"> </path> </svg > ',
    },
    {
        name: props.page[19].body,
        description: props.page[20].body,
        icon: '<svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"> </path> </svg > ',
    },
]

</script>
