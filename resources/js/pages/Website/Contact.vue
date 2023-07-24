<template>
    <Head title="Contact" />
    <WebsiteLayout>
        <div class="relative isolate bg-white h-screen">
            <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
            <div class="relative px-6 pb-20 pt-24 sm:pt-32 lg:static lg:px-8 lg:py-48">
                <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
                <div class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden bg-gray-100 ring-1 ring-gray-900/10 lg:w-1/2">
                    <svg class="absolute inset-0 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
                    <defs>
                        <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="100%" y="-1" patternUnits="userSpaceOnUse">
                        <path d="M130 200V.5M.5 .5H200" fill="none" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" stroke-width="0" fill="white" />
                    <svg x="100%" y="-1" class="overflow-visible fill-gray-50">
                        <path d="M-470.5 0h201v201h-201Z" stroke-width="0" />
                    </svg>
                    <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900">{{ page[1].body }}</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">{{ page[2].body }}</p>
                <dl class="mt-10 space-y-4 text-base leading-7 text-gray-600">
                    <div class="flex gap-x-4">
                    <dt class="flex-none">
                        <span class="sr-only">Address</span>
                        <BuildingOffice2Icon class="h-7 w-6 text-gray-400" aria-hidden="true" />
                    </dt>
                    <dd>545 Mavis Island<br />Chicago, IL 99191</dd>
                    </div>
                    <div class="flex gap-x-4">
                    <dt class="flex-none">
                        <span class="sr-only">Telephone</span>
                        <PhoneIcon class="h-7 w-6 text-gray-400" aria-hidden="true" />
                    </dt>
                    <dd><a class="hover:text-gray-900" href="tel:+1 (555) 234-5678">+1 (555) 234-5678</a></dd>
                    </div>
                    <div class="flex gap-x-4">
                    <dt class="flex-none">
                        <span class="sr-only">Email</span>
                        <EnvelopeIcon class="h-7 w-6 text-gray-400" aria-hidden="true" />
                    </dt>
                    <dd><a class="hover:text-gray-900" href="mailto:hello@example.com">hello@example.com</a></dd>
                    </div>
                </dl>
                </div>
            </div>
            
            <div>
                
            <form @submit.prevent="submit" role="form" class="px-6 pb-24 pt-20 sm:pb-32 lg:px-8 lg:py-48">
                <Notifications/>
                <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <!-- Name -->
                        <div>
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="emailName">Name</Label>
                            <TextInput id="emailName" type="text" v-model="form.emailName" autofocus
                                autocomplete="username" minlength="3" placeholder="David ..." required/>

                            <InputError class="mt-2" :message="form.errors.emailName" />
                        </div>

                        <!-- Email -->
                        <div>
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="emailRecipient">Email</Label>
                            <TextInput id="emailRecipient" type="email" v-model="form.emailRecipient" autofocus
                                autocomplete="username" placeholder="dev@domain.com ..." required/>

                            <InputError class="mt-2" :message="form.errors.emailRecipient" />
                        </div>

                        <!-- Message -->
                        <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="message">Message</Label>
                            <div class="mt-2.5">
                                <textarea name="emailBody" minlength="50" id="emailBody" rows="4" v-model="form.emailBody" placeholder="Your message ..." class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" required/>
                            </div>
                            <InputError class="mt-2" :message="form.errors.emailBody" />
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Send message
                        </PrimaryButton>
                    </div>
                </div>
            </form>
            </div>
            </div>
        </div>
    </WebsiteLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import Notifications from '@/Components/Shared/Notifications.vue';

const props = defineProps({
    settings: Object,
    config: Object,
    page: Object
});

const form = useForm({
    emailName: '',
    emailRecipient: '',
    emailBody: ''
});

const submit = () => {
    form.post(route('send-email'));
};

</script>
