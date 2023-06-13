<template>
                
    <SettingSideBarLayout>

      <div class="col-span-8">
       

      <form   role="form">
        
          
          <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">App Name<span class="text-red-600">*</span></Label>
                        <input
                        v-model="form.appName"
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                       
                       
                        />
                       
                    </div>
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Site Name<span class="text-red-600">*</span></Label>
                         <input
                         v-model="form.siteName"
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                       
                        /> 
                    </div>
         </div>

         <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">SEO Meta Description<span class="text-red-600">*</span></Label>
                        <textarea  v-model="form.seoMetaDescription" id="message" rows="2" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Write your thoughts here..."></textarea>


                    </div>
                    <div class="sm:col-span-3">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">SEO Keywords<span class="text-red-600">*</span></Label>
                         <textarea id="message" v-model="form.seoKeyword" rows="2" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Write your thoughts here..."></textarea>

                    </div>
         </div>

      
        

          <div class="flex items-center justify-end mt-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                   Update
                 </button>
          </div>
      </form>
       
         
      </div>
    
    </SettingSideBarLayout>        

          
</template>

<script setup>
import SettingSideBarLayout from '../../../AdminSettingLayout/sidebar.vue'
import GeneralConfigSetting from '../../../Components/Settings/GeneralSettings/GeneralConfigurationSetting.vue'
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3';



const form = useForm({
    seoKeyword: '',
    seoMetaDescription: 'Ultimate QR is the advance customizable QR code generator. Ultimate QR is simple and modern application to create powerful QR Codes.',
    appName: '',
    seoKeyword:'qr code maker, qr code generator , barcode maker, barcode generator',
});



</script>
