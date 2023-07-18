<template>
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <ApplicationLogo class="inline h-full max-w-full transition-all duration-200 ease-nav-brand font-bold max-h-12" />
        </div>
        <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = true">
                <svg class="block h-5 w-4 fill-current" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <Link v-for="item in navigation" :key="item.name" :href="item.href" :class="[currentUrl == 'http://127.0.0.1:8001/' ? 'text-white' : 'text-gray-900', 'text-sm font-semibold leading-6']">{{ item.name }}</Link>
            <span v-if="page">
                <span v-for="page in page">
                    <span v-if="page.slug != 'home' && page.slug != 'about' && page.slug !=
                        'contact' && page.slug != 'faq' && page.slug != 'pricing' &&
                        page.slug != 'privacy-policy' && page.slug != 'refund-policy' &&
                        page.slug != 'terms-and-conditions'"
                    >
                        <Link :href="route('web.custom.page', page.slug)" class="text-sm font-semibold leading-6 text-gray-900">{{ page.title }}</Link>
                    </span>
                </span>
            </span>
        </div>
        <div v-if="$page.props.canLogin" class="hidden lg:flex lg:flex-1 lg:justify-end lg:gap-x-12">
            <span v-if="$page.props.auth.user">
                <span v-if="$page.props.auth.user.role_id == 1">
                    <Link :href="route('admin.dashboard')" :class="[currentUrl == 'http://127.0.0.1:8001/' ? 'text-white' : 'text-gray-900', 'text-sm font-semibold leading-6']">Dashboard →</Link>
                </span>
                <span v-else>
                    <Link :href="route('user.dashboard')" :class="[currentUrl == 'http://127.0.0.1:8001/' ? 'text-white' : 'text-gray-900', 'text-sm font-semibold leading-6']">Dashboard →</Link>
                </span>
            </span>
            <template v-else>
                <Link :href="route('login')" :class="[currentUrl == 'http://127.0.0.1:8001/' ? 'text-white' : 'text-gray-900', 'text-sm font-semibold leading-6']">Log In →</Link>
                <Link v-if="$page.props.canRegister" :href="route('register')" :class="[currentUrl == 'http://127.0.0.1:8001/' ? 'text-white' : 'text-gray-900', 'text-sm font-semibold leading-6']">Sign Up →</Link>
            </template>
        </div>
        </nav>
        <Dialog as="div" class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
        <div class="fixed inset-0 z-50" />
        <DialogPanel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <ApplicationLogo class="inline h-full max-w-full transition-all duration-200 ease-nav-brand font-bold max-h-8" />
                <button type="button" class="flex items-center -m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6">
                <Link v-for="item in navigation" :key="item.name" :href="item.href" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ item.name }}</Link>
                <span v-if="page">
                    <span v-for="page in page">
                        <span v-if="page.slug != 'home' && page.slug != 'about' && page.slug !=
                            'contact' && page.slug != 'faq' && page.slug != 'pricing' &&
                            page.slug != 'privacy-policy' && page.slug != 'refund-policy' &&
                            page.slug != 'terms-and-conditions'"
                        >
                            <Link :href="route('web.custom.page', page.slug)" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ page.title }}</Link>
                        </span>
                    </span>
                </span>
                </div>
                <div v-if="canLogin" class="py-6">
                    <Link v-if="$page.props.auth.user" :href="route('user.dashboard')" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Dashboard</Link>
                    <template v-else>
                        <Link :href="route('login')" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log In</Link>
                        <Link v-if="canRegister" :href="route('register')" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Sign Up</Link>
                    </template>
                </div>
            </div>
            </div>
        </DialogPanel>
        </Dialog>
    </header>
</template>

<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel } from '@headlessui/vue'

const currentUrl = ref(window.location.href);

const props = defineProps({
    page: Object,
});

const navigation = [
    { name: 'Home', href: route('web.index') },
    { name: 'FAQ', href: route('web.faq') },
    { name: 'Pricing', href: route('web.pricing') },
    { name: 'Contact', href: route('web.contact') },
]

const mobileMenuOpen = ref(false)
</script>



