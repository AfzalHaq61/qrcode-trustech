<template>
                
    <SettingSideBarLayout>

      <div class="col-span-8">
       

      <form   role="form">
        <h6 class="text-lg font-bold dark:text-white">Payment Methods Configuration Settings</h6>
        <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6 class="text-blue-600/100">PayPal Settings</h6>
          </div>
          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Mode <span class="text-red-600">*</span></Label>
                  <div class="sm:col-span-3">
                    <select v-model="form.mode_value"  class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                    <option v-for="m in mode" :value="m.text">{{ m.text }}</option>
                    </select>
                  </div> 
          
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Client Key <span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.client_key"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Secret <span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.secret"
                    ref="input"
                    />
              </div>
          </div>


          <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6 class="text-blue-600/100">Razorpay Settings</h6>
          </div>
          <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Client Key<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.razor_pay"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-3">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Secret<span class="text-red-600">*</span></Label>

                   <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.razorpay_secret"
                    ref="input"
                    /> 
              </div>
          </div>

          <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6 class="text-blue-600/100">Stripe Settings</h6>
          </div>
          <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Publishable Key<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.publish_key"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-3">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Secret<span class="text-red-600">*</span></Label>

                   <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.stripe_secret"
                    ref="input"
                    /> 
              </div>
          </div>


          <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6 class="text-blue-600/100">Offline (Bank Transfer) Settings</h6>
          </div>
          <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Offline (Bank Transfer) Details<span class="text-red-600">*</span></Label>
                  <textarea id="message" v-model="form.offline_bank_tran_detail" rows="4" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Write your thoughts here..."></textarea>

                  <InputError class="mt-2"  />
              </div>
            
          </div>
         
         

          <div class="flex items-center justify-end mt-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                   Update
                 </button>
          </div>
      </form>
       
         
      </div>
    <!-- side bar menu list -->
      <!-- <div class="col-span-8">
        <GeneralConfigSetting/>
      </div> -->
        <!-- main content -->
    </SettingSideBarLayout>        

          
</template>

<script setup>
import SettingSideBarLayout from '../../../AdminSettingLayout/sidebar.vue'
import GeneralConfigSetting from '../../../Components/Settings/GeneralSettings/GeneralConfigurationSetting.vue'
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3';
defineProps({ timezonelist: Array ,currencies:Array});
const mode=ref([
{text:'sandbox'},

]);
const cookieConsentSetting=ref([
{text:'enable'},
{text:'disable'},
{text:'both'},
]);
const defaultPlanTermSetting=ref([
{text:'monthly'},
{text:'yearly'},
]);

const form = useForm({
mode_value: 'sandbox',
client_key:'YOUR_PAYPAL_CLIENT_ID',
secret:'YOUR_PAYPAL_SECRET',
razor_pay:'YOUR_RAZORPAY_KEY',
razorpay_secret:'YOUR_RAZORPAY_SECRETE',
publish_key:'pk_tes12411aef234s14234dq23rctq44qc2wzsafq234',
stripe_secret:'pk_tes12411aef234s14234dq23rctq44qc2wzsafq234',
offline_bank_tran_detail:'',
consent_setting: '',
plan_term_setting: '',
timezone_value:'',
currency_value:'',
size:'',
tawk_chat:'',
share_content:''


});



</script>
