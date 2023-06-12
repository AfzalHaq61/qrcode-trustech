<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import LoginButton from '@/Components/LoginButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

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
                                    <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Welcome back</h3>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="flex-auto p-6">
                                    <form @submit.prevent="submit" role="form">

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

                                        <InputLabel for="password" value="Password" />
                                        <div class="mb-4">
                                            <TextInput
                                                id="password"
                                                type="password"
                                                v-model="form.password"
                                                required
                                                autocomplete="current-password"
                                                placeholder="Password"
                                                aria-label="Password"
                                                aria-describedby="password-addon"
                                            />

                                            <InputError class="mt-2" :message="form.errors.password" />
                                        </div>

                                        <div class="min-h-6 mb-0.5 block pl-12 mt-4">
                                            <label class="flex items-center">
                                                <Checkbox name="remember" v-model:checked="form.remember" />
                                                <span class="ml-1 font-normal cursor-pointer select-none text-sm text-slate-700">Remember me</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <LoginButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                Sign in
                                            </LoginButton>
                                        </div>

                                        <div class="flex items-center justify-center mt-4">
                                            <Link
                                                v-if="canResetPassword"
                                                :href="route('password.request')"
                                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            >
                                                Forgot your password?
                                            </Link>
                                        </div>
                                    </form>
                                </div>
                                <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                                    <p class="mx-auto mb-6 leading-normal text-sm">
                                    Don't have an account?
                                        <Link :href="route('register')" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Sign up</Link>
                                    </p>
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
