<template>         
    <SettingSideBarLayout>

        <div class="col-span-8 w-full px-6 py-6 mx-auto">
            <!-- Update Email Configuration Settings -->
            <form @submit.prevent="submit" role="form">

                <h6 class="text-lg font-bold dark:text-white">Email Configuration Settings</h6>
            
                <div class="mt-5 grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <!-- Sender Name -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="mail_sender">Sender Name</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.mail_sender"
                            name="mail_sender"
                            id="mail_sender"
                            placeholder="Sender Name ..."
                            ref="input"
                            readonly
                        />
                    </div>

                    <!-- Sender Email Address -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="mail_address">Sender Email Address</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.mail_address"
                            name="mail_address"
                            id="mail_address"
                            placeholder="Sender Email Address ..."
                            ref="input"
                            readonly
                        />
                    </div>

                    <!-- Mailer Driver -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="mail_driver">Mailer Driver</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.mail_driver"
                            name="mail_driver"
                            id="mail_driver"
                            placeholder="Mailer Driver ..."
                            ref="input"
                            readonly
                        />
                    </div>
                </div>

                <div class="mt-5 grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <!-- Mailer Host -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="mail_host">Mailer Host</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.mail_host"
                            name="mail_host"
                            id="mail_host"
                            placeholder="Mailer Host ..."
                            ref="input"
                            readonly
                        />
                    </div>

                    <!-- Mailer Port -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="mail_port">Mailer Port</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.mail_port"
                            name="mail_port"
                            id="mail_port"
                            placeholder="Mailer Port ..."
                            ref="input"
                            readonly
                        />
                    </div>
                    
                    <!-- Mailer Encryption -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="mail_encryption">Mailer Encryption</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.mail_encryption"
                            name="mail_encryption"
                            id="mail_encryption"
                            placeholder="Mailer Encryption ..."
                            ref="input"
                            readonly
                        />
                    </div>
                </div>
                
                <div class="mt-5 grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <!-- Mailer Username -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="mail_username">Mailer Username</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.mail_username"
                            name="mail_username"
                            id="mail_username"
                            placeholder="Mailer Username ..."
                            ref="input"
                            readonly
                        />
                    </div>

                    <!-- Mailer Password -->
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="mail_password">Mailer Password</Label>
                        <input
                            type="text"
                            class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                            v-model="form.mail_password"
                            name="mail_password"
                            id="mail_password"
                            placeholder="Mailer Password ..."
                            ref="input"
                            readonly
                        />
                    </div>

                    <!-- Test Mail -->
                    <div class="sm:col-span-2 mt-7">
                        <Link :href="route('admin.test.email')" class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-themeColor hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                            Test Mail
                        </Link>
                    </div>
                </div>
                
                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        Update
                    </PrimaryButton>
                </div>
            </form>
        </div>

    </SettingSideBarLayout>             
</template>

<script setup>

import SettingSideBarLayout from '../../../AdminSettingLayout/sidebar.vue'
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    settings: Object
});

const form = useForm({
    mail_sender: props.settings.email_configuration['name'],
    mail_address: props.settings.email_configuration['address'],
    mail_driver: props.settings.email_configuration['driver'],
    mail_host: props.settings.email_configuration['host'],
    mail_port: props.settings.email_configuration['port'],
    mail_encryption: props.settings.email_configuration['encryption'],
    mail_username: props.settings.email_configuration['username'],
    mail_password: props.settings.email_configuration['password']
});

const submit = () => {
    form.post(route('admin.change.email.settings'));
};

</script>
