<template>
    <Head title="User Index" />
        <AdminLayout>
            <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

                <!-- Success Messege -->
                <Notifications />

                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-full max-w-full px-3">
                        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Users</h6>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="space-y-2">
  <!-- Button trigger vertically centered modal-->
  <button
    type="button"
    class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
    data-te-toggle="modal"
    data-te-target="#exampleModalCenter"
    data-te-ripple-init
    data-te-ripple-color="light">
    Vertically centered modal
  </button>


</div>



<!--Verically centered modal-->
<div
  data-te-modal-init
  style="left: 21.5rem; !important"
  class="fixed left-10 top-0 z-[1055] hidden h-full w-3/5 overflow-y-auto overflow-x-hidden outline-none"
  id="exampleModalCenter"
  tabindex="-1"
  aria-labelledby="exampleModalCenterTitle"
  aria-modal="true"
  role="dialog">
  <div
    data-te-modal-dialog-ref
    class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
    <div
      class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
      
      <i class="fa-solid fa-check"></i>

      <!--Modal body-->
     

      <!--Modal footer-->
      <div
        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <button
          type="button"
          class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
          data-te-modal-dismiss
          data-te-ripple-init
          data-te-ripple-color="light">
          Close
        </button>
        <button
          type="button"
          class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
          data-te-ripple-init
          data-te-ripple-color="light">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>




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
                                    <Link :href="route('admin.update.status', { id: user.id })"  class="text-xs font-semibold leading-tight text-slate-400 mr-2"><span v-if="user.status == 0">Activate</span><span v-else>Dectivate</span> </Link>
                                    <Link :href="route('admin.delete.user', { id: user.id })" class="text-xs font-semibold leading-tight text-slate-400">Delete</Link>
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
