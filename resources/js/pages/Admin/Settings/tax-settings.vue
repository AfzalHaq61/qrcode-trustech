<template>
                
    <SettingSideBarLayout>

      <div class="col-span-8">
   
      <div class="grid grid-rows-2">
      <div> 
      <form   role="form">
        <h6 class="text-lg font-bold dark:text-white">Tax Setting</h6>
       
        
          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Invoice Number Prefix<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    v-model="form.invoiceNumberPrefix"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Name<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.ultimateQrCodeMaker"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Email<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.email"
                    ref="input"
                    />
              </div>
          </div>


          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Phone<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    v-model="form.phone"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Address<span class="text-red-600">*</span></Label>
                      <textarea  v-model="form.address" id="message" rows="2" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Write your thoughts here..."></textarea>

              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">City<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.city"
                    ref="input"
                    />
              </div>
          </div>

          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">State/Province<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    v-model="form.state_province"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Zip Code<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.zipCode"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Country<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.country"
                    ref="input"
                    />
              </div>
          </div>


          
          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Tax Name<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    v-model="form.taxName"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Tax ID<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.taxId"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-2">
                     <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Tax Value<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.taxValue"
                    ref="input"
                    />
              </div>
          </div>
          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-6">
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Invoice Footer<span class="text-red-600">*</span></Label>
                  <textarea  v-model="form.invoiceFooter" id="message" rows="2" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Write your thoughts here..."></textarea>
              </div>
          </div>
          <div class="flex items-center justify-end mt-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                   Save 
                 </button>
          </div>
      </form>
       
        
    </div>
      <div>
        
        <form   role="form">
        <h6 class="text-lg font-bold dark:text-white">Invoice Email Setting</h6>
       
        
          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-12">
              <div class="sm:col-span-6">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Email Heading<span class="text-red-600">*</span></Label>
                  <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                    v-model="form.emailHeading"
                    ref="input"
                    />
              </div>
              <div class="sm:col-span-6">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Email Footer<span class="text-red-600">*</span></Label>
                    <input
                    type="text"
                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                    v-model="form.emailFooter"
                    ref="input"
                    />
              </div>
           </div>
            <div class="flex items-center justify-end mt-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save 
                  </button>
          </div>
           </form>   
        
      </div>
      </div>
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
import { ref ,onMounted } from 'vue'
import { useForm } from '@inertiajs/vue3';
import { Collapse, initTE } from "tw-elements";
defineProps({ timezonelist: Array ,currencies:Array});

onMounted(() => {
    initTE({ Collapse });
});
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
invoiceNumberPrefix:'INV-',
ultimateQrCodeMaker:'Ultimate QR Code Maker',
email:'sales@ultimategr.in',
phone:'+91987654321',
address:'East Coast Road',
taxId:'SPN125553322',
city:'Chennai',
state_province:'Tamilnadu',
zipCode:600024,
country:'India',
taxName:'Good and Service Tax',
taxValue:18,
invoiceFooter:'Thank you very much for doing bussiness with us. we look forward to working with you again!',
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
