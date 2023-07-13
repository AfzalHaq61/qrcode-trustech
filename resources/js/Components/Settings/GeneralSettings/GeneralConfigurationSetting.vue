<template>



        
            <form   role="form">
                <div class="mt-10 grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Full Name">Application Type <span class="text-red-600">*</span></Label>
                        <Select :options="applicationType"/>
                
                    </div>
                    <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Timezone <span class="text-red-600">*</span></Label>
                            <Select :options="timezonelist"/>
                    </div>
                    <div class="sm:col-span-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Currency <span class="text-red-600">*</span></Label>
                            <Select :options="currency"/>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-6">
                    
                    <div class="sm:col-span-2">
                        <h6 class="text-blue-600/100">Default Plan Term Settings</h6>
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Default Plan Term">Default Plan Term <span class="text-red-600">*</span></Label>
                        <Select :options="defaultPlanTerm"/>
                
                    </div>
                    <div class="sm:col-span-2">
                            <h6 class="text-blue-600/100">Cookie Consent Settings</h6>
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Cookie Consent Setting">Cookie Consent Settings <span class="text-red-600">*</span></Label>
                            <Select :options="CookieConsentSetting"/>
                    </div>
                    <div class="sm:col-span-2">
                            <h6 class="text-blue-600/100">Image Upload Limit</h6>
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Size">Size <span class="text-red-600">*</span></Label>
                            <Select :options="Size"/>
                    </div>
                </div>

                <div class="mt-10 pb-0 mb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-blue-600/100">Share Content Setting</h6>
                </div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Share Content<span class="text-red-600">*</span></Label>
                        <textarea id="message" rows="4" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" placeholder="Write your thoughts here..."></textarea>

                        <InputError class="mt-2"  />
                    </div>
                    <div class="sm:col-span-2">
                         <label class="mt-6">Short Codes</label>
                         <p class="leading-[1rem]">##QRLINK## - QR Code Image Link</p>
                         <p class="leading-[1rem]">##APPNAME## - APP NAME</p>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                         Update
                       </button>
                </div>
            </form>
        

</template>
<script setup>
import InputError from '../../InputError.vue';
import TextInput from '../../TextInput.vue';
import Select from '../../Select.vue';
import { ref } from 'vue'

defineProps({ timezonelist: Array });
const applicationType=ref({  
 name:'application_type',data: 
[
    {value:'qrcode',text:'qrcode'},
    {value:'barcode',text:'barcode'},
    {value:'both',text:'both'}

]});

const timzone=ref({  
 name:'timezone',data: 
[
    {value:'utc',text:'utc'},
    {value:'isl',text:'isl'},

]});
const currency=ref({  
 name:'currency',data: 
[
    {value:'usd',text:'usd'},
    {value:'pkr',text:'pkr'},

]});

const defaultPlanTerm=ref({  
 name:'default_plan_term',data: 
[
    {value:'monthly',text:'Monthly'},
    {value:'yearly',text:'Yearly'},

]});
const CookieConsentSetting=ref({  
 name:'cookie_consent_setting',data: 
[
    {value:'enable',text:'Enabled'},
    {value:'disable',text:'Disable'},
]});

const Size=ref({  
 name:'cookie_consent_setting',data: 
[
    {value:1,text:'1'},
    {value:2,text:'2'},
    {value:3,text:'3'},
]});


</script>
<!-- 
application  Timezone
              utc,Isl 
qrcode
both
bath

Currency
Usd
Pkr

Default plan Term
monthly
yearly

Cookie Consent Setting
enable
Disable -->