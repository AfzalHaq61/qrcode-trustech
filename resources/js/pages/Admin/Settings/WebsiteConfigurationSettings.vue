<template>
<SettingSideBarLayout>
    <div class="col-span-8 w-full px-6 py-6 mx-auto">
        <!-- Website Configuration Settings -->
        <form @submit.prevent="submit" role="form">
            <h6 class="text-lg font-bold dark:text-white">Website Configuration Settings</h6>          
            
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-6 mb-5">
                <!-- Theme Colors -->
                <div class="px-1 sm:col-span-6">
                    <Label class="mb-2 ml-0 font-bold text-xs text-slate-700" for="banner image">Theme Colors <span class="text-red-600">*</span></Label>
                    
                    <div class="radio-group">
                        <label class="radio-container">
                            <input value="blue" v-model="form.app_theme" type="radio" name="app_theme">
                            <span class="checkmark"></span>
                        </label>

                        <label class="radio-container">
                            <input value="indigo" v-model="form.app_theme" type="radio" name="app_theme">
                            <span class="checkmark-one"></span>
                        </label>

                        <label class="radio-container">
                            <input value="green" v-model="form.app_theme" type="radio" name="app_theme">
                            <span class="checkmark-two"></span>
                        </label>

                        <label class="radio-container">
                            <input value="yellow" v-model="form.app_theme" type="radio" name="app_theme">
                            <span class="checkmark-three"></span>
                        </label>

                        <label class="radio-container">
                            <input value="red" v-model="form.app_theme" type="radio" name="app_theme">
                            <span class="checkmark-four"></span>
                        </label>

                        <label class="radio-container">
                            <input value="purple" v-model="form.app_theme" type="radio" name="app_theme">
                            <span class="checkmark-five"></span>
                        </label>

                        <label class="radio-container">
                            <input value="pink" v-model="form.app_theme" type="radio" name="app_theme">
                            <span class="checkmark-six"></span>
                        </label>

                        <label class="radio-container">
                            <input value="gray" v-model="form.app_theme" type="radio" name="app_theme">
                            <span class="checkmark-seven"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-0 grid grid-cols-1 gap-6 sm:grid-cols-6 mb-5">
                <!-- Home Banner Image -->
                <div class="sm:col-span-2">
                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="banner image">Banner Image <span class="text-red-600">*</span></Label>
                    <div class="sm:col-span-3">
                        <input @change="getPrimaryImage($event)" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" type="file" name="primary_image" id="primary_image" autofocus placeholder="Banner Image ..." accept=".png,.jpg,.jpeg,.gif,.svg">
                        <span class="mb-2 ml-1 font-bold text-xs text-slate-700">recommended size: 1000 x 667</span>
                    </div>
                </div>

                <!-- Website Logo -->
                <div class="sm:col-span-2">
                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Website Logo <span class="text-red-600">*</span></Label>
                    <input @change="getSiteLogo($event)" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" type="file" name="site_logo" id="site_logo" autofocus placeholder="Website Logo ..." accept=".png,.jpg,.jpeg,.gif,.svg">
                    <span class="mb-2 ml-1 font-bold text-xs text-slate-700">recommended size: 200 x 90</span>
                </div>

                <!-- Favicon -->
                <div class="sm:col-span-2">
                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Email">Favicon <span class="text-red-600">*</span></Label>
                    <input @change="getFavIcon($event)" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" type="file" name="favi_icon" id="favi_icon" autofocus placeholder="Favicon ..." accept=".png,.jpg,.jpeg,.gif,.svg">
                    <span class="mb-2 ml-1 font-bold text-xs text-slate-700">recommended size: 200 x 200</span>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-6 mb-5">
                <!-- App Name -->
                <div class="sm:col-span-3">
                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="app_name">App Name<span class="text-red-600"> *</span></Label>
                    <input v-model="form.app_name" id="app_name" name="app_name" placeholder="App Name ..." readonly class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />
                </div>

                <!-- Site Name -->
                <div class="sm:col-span-3">
                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="site_name">Site Name<span class="text-red-600"> *</span></Label>
                    <input v-model="form.site_name" id="site_name" name="site_name" placeholder="Site Name ..." required class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-6">
                <!-- SEO Meta Description -->
                <div class="sm:col-span-3">
                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="seo_meta_desc">SEO Meta Description<span class="text-red-600"> *</span></Label>
                    <textarea v-model="form.seo_meta_desc" id="seo_meta_desc" name="seo_meta_desc" placeholder="SEO Meta Description ..." required rows="3" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"></textarea>
                </div>

                <!-- SEO Keywords -->
                <div class="sm:col-span-3">
                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="meta_keywords">SEO Keywords<span class="text-red-600"> *</span></Label>
                    <textarea v-model="form.meta_keywords" id="meta_keywords" name="meta_keywords" placeholder="SEO Keywords (Keyword 1, Keyword 2 ..." required rows="3" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"></textarea>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update
                </PrimaryButton>
            </div>
        </form>
    </div>
</SettingSideBarLayout>
</template>


<script setup>
import {
    usePage
} from '@inertiajs/vue3'
import SettingSideBarLayout from '../../../AdminSettingLayout/sidebar.vue'
import {
    useForm
} from '@inertiajs/vue3';

const page = usePage();

const props = defineProps({
    config: Object,
    settings: Object
});

const form = useForm({
    app_theme: props.config[11].config_value,
    primary_image: '',
    site_logo: '',
    favi_icon: '',
    app_name: page.props.appName,
    site_name: props.settings.site_name,
    seo_meta_desc: props.settings.seo_meta_description,
    meta_keywords: props.settings.seo_keywords
});

function getPrimaryImage($event) {
    form.primary_image = $event.target.files[0];
}

function getSiteLogo($event) {
    form.site_logo = $event.target.files[0];
}

function getFavIcon($event) {
    form.favi_icon = $event.target.files[0];
}

const submit = () => {
    form.post(route('admin.change.website.settings'));
};
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
    margin-right: 5px;
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
    background: blue;
    border: 1px solid blue;
    border-radius: 3px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
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
    background: indigo;
    border: 1px solid indigo;
    border-radius: 3px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
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
    background: green;
    border: 1px solid green;
    border-radius: 3px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
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
    background: yellow;
    border: 1px solid yellow;
    border-radius: 3px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
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
    background: red;
    border: 1px solid red;
    border-radius: 3px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
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
    background: purple;
    border: 1px solid purple;
    border-radius: 3px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
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
    background: pink;
    border: 1px solid pink;
    border-radius: 3px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
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
    background: gray;
    border: 1px solid gray;
    border-radius: 3px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
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

.radio-container input[type="radio"]:checked+.checkmark::after {
    opacity: 1;
}

.radio-container input[type="radio"]:checked+.checkmark-one::after {
    opacity: 1;
}

.radio-container input[type="radio"]:checked+.checkmark-two::after {
    opacity: 1;
}

.radio-container input[type="radio"]:checked+.checkmark-three::after {
    opacity: 1;
}

.radio-container input[type="radio"]:checked+.checkmark-four::after {
    opacity: 1;
}

.radio-container input[type="radio"]:checked+.checkmark-five::after {
    opacity: 1;
}

.radio-container input[type="radio"]:checked+.checkmark-six::after {
    opacity: 1;
}

.radio-container input[type="radio"]:checked+.checkmark-seven::after {
    opacity: 1;
}
</style>
