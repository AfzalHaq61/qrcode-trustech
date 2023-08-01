<template>
    <Head title="QR Codes Index" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <ConfirmationModel ref="myChild"  :modalData="modalData"/>
            <Notifications />

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex items-center justify-between p-6 pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Qr Codes</h6>
                            <Link :href="route('admin.create.qr')">
                                <PrimaryButton><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg><span class="ml-1">Create</span></PrimaryButton>
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
                                                NAME</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                TYPE</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                CREATED ON</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                STATUS</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(qr_code, index) in qr_codes.data" :key="qr_code.id">
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ index + 1 }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight text-blue-600 dark:text-blue-500"><Link :href="route('admin.download.qrcode', { id: qr_code.qr_code_id })">{{ qr_code.name }}</Link></p>
                                            </td>
                                            <td
                                                class="px-3 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <!-- <span class="bg-black px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"><Link :href="route('admin.type.qrcodes', { type: qr_code.type })">{{ qr_code.type }}</Link></span> -->
                                                <span class="inline-block rounded-1.8 bg-info px-2.5 py-1.4 text-xs font-bold uppercase whitespace-nowrap leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]"><Link :href="route('admin.type.qrcodes', { type: qr_code.type })">{{ qr_code.type }}</Link></span>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ formatDate(qr_code.created_at) }}</p>
                                            </td>
                                            <td
                                                class="px-3 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span v-if="qr_code.status === 0"
                                                    class="bg-gradient-to-tl from-red-600 to-red-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Deactivated</span>
                                                <span v-else
                                                    class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Activated</span>
                                            </td>
                                            <td class="px-3 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <Menu as="div" class="relative inline-block text-left">
                                                    <div>
                                                    <MenuButton>
                                                        <span class="text-xs font-semibold leading-tight text-slate-400 mr-2">Actions</span>
                                                        <svg class="w-2 transition-all duration-200 transform" :class="{
                                                            'rotate-180': isOpen,
                                                            'rotate-0': !isOpen,
                                                        }" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 10" aria-hidden="true">
                                                                <path d="M15 1.2l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <ChevronDownIcon class="-mr-1 h-5 w-5 text-gray-400" aria-hidden="true" />
                                                    </MenuButton>
                                                    </div>

                                                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                                        <MenuItems class="absolute right-0 z-100 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                            <div class="py-1">
                                                            <MenuItem v-slot="{ active }">
                                                                <Link :href="route('admin.qr.statistics', { id: qr_code.qr_code_id })" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Statistics</Link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <Link :href="route('admin.download.qrcode', { id: qr_code.qr_code_id })" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Download QR</Link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <Link :href="route('admin.edit.qr', { id: qr_code.qr_code_id })" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Edit</Link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <button @click="activateDeactivate(qr_code.qr_code_id)"  :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']"><span v-if="qr_code.status === 0">Activate</span><span v-else>Deactivate</span></button>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <button  @click="deleteRecord(qr_code.qr_code_id)"  :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Delete</button>
                                                            </MenuItem>
                                                            </div>
                                                        </MenuItems>
                                                    </transition>
                                                </Menu>
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
            <Pagination :data="qr_codes"> </Pagination>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { ref } from 'vue'
import ConfirmationModel from '../../../Components/Modals/Modal.vue'

const open = ref(true)


const props = defineProps({
    qr_codes: Object,
    settings: Object,
});

const myChild = ref(null);
  const modalData = ref({
        title:'',
        desc:'',
        btnText:'Yes,Proceed',
        link:''  
 });
 const deleteRecord=((idd)=>{
    
    myChild.value.childMethod();
    modalData.value = {
        ...modalData.value,
        title:'WARNING!',
        desc:'This action will remove user account and user data. It is not revertable action.',
        link:route('admin.delete.qr', { id: idd })
    } 
    
});

const activateDeactivate=((idd)=>{
    myChild.value.childMethod();
    modalData.value = {
        ...modalData.value,
        title:'Are you sure?',
        desc:'If you proceed, you will active/deactivate this user data.',
        link:route('admin.update.qr.status', { id: idd })
    } 
});


</script>

<script>
import { ref } from 'vue';
import Modal from '@/Components/Modals/Modal.vue'
export default {
    methods: {
        getPlan(planDetails) {
            const plan = JSON.parse(planDetails);
            if (plan) {
                return plan.plan_name;
            } else {
                return 'No Plan';
            }
        },

        getPlanPrice(planDetails) {
            const plan = JSON.parse(planDetails);
            if (plan) {
                return plan.plan_price ? '(' + this.config[1].config_value + ' ' + plan.plan_price + ')' : '(Free)';
            }
        },

        formatDate(date) {
            return new Date(date).toLocaleString('en-US', {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                hour12: true,
            });
        },
    }
}

</script>
