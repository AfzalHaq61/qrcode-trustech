<template>
                
    <SettingSideBarLayout>

      <div class="col-span-8">
       

      <form   role="form">
        <h6 class="text-lg font-bold dark:text-white">Google Configuration Settings</h6>
        <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6 class="text-blue-600/100">Google reCAPTCHA Configuration Settings</h6>
          </div>
          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">reCaptcha Enable<span class="text-red-600">*</span></Label>
                  <div class="sm:col-span-3">
                    <select v-model="form.google_auth_enable_value"  class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                    <option v-for="authEnable in googleAuthEnable" :value="authEnable.text">{{ authEnable.text }}</option>
                    </select>
                    <span class="text-sm">if you did not get a reCAPTCHA (v2 Checkbox), create a <a href="#" class="text-blue-600/100">reCAPTCHA</a>.</span>
                  </div> 
                  <span></span>

          
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">reCAPTCHA Site Key <span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.recaptcha_site_key"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">reCAPTCHA Secret Key <span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.recaptcha_secrete_key"
                    ref="input"
                    />
              </div>
          </div>


          <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6 class="text-blue-600/100">Google OAuth Configuration Settings</h6>
          </div>
          <div class="grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-12">
              <div class="sm:col-span-3">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Google Auth Enable<span class="text-red-600">*</span></Label>
                  <select v-model="form.recaptcha_enable_value"  class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                    <option v-for="recaptcha in recaptchaEnable" :value="recaptcha.text">{{ recaptcha.text }}</option>
                  </select>
                  <!-- <span class="text-sm">if you did not get a google OAuth Client ID & Secret Key, follow a <a href="#" class="text-blue-600/100">steps</a>.</span>
              -->
              </div>
              <div class="sm:col-span-3">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Google Client ID<span class="text-red-600">*</span></Label>

                   <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.googleClientId"
                    ref="input"
                    /> 
              </div>
              <div class="sm:col-span-3">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Google Client Secret<span class="text-red-600">*</span></Label>

                   <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.googleClientSecret"
                    ref="input"
                    /> 
              </div>
              <div class="sm:col-span-3">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Google Redirect<span class="text-red-600">*</span></Label>

                   <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.googleRedirect"
                    ref="input"
                    /> 
              </div>
              
          </div>
          <div class="grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-12">
            <div class="sm:col-span-8">
                <span class="text-sm">if you did not get a google OAuth Client ID & Secret Key, follow a <a href="#" class="text-blue-600/100">steps</a>.</span>
             
              </div>
          </div>  

          <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6 class="text-blue-600/100">Google Analytics Configuration Settings</h6>
          </div>
          <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Google Analytics ID<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    placeholder="Google Analytics ID..."  
                    v-model="form.googleAnalyticsId"
                    ref="input"
                    />
                    <span class="text-sm">if you did not get a google analytics id, create a <a href="#" class="text-blue-600/100">new analytics id.</a></span>
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
const recaptchaEnable=ref([
{text:'on'},
{text:'off'},

]);
const googleAuthEnable=ref([
{text:'on'},
{text:'off'},

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
google_auth_enable_value:'on',
recaptcha_enable_value: 'on',
recaptcha_site_key:'RECAPTCHA_SITE_KEY',
recaptcha_secrete_key:'RECAPTCHA_SECRET_KEY',
razor_pay:'YOUR_RAZORPAY_KEY',
googleClientId:'GOOGLE_CLIENT_ID',
googleClientSecret:'GOOGLE_CLIENT_SECRET',
googleRedirect:'GOOGLE_REDIRECT',
googleAnalyticsId:'',



});



</script>
