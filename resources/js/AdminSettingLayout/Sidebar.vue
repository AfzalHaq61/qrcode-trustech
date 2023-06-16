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

    
    
     
        <li :class="activeSetting($page.url)">
            <!-- <Link :href="route('admin.settings.tax_setting')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                     <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                     <span class="ml-3">Invoice & Tax</span>
                  </Link> -->
        <a
          class="group relative flex  items-center border-0  px-2 py-4 text-left text-base text-neutral-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[0px] [&[data-te-collapse-collapsed]]:transition-none"
          type="button"
          data-te-collapse-init
          data-te-collapse-collapsed
          data-te-target="#collapseThree"
          aria-expanded="true"
          aria-controls="collapseThree">
          <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>settings</title><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero"><g transform="translate(1716.000000, 291.000000)"><g transform="translate(304.000000, 151.000000)"><polygon class="fill-slate-800 opacity-60" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon><path class="fill-slate-800 opacity-60" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"></path><path class="fill-slate-800" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path></g></g></g></g></svg>
          <!-- <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
           -->
           <span class="ml-3">Settings</span>
        
          <span
            class="-mr-1 ml-auto  h-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-6 w-6">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
          </span>
        </a>
        </li>
     
     
        <ul  
        id="collapseThree"
        class="!visible hidden px-0"
        data-te-collapse-item
        aria-labelledby="headingThree"
        data-te-parent="#accordionExample">
          <li class="mt-0.5 w-full"> 
            <Link :class="activeClass($page.url,'/admin/settings/general-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors"  :href="route('admin.settings.general_settings')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">General Configuration</span>
            </Link>
          </li>
          <li class="mt-0.5 w-full">
            <Link :class="activeClass($page.url,'/admin/settings/website-configuration-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.website_config_settings')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">Website Configuration</span>
            </Link>
         </li>
          <li class="mt-0.5 w-full">
            <Link :class="activeClass($page.url,'/admin/settings/website-qr-generator-configuration-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.website_qr_config_settings')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">QR Generator Configuration</span>
            </Link>
          </li>
          <li class="mt-0.5 w-full">
            <Link :class="activeClass($page.url,'/admin/settings/payment-method-configuration-setting')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.payment_method_config_setting')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">Payment Method Configuration</span>
            </Link>
          </li>
          <li class="mt-0.5 w-full">
            <Link :class="activeClass($page.url,'/admin/settings/google-configuration-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.google_configuration_setting')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">
                                 Google Configuration</span>
            </Link>
          </li>
          <li class="mt-0.5 w-full">
            <Link :class="activeClass($page.url,'/admin/settings/email-configuration')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.email_configuration')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">
                                 Email Configuration</span>
            </Link>
          </li>
          
  
        </ul>
         <!-- <li class="mt-0.5 w-full">
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
              </li> -->

               <li>
                  <Link  :class="activeClass($page.url,'/admin/settings/license')" :href="route('admin.settings.licence')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                     <!-- <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg> -->
                     <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>document</title><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero"><g transform="translate(1716.000000, 291.000000)"><g transform="translate(154.000000, 300.000000)"><path class="fill-slate-800 opacity-60" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path><path class="fill-slate-800" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path></g></g></g></g></svg>
                     <span class="ml-3">License</span>
                  </Link>
               </li>
               <li :class="activeClass($page.url,'/admin/settings/tax-settings')">
                  <Link :href="route('admin.settings.tax_setting')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                     <!-- <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg> -->
                     <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>document</title><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero"><g transform="translate(1716.000000, 291.000000)"><g transform="translate(154.000000, 300.000000)"><path class="fill-slate-800 opacity-60" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path><path class="fill-slate-800" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path></g></g></g></g></svg>

                     <span class="ml-3">Invoice & Tax</span>
                  </Link>
               </li>

               <li :class="activeClass($page.url,'/admin/settings/check-update')">
                  <Link :href="route('admin.settings.check_update')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                     <!-- <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg> -->
                     <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>document</title><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero"><g transform="translate(1716.000000, 291.000000)"><g transform="translate(154.000000, 300.000000)"><path class="fill-slate-800 opacity-60" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path><path class="fill-slate-800" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path></g></g></g></g></svg>

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

function activeSetting(url){

}
function activeClass(url,customUrl){
    

    // carBrands.Contains(car1);
     if(url==customUrl){ 
        return 'bg-white';
     }else{
        return '';
     } 
   
   
}




</script>