<template>
                
    <SettingSideBarLayout>

      <div class="col-span-8">
       
        

      <form   role="form">
        <h6 class="text-lg font-bold dark:text-white">Email Configuration Settings</h6>
       
        
          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">reCaptcha Enable<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    v-model="form.senderName"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Sender Email Address<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.senderEmailAddress"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Mailer Driver<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.smtp"
                    ref="input"
                    />
              </div>
          </div>


          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">reCaptcha Enable<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    v-model="form.senderName"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Sender Email Address<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.senderEmailAddress"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Mailer Driver<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.smtp"
                    ref="input"
                    />
              </div>
          </div>

          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Mailer Host<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    v-model="form.mailerHost"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Mailer Port<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.mailerPort"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Mailer Encryption<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.mailerEncryption"
                    ref="input"
                    />
              </div>
          </div>


          
          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Mailer Username<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    v-model="form.mailerUserName"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Mailer Password<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.mailerPassword"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                    <button class="mt-8 bg-blue-500 text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:hover:bg-blue-700 focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
                    >
                    Test Mail
                    </button>
                    <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Test Mail
                    </button> -->
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
senderName:'easyqrcode',
senderEmailAddress:'noreply@ultimateqr.in',
smtp:'smtp',
mailerHost:'sandbox.smtp.mailtrap.io',
mailerPort:2525,
mailerEncryption:'tls',
mailerUserName:'dd14ecb5f55d9e',
mailerPassword:'1233534543',




});



</script>
