<template>
    <SettingSideBarLayout>
        <div class="col-span-8 w-full px-6 py-6 mx-auto">
            <div class="mt-10 grid grid-cols-1 gap-x-2 sm:grid-cols-12">
                <!-- Check update -->
                <div class="sm:col-span-7">
                    <form @submit.prevent="submit" role="form">
                        <h6 class="text-lg font-bold dark:text-white">Check & Update</h6>

                        <div class="mt-0">
                            <!-- License -->
                            <div class="mr-5">
                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="purchase_code">Envato
                                    Purchase Code <span class="text-red-600">*</span></Label>
                                <div class="sm:col-span-3">
                                    <input type="text"
                                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                        v-model="form.purchase_code" name="purchase_code" id="purchase_code"
                                        placeholder="Envato Purchase Code ..." ref="input" required />
                                    <span class="mb-2 ml-1 font-bold text-[10px] text-fuchsia-600"><a
                                            href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-">Where
                                            is my purchase code?.</a></span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4 mr-5">
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Verify
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
                <div class="sm:col-span-5 shadow-md">
                    <div class="rounded p-4">
                        <div class="mb-5">
                            <img :src="'/assets/images/web1.jpg'" alt="Image" class="object-cover w-full h-full" />
                        </div>
                        <div v-if="config[13].config_value === '0'">
                            <a href="https://codecanyon.net/user/nativecode" target="_blank" rel="noopener noreferrer">
                                <img :src="$page.props.imagePath + 'assets/admin/upgrade-to-extended-license.png'" alt="Image" class="object-cover w-full" />
                            </a>
                        </div>
                        <div v-if="config[13].config_value === '1'">
                            <a href="https://codecanyon.net/user/nativecode" target="_blank" rel="noopener noreferrer">
                                <img :src="$page.props.imagePath + 'assets/admin/get-support.png'" alt="Image" class="object-cover w-full" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </SettingSideBarLayout>
</template>

<script setup>

import SettingSideBarLayout from '../../../AdminSettingLayout/sidebar.vue'
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    config: Object,
    purchase_code: Object
});

const form = useForm({
    purchase_code: props.purchase_code
});

const submit = () => {
    form.post(route('admin.check.update'));
};

</script>
