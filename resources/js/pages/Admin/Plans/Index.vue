<template>
    <Head title="Plan Index" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex justify-between p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Plans Table</h6>
                            <Link :href="route('admin.add.plan')">
                                <PrimaryButton>Add Plan</PrimaryButton>
                            </Link>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                S.NO</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                PLAN NAME</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                PLAN PRICE</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                PLAN VALIDITY</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                STATUS</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(plan, index) in plans.data" :key="plan.id">
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ index + 1 }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ plan.plan_name }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight"><span v-if="plan.plan_price === 0">Free</span><span v-else>{{ config[1].config_value }} {{ plan.plan_price }}</span></p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    <span v-if="plan.validity === '9999'">Forever</span>
                                                    <span v-if="plan.validity === '31'">Monthly</span>
                                                    <span v-if="plan.validity === '366'">Yearly</span>
                                                    <span v-if="plan.validity >= '1' && plan.validity != '31' && plan.validity != '366' && plan.validity != '9999'">{{ plan.validity }} Days</span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span v-if="plan.status === 0"
                                                    class="bg-gradient-to-tl from-red-600 to-red-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Discontinued</span>
                                                <span v-else
                                                    class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Active</span>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <Link :href="route('admin.edit.plan', { id: plan.id })"
                                                    class="text-xs font-semibold leading-tight text-slate-400 mr-2">Edit
                                                </Link>
                                                <Link :href="route('admin.delete.plan', { id: plan.id })"
                                                    class="text-xs font-semibold leading-tight text-slate-400 mr-2"><span
                                                    v-if="plan.status == 0">Activate</span><span v-else>Dectivate</span>
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <Pagination :data="plans"> </Pagination>
        </div>
    </AdminLayout>
</template>

<script setup>

const props = defineProps({
    plans: Object,
    currencies: Object,
    settings: Object,
    config: Object,
});

</script>

<script>
import { ref } from 'vue';

export default {
    data() {
        return {
            showModal: false,
        };
    },
    methods: {
        openModal() {
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
        },
    }
}

</script>
