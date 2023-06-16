<template>
                
    <SettingSideBarLayout>

      <div class="col-span-8">

      <form   role="form">
        <h6 class="text-lg font-bold dark:text-white">Website Configuration Settings</h6>

        <div class="mt-10 grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-6">
            
            <div class="px-1 sm:col-span-6">
              <Label class="mb-2 ml-0 font-bold text-xs text-slate-700" for="banner image">Theme Colors <span class="text-red-600">*</span></Label>                
      <div class="radio-group">
              <label class="radio-container">
              <input value="#3131de" type="radio" name="theme_color">
              <span class="checkmark"></span>

              </label>
              <label class="radio-container">
              <input value="#150347"  type="radio" name="theme_color">
              <span class="checkmark-one"></span>

              </label>
              <label class="radio-container">
              <input value="#06a84a" type="radio" name="theme_color">
              <span class="checkmark-two"></span>

              </label>
              <label class="radio-container">
              <input value="#b3a106" type="radio" name="theme_color">
              <span class="checkmark-three"></span>

              </label>

              <label class="radio-container">
              <input value="#bd101e" type="radio" name="theme_color">
              <span class="checkmark-four"></span>
              </label>
              <label class="radio-container">
              <input value="#720872" type="radio" name="theme_color">
              <span class="checkmark-five"></span>
              </label>
              <label class="radio-container">
              <input value="#773943" type="radio" name="theme_color">
              <span class="checkmark-six"></span>
              </label>
              <label class="radio-container">
              <input value="#808080" type="radio" name="theme_color">
              <span class="checkmark-seven"></span>
              </label>
      </div>
            </div>
      </div>  

     
          <div class="mt-0 grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-6">
            
              <div class="sm:col-span-2">
                  <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="banner image">Banner Image <span class="text-red-600">*</span></Label>
                  <div class="sm:col-span-3">
    
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    <span>recommended size: 1000 x 667</span>
                  </div> 
          
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Website Logo <span class="text-red-600">*</span></Label>
                      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                      <span>recommended size: 200 x 90</span> 
              </div>
              <div class="sm:col-span-2">
                      <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Favicon <span class="text-red-600">*</span></Label>
                      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                      <span>recommended size: 200 x 200</span>
              </div>
          </div>
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

const form = useForm({
    seoKeyword: '',
    seoMetaDescription: 'Ultimate QR is the advance customizable QR code generator. Ultimate QR is simple and modern application to create powerful QR Codes.',
    appName: '',
    seoKeyword:'qr code maker, qr code generator , barcode maker, barcode generator',
});
</script>
<style scoped>
.radio-group {
  display: flex;
  align-items: center;
}

.radio-container {
  display: flex;
  align-items: center;
  cursor: pointer;
  font-size: 14px;
  margin-right: 20px;
}

.radio-container input[type="radio"] {
  position: absolute;
  opacity: 0;
}

.checkmark {
  position: relative;
  display: inline-block;
  width: 25px;
  height: 25px;
  background: #3131de;
  border: 1px solid #3131de;
  margin-right: 5px;
}


.checkmark::after {
  content: "";
  position: absolute;
  top: 3px;
  left: 7px;
  width: 7px;
  height: 15px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}

.checkmark-one {
  position: relative;
  display: inline-block;
  width: 25px;
  height: 25px;
  background: #150347;
  border: 1px solid #150347;
  margin-right: 5px;
}


.checkmark-one::after {
  content: "";
  position: absolute;
  top: 3px;
  left: 7px;
  width: 7px;
  height: 15px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}


.checkmark-two {
  position: relative;
  display: inline-block;
  width: 25px;
  height: 25px;
  background: #06a84a;
  border: 1px solid #06a84a;
;
  margin-right: 5px;
}


.checkmark-two::after {
  content: "";
  position: absolute;
  top: 3px;
  left: 7px;
  width: 7px;
  height: 15px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}

.checkmark-three {
  position: relative;
  display: inline-block;
  width: 25px;
  height: 25px;
  background: #b3a106;
  border: 1px solid #b3a106;
;
  margin-right: 5px;
}



.checkmark-three::after {
  content: "";
  position: absolute;
  top: 3px;
  left: 7px;
  width: 7px;
  height: 15px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}

.checkmark-four {
  position: relative;
  display: inline-block;
  width: 25px;
  height: 25px;
  background: #bd101e;
  border: 1px solid #bd101e;
;
  margin-right: 5px;
}

.checkmark-four::after {
  content: "";
  position: absolute;
  top: 3px;
  left: 7px;
  width: 7px;
  height: 15px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}

.checkmark-five {
  position: relative;
  display: inline-block;
  width: 25px;
  height: 25px;
  background: rgb(114, 8, 114);
  border: 1px solid #720872;
;
  margin-right: 5px;
}

.checkmark-five::after {
  content: "";
  position: absolute;
  top: 3px;
  left: 7px;
  width: 7px;
  height: 15px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}

.checkmark-six {
  position: relative;
  display: inline-block;
  width: 25px;
  height: 25px;
  background: rgb(184, 66, 85);
  border: 1px solid #773943;
;
  margin-right: 5px;
}

.checkmark-six::after {
  content: "";
  position: absolute;
  top: 3px;
  left: 7px;
  width: 7px;
  height: 15px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}

.checkmark-seven {
  position: relative;
  display: inline-block;
  width: 25px;
  height: 25px;
  background: #808080;
  border: 1px solid #808080;
;
  margin-right: 5px;
}

.checkmark-seven::after {
  content: "";
  position: absolute;
  top: 3px;
  left: 7px;
  width: 7px;
  height: 15px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}




.radio-container input[type="radio"]:checked + .checkmark::after {
  opacity: 1;
}
.radio-container input[type="radio"]:checked + .checkmark-one::after {
  opacity: 1;
}
.radio-container input[type="radio"]:checked + .checkmark-two::after {
  opacity: 1;
}

.radio-container input[type="radio"]:checked + .checkmark-three::after {
  opacity: 1;
}
.radio-container input[type="radio"]:checked + .checkmark-four::after {
  opacity: 1;
}

.radio-container input[type="radio"]:checked + .checkmark-five::after {
  opacity: 1;
}
.radio-container input[type="radio"]:checked + .checkmark-six::after {
  opacity: 1;
}
.radio-container input[type="radio"]:checked + .checkmark-seven::after {
  opacity: 1;
}

/* .radio-container:hover  {
  opacity: 0.5;
} */


</style>

