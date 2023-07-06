<template>
    <Head title="Transactions Index" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />
            <ConfirmationModel ref="myChild"  :modalData="modalData"/>

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Transactions</h6>
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
                                                TRANSACTION DATE</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                PAYMENT TRANS ID</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                CUSTOMER NAME</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                GATEWAY NAME</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                AMOUNT</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                STATUS</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(transaction, index) in transactions.data" :key="transaction.id">
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ index + 1 }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ formatDate(transaction.created_at) }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ transaction.transaction_id }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ transaction.name }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ transaction.payment_gateway_name }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ currencySymbol(transaction.transaction_currency) }}{{ transaction.transaction_amount }}</p>
                                            </td>
                                            <td
                                                class="px-3 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span v-if="transaction.payment_status === 'SUCCESS'"
                                                    class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Paid</span>
                                                    <span v-if="transaction.payment_status === 'FAILED'"
                                                        class="bg-gradient-to-tl from-red-600 to-red-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Failed</span>
                                                <span v-if="transaction.payment_status === 'PENDING'"
                                                    class="bg-gradient-to-tl from-orange-600 to-orange-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Pending</span>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <Link v-if="transaction.payment_status === 'SUCCESS'" :href="route('admin.view.invoice', { id: transaction.id })"
                                                    class="text-xs font-semibold leading-tight text-slate-400 mr-2">Invoice
                                                </Link>
                                                <Link v-if="transaction.payment_status != 'PENDING'" :href="route('admin.trans.status', { id: transaction.id, status: 'PENDING'})"
                                                    class="text-xs font-semibold leading-tight text-slate-400 mr-2">Pending</Link>
                                                <button @click="success(transaction.id)" v-if="transaction.payment_status != 'SUCCESS'" 
                                                    class="text-xs font-semibold leading-tight text-slate-400 mr-2">Success</button>
                                                <Link v-if="transaction.payment_status != 'FAILED'" :href="route('admin.trans.status', { id: transaction.id, status: 'FAILED' })"
                                                    class="text-xs font-semibold leading-tight text-slate-400">Failed</Link>
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
            <Pagination :data="transactions"> </Pagination>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref } from 'vue'
import ConfirmationModel from '../../../Components/Modals/Modal.vue'
const props = defineProps({
    transactions: Object,
    settings: Object,
    currencies: Object,
});

const myChild = ref(null);
  const modalData = ref({
        title:'',
        desc:'',
        btnText:'Yes,Proceed',
        link:''  
 });
 const success=((idd)=>{
    
    myChild.value.childMethod();
    modalData.value = {
        ...modalData.value,
        title:'Are you sure?',
        desc:'If you proceed with this transaction, you will have payment status success this plan.',
        link:route('admin.trans.status', { id: idd, status: 'SUCCESS' })
    } 
    
});

</script>

<script>
export default {
    methods: {
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

        currencySymbol(transaction_currency) {
            var symbol = '';
            this.currencies.forEach(currency => {
                if (transaction_currency == currency.iso_code) {
                    symbol = currency.symbol;
                }
            });

            return symbol;
        },
    }
}

</script>
