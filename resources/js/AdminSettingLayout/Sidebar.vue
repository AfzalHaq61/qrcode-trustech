<template>
    <Head title="Settings" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- Success Messege -->
            <Notifications />
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div class="grid grid-cols-10 gap-2 relative min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="col-span-2">
                            <div class="h-full px-3 py-4 overflow-y-auto items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <ul class="space-y-2 font-medium">
                                    <li :class="activeSetting($page.url)">
                                        <span class="flex items-center px-4 py-2 cursor-pointer text-gray-900 rounded-md dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group relative border-0 text-left text-base transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[0px] [&[data-te-collapse-collapsed]]:transition-none"
                                            type="button"
                                            data-te-collapse-init
                                            data-te-collapse-collapsed
                                            data-te-target="#collapseThree"
                                            aria-expanded="true"
                                            aria-controls="collapseThree">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments-alt" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 8h4v4h-4z"></path>
                                                <path d="M6 4l0 4"></path>
                                                <path d="M6 12l0 8"></path>
                                                <path d="M10 14h4v4h-4z"></path>
                                                <path d="M12 4l0 10"></path>
                                                <path d="M12 18l0 2"></path>
                                                <path d="M16 5h4v4h-4z"></path>
                                                <path d="M18 4l0 1"></path>
                                                <path d="M18 9l0 11"></path>
                                            </svg>
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
                                        </span>
                                    </li>

                                    <ul id="collapseThree"
                                        class="!visible hidden px-0"
                                        data-te-collapse-item
                                        aria-labelledby="headingThree"
                                        data-te-parent="#accordionExample">
                                        <li class="mt-0.5 w-full">
                                            <Link :class="activeClass($page.url,'/admin/settings/general-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors"  :href="route('admin.settings.general_settings')">
                                               <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings-filled" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14.647 4.081a.724 .724 0 0 0 1.08 .448c2.439 -1.485 5.23 1.305 3.745 3.744a.724 .724 0 0 0 .447 1.08c2.775 .673 2.775 4.62 0 5.294a.724 .724 0 0 0 -.448 1.08c1.485 2.439 -1.305 5.23 -3.744 3.745a.724 .724 0 0 0 -1.08 .447c-.673 2.775 -4.62 2.775 -5.294 0a.724 .724 0 0 0 -1.08 -.448c-2.439 1.485 -5.23 -1.305 -3.745 -3.744a.724 .724 0 0 0 -.447 -1.08c-2.775 -.673 -2.775 -4.62 0 -5.294a.724 .724 0 0 0 .448 -1.08c-1.485 -2.439 1.305 -5.23 3.744 -3.745a.722 .722 0 0 0 1.08 -.447c.673 -2.775 4.62 -2.775 5.294 0zm-2.647 4.919a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" stroke-width="0" fill="currentColor"></path>
                                                </svg>
                                                <span class="duration-300 opacity-100 pointer-events-none ease-soft ml-3">General Configuration</span>
                                            </Link>
                                        </li>
                                        <li class="mt-0.5 w-full">
                                            <Link :class="activeClass($page.url,'/admin/settings/website-configuration-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.website_config_settings')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-app-window" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                                    <path d="M6 8h.01"></path>
                                                    <path d="M9 8h.01"></path>
                                                </svg>
                                                <span class="duration-300 opacity-100 pointer-events-none ease-soft ml-3">Website Configuration</span>
                                            </Link>
                                        </li>
                                        <li class="mt-0.5 w-full">
                                            <Link :class="activeClass($page.url,'/admin/settings/website-qr-generator-configuration-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.website_qr_config_settings')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-qrcode" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                                    <path d="M7 17l0 .01"></path>
                                                    <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                                    <path d="M7 7l0 .01"></path>
                                                    <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                                    <path d="M17 7l0 .01"></path>
                                                    <path d="M14 14l3 0"></path>
                                                    <path d="M20 14l0 .01"></path>
                                                    <path d="M14 14l0 3"></path>
                                                    <path d="M14 20l3 0"></path>
                                                    <path d="M17 17l3 0"></path>
                                                    <path d="M20 17l0 3"></path>
                                                </svg>
                                                <span class="duration-300 opacity-100 pointer-events-none ease-soft ml-3">QR Gen Configuration</span>
                                            </Link>
                                        </li>
                                        <li class="mt-0.5 w-full">
                                            <Link :class="activeClass($page.url,'/admin/settings/payment-method-configuration-setting')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.payment_method_config_setting')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-cashapp" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M17.1 8.648a.568 .568 0 0 1 -.761 .011a5.682 5.682 0 0 0 -3.659 -1.34c-1.102 0 -2.205 .363 -2.205 1.374c0 1.023 1.182 1.364 2.546 1.875c2.386 .796 4.363 1.796 4.363 4.137c0 2.545 -1.977 4.295 -5.204 4.488l-.295 1.364a.557 .557 0 0 1 -.546 .443h-2.034l-.102 -.011a.568 .568 0 0 1 -.432 -.67l.318 -1.444a7.432 7.432 0 0 1 -3.273 -1.784v-.011a.545 .545 0 0 1 0 -.773l1.137 -1.102c.214 -.2 .547 -.2 .761 0a5.495 5.495 0 0 0 3.852 1.5c1.478 0 2.466 -.625 2.466 -1.614c0 -.989 -1 -1.25 -2.886 -1.954c-2 -.716 -3.898 -1.728 -3.898 -4.091c0 -2.75 2.284 -4.091 4.989 -4.216l.284 -1.398a.545 .545 0 0 1 .545 -.432h2.023l.114 .012a.544 .544 0 0 1 .42 .647l-.307 1.557a8.528 8.528 0 0 1 2.818 1.58l.023 .022c.216 .228 .216 .569 0 .773l-1.057 1.057z"></path>
                                                </svg>
                                                <span class="duration-300 opacity-100 pointer-events-none ease-soft ml-3">Payment Configuration</span>
                                            </Link>
                                        </li>
                                        <li class="mt-0.5 w-full">
                                            <Link :class="activeClass($page.url,'/admin/settings/google-configuration-settings')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.google_configuration_setting')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google-analytics" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 9m0 1.105a1.105 1.105 0 0 1 1.105 -1.105h1.79a1.105 1.105 0 0 1 1.105 1.105v9.79a1.105 1.105 0 0 1 -1.105 1.105h-1.79a1.105 1.105 0 0 1 -1.105 -1.105z"></path>
                                                    <path d="M17 3m0 1.105a1.105 1.105 0 0 1 1.105 -1.105h1.79a1.105 1.105 0 0 1 1.105 1.105v15.79a1.105 1.105 0 0 1 -1.105 1.105h-1.79a1.105 1.105 0 0 1 -1.105 -1.105z"></path>
                                                    <path d="M5 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                </svg>
                                                <span class="duration-300 opacity-100 pointer-events-none ease-soft ml-3">
                                                Google Configuration</span>
                                            </Link>
                                        </li>
                                        <li class="mt-0.5 w-full">
                                            <Link :class="activeClass($page.url,'/admin/settings/email-configuration')" class="py-1 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.email_configuration')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                                                    <path d="M3 7l9 6l9 -6"></path>
                                                </svg>
                                                <span class="duration-300 opacity-100 pointer-events-none ease-soft ml-3">
                                                Email Configuration</span>
                                            </Link>
                                        </li>
                                    </ul>

                                    <li>
                                        <Link :class="activeClass($page.url,'/admin/license')" :href="route('admin.license')" class="flex items-center px-4 py-2 text-gray-900 rounded-md dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-license" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path>
                                                <path d="M9 7l4 0"></path>
                                                <path d="M9 11l4 0"></path>
                                            </svg>
                                            <span class="ml-3">License</span>
                                        </Link>
                                    </li>
                                    <li>
                                        <Link :class="activeClass($page.url,'/admin/settings/license')" :href="$page.props.appUrl +'languages'" class="flex items-center px-4 py-2 text-gray-900 rounded-md dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-language" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 5h7"></path>
                                                <path d="M9 3v2c0 4.418 -2.239 8 -5 8"></path>
                                                <path d="M5 9c0 2.144 2.952 3.908 6.7 4"></path>
                                                <path d="M12 20l4 -9l4 9"></path>
                                                <path d="M19.1 18h-6.2"></path>
                                            </svg>
                                            <span class="ml-3">Translations</span>
                                        </Link>
                                    </li>
                                    <li :class="activeClass($page.url,'/admin/tax-setting')">
                                        <Link :href="route('admin.tax.setting')" class="flex items-center px-4 py-2 text-gray-900 rounded-md dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-tax" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M9 14l6 -6"></path>
                                                <circle cx="9.5" cy="8.5" r=".5" fill="currentColor"></circle>
                                                <circle cx="14.5" cy="13.5" r=".5" fill="currentColor"></circle>
                                                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
                                            </svg>
                                            <span class="ml-3">Invoice & Tax</span>
                                        </Link>
                                    </li>
                                    <li>
                                        <Link :class="activeClass($page.url,'/admin/settings/license')" :href="route('admin.logs')" class="flex items-center px-4 py-2 text-gray-900 rounded-md dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                                <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                                            </svg>
                                            <span class="ml-3">Login Logs</span>
                                        </Link>
                                    </li>
                                    <li :class="activeClass($page.url,'/admin/check')">
                                        <Link :href="route('admin.check')" class="flex items-center px-4 py-2 text-gray-900 rounded-md dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-rotate-2" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M15 4.55a8 8 0 0 0 -6 14.9m0 -4.45v5h-5"></path>
                                                <path d="M18.37 7.16l0 .01"></path>
                                                <path d="M13 19.94l0 .01"></path>
                                                <path d="M16.84 18.37l0 .01"></path>
                                                <path d="M19.37 15.1l0 .01"></path>
                                                <path d="M19.94 11l0 .01"></path>
                                            </svg>
                                            <span class="ml-3">Check & Update</span>
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <slot/>
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
