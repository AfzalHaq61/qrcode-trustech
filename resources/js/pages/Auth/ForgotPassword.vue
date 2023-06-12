<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import LoginButton from '@/Components/LoginButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <section>
                <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
                    <div class="container z-10">
                        <div class="flex flex-wrap mt-0 -mx-3">
                            <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                                <div class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                                        {{ status }}
                                    </div>
                                    <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                                        <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Forgot your password?</h3>
                                        <p class="mb-0">No problem. Just let us know your email address and we will email you a password reset
                link that will allow you to choose a new one.</p>
                                    </div>
                                    <div class="flex-auto p-6">
                                        <form @submit.prevent="submit">

                                            <InputLabel for="email" value="Email" />
                                            <div class="mb-4">
                                                <TextInput
                                                    id="email"
                                                    type="email"
                                                    v-model="form.email"
                                                    required
                                                    autofocus
                                                    autocomplete="username"
                                                    placeholder="Email"
                                                    aria-label="Email"
                                                    aria-describedby="email-addon"
                                                />

                                                <InputError class="mt-2" :message="form.errors.email" />
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                <LoginButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                    Email Password Reset Link
                                                </LoginButton>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
                                <div class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                                <div class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10" style="background-image: url('../assets/img/curved-images/curved6.jpg')"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </GuestLayout>
</template>
