<template>
    <Head title="User Index" />
        <AdminLayout>
            <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

                <!-- Success Messege -->
                <Notifications />
                <ConfirmationModel ref="myChild"  :modalData="modalData"/>

                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-full max-w-full px-3">
                        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Users</h6>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">S.NO</th>
                                    <th class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">FULL NAME</th>
                                    <th class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">EMAIL</th>
                                    <th class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">CURRENT PLAN</th>
                                    <th class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">JOINED</th>
                                    <th class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">STATUS</th>
                                    <th class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(user, index) in users.data" :key="user.id">
                                    <td class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-xs font-semibold leading-tight">{{ index + 1 }}</p>
                                    </td>
                                    <td class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-xs font-semibold leading-tight">{{ user.name }}</p>
                                    </td>
                                    <td class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-xs font-semibold leading-tight">{{ user.email }}</p>
                                    </td>
                                    <td class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{ getPlan(user.plan_details) }} <span>{{ getPlanPrice(user.plan_details) }}</span></p>
                                    </td>
                                    <td class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-xs font-semibold leading-tight">{{ formatDate(user.created_at) }}</p>
                                    </td>
                                    <td class="px-3 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <span v-if="user.status == 0" class="bg-gradient-to-tl from-red-600 to-red-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">InActive</span>
                                    <span v-else class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Active</span>
                                    </td>
                                    <td class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <Link :href="route('admin.edit.user', { id: user.id })" class="text-xs font-semibold leading-tight text-slate-400 mr-2">Edit</Link>
                                    <Link :href="route('admin.change.user.plan', { id: user.id })" class="text-xs font-semibold leading-tight text-slate-400 mr-2">Change Plan</Link>
                                    <button  @click="activateDeactivate(user.id)" class="text-xs font-semibold leading-tight text-slate-400 mr-2"><span v-if="user.status == 0">Activate</span><span v-else>Dectivate</span> </button>
                                    <button  @click="deleteRecord(user.id)"  class="text-xs font-semibold leading-tight text-slate-400">Delete</Button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- <Modal Buttontext="Delete" /> -->

                <!-- Pagination -->
                <Pagination :data="users"> </Pagination>
          </div>
        </AdminLayout>
</template>

<script setup>
import { ref,onMounted } from 'vue';
import ConfirmationModel from '../../../Components/Modals/Modal.vue'
import {
  Modal,
  initTE,
} from "tw-elements";
const props = defineProps({
    users: Object,
    settings: Object,
    config: Object,
});
onMounted(() => {
    initTE({ Modal });
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
        link:route('admin.update.status', { 'id': idd })
    } 
    
});
const activateDeactivate=((idd)=>{
    myChild.value.childMethod();
    modalData.value = {
        ...modalData.value,
        title:'Are you sure?',
        desc:'If you proceed, you will active/deactivate this user data.',
        link:route('admin.update.status', { 'id': idd })
    } 
});


</script>

<script>


export default {
    data() {
        return {
            showModal: false,
        };
    },
    mounted(){

         console.log("..check wether mounted is working or not ?");
    },
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

        openModal() {
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
        },
    }
}

</script>
