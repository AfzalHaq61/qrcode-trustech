<template>
    <Head title="User Change Plan" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Change Plan</h6>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-6 overflow-x-auto">
                                <form @submit.prevent="submit" role="form">
                                    <div class="sm:col-span-3">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Plans">Plans
                                            <span class="text-red-600">*</span></Label>
                                            <select id="plan_id" name="plan_id" v-model="form.plan_id" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                                                <option v-for="plan in plans" :key="plan.id" :value="plan.id">{{ plan.plan_name }}</option>
                                            </select>
                                            <InputError class="mt-2" :message="form.errors.plan_id" />
                                    </div>

                                    <div class="mt-4">
                                        <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing">
                                            Change Plan
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
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    user_details: Object,
    plans: Object,
    settings: Object,
    config: Object
});

const form = useForm({
    user_id: props.user_details.id,
    plan_id: props.user_details.plan_id ? props.user_details.plan_id : 1,
});

const submit = () => {
    form.post(route('admin.update.user.plan'));
};
</script>
