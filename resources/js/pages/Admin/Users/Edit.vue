<template>
    <Head title="User Edit" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>User Details</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <form @submit.prevent="submit" role="form">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Full Name <span class="text-red-600">*</span></Label>
                                        <TextInput
                                            id="full_name"
                                            type="full_name"
                                            v-model="form.full_name"
                                            autofocus
                                            autocomplete="username"
                                            placeholder="Full Name..."
                                        />

                                        <InputError class="mt-2" :message="form.errors.full_name" />
                                    </div>

                                    <div class="sm:col-span-3">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Email <span class="text-red-600">*</span></Label>
                                            <TextInput
                                                id="email"
                                                type="email"
                                                v-model="form.email"
                                                autofocus
                                                autocomplete="username"
                                                placeholder="Email..."
                                                aria-label="Email"
                                            />

                                            <InputError class="mt-2" :message="form.errors.email" />
                                    </div>
                                </div>

                                <div class="mt-10 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                    <h6>Change Password</h6>
                                </div>
                                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">New Password <span class="text-red-600">*</span></Label>
                                        <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                id="password"
                                                type="password"
                                                v-model="form.password"
                                                autofocus
                                                autocomplete="username"
                                                placeholder="New Password..."
                                                aria-label="password">

                                        <InputError class="mt-2" :message="form.errors.password" />
                                    </div>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Update
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    user_details: Object,
    settings: Object,
});

const form = useForm({
    user_id: props.user_details.id,
    full_name: props.user_details.name,
    email: props.user_details.email,
    password: props.user_details.password
});

const submit = () => {
    form.post(route('admin.update.user'));
};
</script>
