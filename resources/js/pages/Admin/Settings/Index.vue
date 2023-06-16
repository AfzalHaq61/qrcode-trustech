<template>
                
          <SettingSideBarLayout>

            <div class="col-span-8">
             
   
            <form   role="form">
              <h6 class="text-lg font-bold dark:text-white">General Configuration Settings</h6>

                <div class="mt-10 grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Application Type <span class="text-red-600">*</span></Label>
                        <div class="sm:col-span-3">
                          <select v-model="form.application_type"  class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                          <option v-for="application in applicationType" :value="application.text">{{ application.text }}</option>
                          </select>
                        </div> 
                
                    </div>
                    <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Timezone <span class="text-red-600">*</span></Label>
                            <select  v-model="form.timezone_value"   class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                             <option v-for="timezone in timezonelist" :value="timezone">{{ timezone }}</option>
                          </select>
                    </div>
                    <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Currency <span class="text-red-600">*</span></Label>
                            <select  v-model="form.currency_value" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                                <option v-for="currency in  currencies" :value=" currency.name ">{{ currency.name }}</option>
                            </select>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-6">
                    
                    <div class="sm:col-span-2">
                        <h6 class="text-blue-600/100">Default Plan Term Settings</h6>
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Default Plan Term">Default Plan Term <span class="text-red-600">*</span></Label>
                        <select v-model="form.plan_term_setting"  class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                          <option v-for="planTermSetting in  defaultPlanTermSetting" :value="planTermSetting.text">{{ planTermSetting.text }}</option>
                        </select>
                
                    </div>
                    <div class="sm:col-span-2">
                            <h6 class="text-blue-600/100">Cookie Consent Settings</h6>
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Cookie Consent Setting">Cookie Consent Settings <span class="text-red-600">*</span></Label>
                            <select v-model="form.consent_setting"  class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                              <option v-for="cookieSetting in  cookieConsentSetting" :value="cookieSetting.text">{{ cookieSetting.text }}</option>
                            </select>
                    </div>
                    <div class="sm:col-span-2">
                            <h6 class="text-blue-600/100">Image Upload Limit</h6>
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Size">Size <span class="text-red-600">*</span></Label>
                          <input
                          type="number"
                          class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                          
                          v-model="form.size"
                          ref="input"
                          />
                    </div>
                </div>

                <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-blue-600/100">Share Content Setting</h6>
                </div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Share Content<span class="text-red-600">*</span></Label>
                        <textarea id="message" v-model="form.share_content" rows="4" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Write your thoughts here..."></textarea>

                        <InputError class="mt-2"  />
                    </div>
                    <div class="sm:col-span-2">
                         <label class="mt-6">Short Codes</label>
                         <p class="leading-[1rem]">##QRLINK## - QR Code Image Link</p>
                         <p class="leading-[1rem]">##APPNAME## - APP NAME</p>
                    </div>
                </div>
                <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-blue-600/100">Tawk Chat Settings</h6>
                </div>
                <div class="grid grid-cols-1 gap-y-8 sm:grid-cols-2">
                  <!-- <div class="sm:col-span-1">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Tawk Chat URL (s1.src)<span class="text-red-600">*</span></Label>
                        <input
                          type="text"
                          disabled
                          value="https://embed.tawk.to/"
                          class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                         
                          ref="input"
                          />
                        <InputError class="mt-2"  />
                    </div> -->
                    <div class="sm:col-span-1">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Tawk Chat URL (s1.src)<span class="text-red-600"> *</span></Label>
                        
                          <div class="flex">
                          <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            https://embed.tawk.to/
                          </span>
                          <input type="text"  v-model="form.tawk_chat"  id="website-admin" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Tawk Chat Key">
                          </div> 
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
const applicationType=ref([
    {text:'barcode'},
    {text:'qrcode'},
    {text:'both'},
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
    application_type: '',
    consent_setting: '',
    plan_term_setting: '',
    timezone_value:'',
    currency_value:'',
    size:'',
    tawk_chat:'',
    share_content:''


});



</script>
