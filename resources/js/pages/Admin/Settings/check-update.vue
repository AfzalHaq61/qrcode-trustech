<template>
                
    <SettingSideBarLayout>

      <div class="col-span-8">
        <div class="grid grid-rows-2">
         <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-12">
            <div class="sm:col-span-7">
                <form   role="form">
        <h6 class="text-lg font-bold dark:text-white">Check & Update</h6>
       
          <div class="mt-10 grid grid-cols-1 gap-x-2  sm:grid-cols-12">
              <div class="sm:col-span-8">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Envato Purchase Code <span class="text-red-600">*</span></Label>
                  <div class="sm:col-span-3">
                        <input
                        type="text"
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"

                        v-model="form.envatoPurchaseCode"
                        ref="input"
                        />
                        <span class="text-sm text-blue-600/100">Where is my purchase code?.</span>
            
                  </div> 
              </div>

              <div class="sm:col-span-2">
                  <button class="mt-8 bg-blue-500 text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:hover:bg-blue-700 focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
                    >
                       Verify
                    </button>
              </div>
          </div>
      </form>
            </div>
            <div class="sm:col-span-5">
                    <div class="grid grid-rows-2">
                    <div class="p-4 h-48">
                        <img :src="'/assets/images/web1.jpg'" alt="Image" class="object-cover w-full h-full"/>
                    </div>
                    <div class="p-4 h-32">
                        <img :src="'/assets/images/web2.jpg'" alt="Image" class="object-cover w-full h-full"/>
                    </div>
                     
                    </div>

                   <!-- <img :src="'/assets/img/vr-bg.jpg'"/> -->
             </div>       
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
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3';
defineProps({ timezonelist: Array ,currencies:Array});


const form = useForm({
    envatoPurchaseCode:'fe99af5c-8c18-42bd-896e-7be13ccd41b2'
});

</script>
