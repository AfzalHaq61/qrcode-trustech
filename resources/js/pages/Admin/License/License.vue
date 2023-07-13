<template>          
    <SettingSideBarLayout>
        <div class="col-span-8 w-full px-6 py-6 mx-auto">
            <!-- License -->
            <form @submit.prevent="submit" role="form">
                <h6 class="text-lg font-bold dark:text-white">License</h6>
            
                <div class="mt-10">
                    <div>
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="purchase_code">Envato Purchase Code <span class="text-red-600">*</span></Label>
                        <div class="sm:col-span-3">
                            <input
                                type="text"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                v-model="form.purchase_code"
                                name="purchase_code"
                                id="purchase_code"
                                placeholder="Envato Purchase Code ..."
                                ref="input"
                                required
                            />
                            <span class="mb-2 ml-1 font-bold text-[10px] text-fuchsia-600"><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-">Where is my purchase code?.</a></span>
                        </div> 
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        Verify
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
    config: Object
});

const form = useForm({
    purchase_code: props.config[32].config_value,
});

const submit = () => {
    form.post(route('admin.verify.license'));
};

</script>
