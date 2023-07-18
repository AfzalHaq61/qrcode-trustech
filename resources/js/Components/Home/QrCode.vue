<template>
    <div class="bg-white">
        <div class="px-6 pb-24 sm:px-6 sm:pb-32 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ page[21].body }}</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-600">{{ page[22].body }}</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <Link :href="route(page[24].body)">
                        <PrimaryButton>{{ page[23].body }}</PrimaryButton>
                    </Link>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="mx-auto max-w-2xl text-center px-6 py-20 sm:px-6 sm:py-20 lg:px-8">
            <h2 class="font-bold tracking-tight text-themeColor text-32">{{ page[25].body }}</h2>
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ page[26].body }}</h2>
        </div>

        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-5xl">
            <dl class="grid max-w-l grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-3 lg:gap-y-16">
              <div v-for="feature in features" :key="feature.name" class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-themeColor">
                    <img :src="feature.image" class="h-6 w-6 text-white" :alt="$page.props.appName">
                  </div>
                  {{ feature.name }}
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">{{ feature.description }}</dd>
              </div>
            </dl>
        </div>

        <div class="mx-auto max-w-2xl text-center px-6 py-20 sm:px-6 sm:py-20 lg:px-8">
            <h2 class="font-bold tracking-tight text-themeColor text-32">{{ page[37].body }}</h2>
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ page[38].body }}</h2>
        </div>
    </div>
</template>

<script setup>

const props = defineProps({
    page: Object
});

const features = [
    {
        name: props.page[27].body,
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        image: 'images/web/qrcodes/icons8-alpha-96.png',
    },
    {
        name: props.page[28].body,
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        image: 'images/web/qrcodes/icons8-bhim-96.png',
    },
    {
        name: props.page[29].body,
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        image: 'images/web/qrcodes/icons8-link-96.png',
    },
    {
        name: props.page[30].body,
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        image: 'images/web/qrcodes/icons8-iphone-96.png',
    },
    {
        name: props.page[31].body,
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        image: 'images/web/qrcodes/icons8-sms-96.png',
    },
    {
        name: props.page[32].body,
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        image: 'images/web/qrcodes/icons8-mail-96.png',
    },
    {
        name: props.page[33].body,
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        image: 'images/web/qrcodes/icons8-whatsapp-96.png',
    },
    {
        name: props.page[34].body,
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        image: 'images/web/qrcodes/icons8-video-call-96.png',
    },
    {
        name: props.page[35].body,
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        image: 'images/web/qrcodes/icons8-location-96.png',
    },
    {
        name: props.page[36].body,
        description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        image: 'images/web/qrcodes/icons8-more-96.png',
    },
]
</script>
