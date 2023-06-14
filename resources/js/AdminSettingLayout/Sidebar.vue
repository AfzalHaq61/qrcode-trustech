<template>
       <Head title="User Edit" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

        

            <!-- Success Messege -->
            <Notifications />

              <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">

                <div class="grid grid-cols-10 gap-2 bg-white">
                    <div class="col-span-2">
                      <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         
         <li class="mt-0.5 w-full">
                <Accordian>
                    <template v-slot:nav>
                        <span class="py-2.7 text-sm ease-nav-brand my-0 mx-0 flex items-center whitespace-nowrap  transition-colors">
                        <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>Settings</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(153.000000, 2.000000)">
                                    <path class="fill-slate-800 opacity-60" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                                    <path class="fill-slate-800" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                                    </g>
                                </g>
                                </g>
                            </g>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Settings</span>
                        </span>
                    </template>
                    <template v-slot:subnav>
                        <div class="ml-2">
                            <Link :class="activeClass($page.url,'/admin/settings/general-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors"  :href="route('admin.settings.general_settings')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">General Configuration</span>
                            </Link>
                            <Link :class="activeClass($page.url,'/admin/settings/website-configuration-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.website_config_settings')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">Website Configuration</span>
                            </Link>
                            <Link :class="activeClass($page.url,'/admin/settings/website-qr-generator-configuration-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.website_qr_config_settings')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">QR Generator Configuration</span>
                            </Link>

                            <Link :class="activeClass($page.url,'/admin/settings/payment-method-configuration-setting')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.payment_method_config_setting')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">Payment Method Configuration</span>
                            </Link>
                            <Link :class="activeClass($page.url,'/admin/settings/google-configuration-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.google_configuration_setting')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">
                                 Google Configuration</span>
                            </Link>
                            <Link :class="activeClass($page.url,'/admin/settings/email-configuration')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.email_configuration')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">
                                 Email Configuration</span>
                            </Link>
                            
                        </div>
                    </template>
                </Accordian>
              </li>

               <li>
                  <Link  :class="activeClass($page.url,'/admin/settings/license')" :href="route('admin.settings.licence')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                     <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                     <span class="ml-3">License</span>
                  </Link>
               </li>
               <li :class="activeClass($page.url,'/admin/settings/tax-settings')">
                  <Link :href="route('admin.settings.tax_setting')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                     <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                     <span class="ml-3">Invoice & Tax</span>
                  </Link>
               </li>

               <li :class="activeClass($page.url,'/admin/settings/check-update')">
                  <Link :href="route('admin.settings.check_update')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                     <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                     <span class="ml-3">Check & Update</span>
                  </Link>
               </li>
        
      </ul>
   </div>                      
  </div>

          <slot/>
    <!-- main content -->
       </div>
     </div>  
    </div>
  </div>
</AdminLayout>     


  

</template>

<script setup>
import { ref, onMounted } from 'vue'
import {
  Collapse,
  initTE,
} from "tw-elements";

onMounted(() => {
   initTE({ Collapse });
})


function activeClass(url,customUrl){
    

    // carBrands.Contains(car1);
     if(url==customUrl){ 
        return 'bg-white';
     }else{
        return '';
     } 
   
   
}




</script>