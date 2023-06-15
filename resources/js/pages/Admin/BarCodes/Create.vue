<template>
    <Head title="Plan Edit" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />

            <div class="grid grid-cols-5 -mx-3">
                <div class="col-span-3 w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Create Barcode</h6>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-6 overflow-x-auto">
                                <form @submit.prevent="submit" role="form">
                                    <div class="mb-6">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="name">Barcode Name
                                            <span class="text-red-600">*</span></Label>
                                        <TextInput id="name" type="text" v-model="form.name" autofocus
                                            placeholder="Name..." minlength="3" maxlength="30" required/>

                                        <InputError class="mt-2" :message="form.errors.name" />
                                    </div>
                                    <div class="md:grid grid-cols-2 md:gap-x-6 mb-6">
                                        <div class="mb-6 md:mb-0">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="barcode_type">Barcode Type
                                                <span class="text-red-600">*</span></Label>
                                            <select id="barcode_type" name="barcode_type" v-model="form.barcode_type" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" required>
                                                <option value="DNS1D">1D</option>
                                                <option value="DNS2D">2D</option>
                                            </select>

                                            <InputError class="mt-2" :message="form.errors.barcode_type" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="barcode_format">Barcode Format
                                                <span class="text-red-600">*</span></Label>
                                                <select v-html="barcode_format" @input="regenerateBarCode" id="barcode_format" name="barcode_format" v-model="form.barcode_format" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                                                </select>

                                            <InputError class="mt-2" :message="form.errors.barcode_format" />
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="content">Value
                                            <span class="text-red-600">*</span></Label>
                                        <TextInput @input="regenerateBarCode" id="content" type="number" v-model="form.content" autofocus
                                            placeholder="Value..." minlength="1" maxlength="15" required/>
                                        <span class="font-bold text-xs text-slate-700">Only valid for numeric value : Eg: 45000</span>

                                        <InputError class="mt-2" :message="form.errors.content" />
                                    </div>

                                    <div class="md:grid grid-cols-2 md:gap-x-6 mb-6">
                                        <div class="mb-6 md:mb-0">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="width">Width
                                                <span class="text-red-600">*</span></Label>
                                            <TextInput @input="regenerateBarCode" id="width" type="number" v-model="form.width" autofocus
                                                placeholder="Width..." required/>

                                            <InputError class="mt-2" :message="form.errors.width" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="height">Height
                                                <span class="text-red-600">*</span></Label>
                                            <TextInput @input="regenerateBarCode" id="height" type="number" v-model="form.height" autofocus
                                                placeholder="Height..." required/>

                                            <InputError class="mt-2" :message="form.errors.height" />
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="color">Color
                                            <span class="text-red-600">*</span></Label>
                                        <input @input="regenerateBarCode" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            type="color" id="color" v-model="form.color" autofocus placeholder="Color..." required>

                                        <InputError class="mt-2" :message="form.errors.color" />
                                    </div>

                                    <div class="mb-6">
                                        <input @input="regenerateBarCode" class="mr-2 focus:shadow-soft-primary-outline text-sm ease-soft appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            type="checkbox" id="showtext" v-model="form.showtext" autofocus placeholder="Show Text..." required>
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="title">Show text</Label>

                                        <InputError class="mt-2" :message="form.errors.showtext" />
                                    </div>

                                    <div>
                                        <span class="font-bold text-sm text-slate-700">Note: Double-check your QR Code once before using it.</span>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-device-floppy" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                                </path>
                                                <circle cx="12" cy="14" r="2"></circle>
                                                <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                            </svg>
                                            <span class="ml-1">Create</span>
                                        </PrimaryButton>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 px-3">
                    <img src="">
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { watch, ref } from 'vue';

const barcode_format = ref('');
barcode_format.value = '< option value = "C39" > C39</option ><option value="C39+">C39+</option><option value="C39E">C39E</option><option value="C39E+">C39E+</option><option value="C93">C93</option><option value="S25">S25</option><option value="S25+">S25+</option><option value="I25">I25</option><option value="I25+">I25+</option><option value="C128">C128</option><option value="C128A">C128A</option><option value="C128B">C128B</option><option value="EAN2">EAN2</option><option value="EAN5">EAN5</option><option value="EAN8">EAN8</option><option value="EAN13">EAN13</option><option value="UPCA">UPCA</option><option value="UPCE">UPCE</option><option value="MSI">MSI</option><option value="MSI+">MSI+</option><option value="POSTNET">POSTNET</option><option value="PLANET">PLANET</option><option value="RMS4CC">RMS4CC</option><option value="KIX">KIX</option><option value="IMB">IMB</option><option value="CODABAR">CODABAR</option><option value="CODE11">CODE11</option><option value="PHARMA">PHARMA</option><option value="PHARMA2T">PHARMA2T</option>'

const form = useForm({
    name: '',
    barcode_type: 'DNS1D',
    barcode_format: 'C39+',
    content: '',
    width: '3',
    height: '83',
    color: '',
    showtext: ''
});

watch(() => form.barcode_type, (newBarcode_type) => {
    if (form.barcode_type == 'DNS1D') {
        barcode_format.value = '< option value = "C39" > C39</option ><option value="C39+">C39+</option><option value="C39E">C39E</option><option value="C39E+">C39E+</option><option value="C93">C93</option><option value="S25">S25</option><option value="S25+">S25+</option><option value="I25">I25</option><option value="I25+">I25+</option><option value="C128">C128</option><option value="C128A">C128A</option><option value="C128B">C128B</option><option value="EAN2">EAN2</option><option value="EAN5">EAN5</option><option value="EAN8">EAN8</option><option value="EAN13">EAN13</option><option value="UPCA">UPCA</option><option value="UPCE">UPCE</option><option value="MSI">MSI</option><option value="MSI+">MSI+</option><option value="POSTNET">POSTNET</option><option value="PLANET">PLANET</option><option value="RMS4CC">RMS4CC</option><option value="KIX">KIX</option><option value="IMB">IMB</option><option value="CODABAR">CODABAR</option><option value="CODE11">CODE11</option><option value="PHARMA">PHARMA</option><option value="PHARMA2T">PHARMA2T</option>'
        form.width = 3,
        form.height = 83
    } else if (form.barcode_type == 'DNS2D') {
        barcode_format.value = '<option value="QRCODE">QRCODE</option><option value="PDF417">PDF417</option><option value="DATAMATRIX">DATAMATRIX</option>'
        form.width = 500,
        form.height = 500
    }
    
    regenerateBarCode();
});

const regenerateBarCode = async () => {
    console.log('hello');
    try {
        const response = await axios.post('regenerate-barcode', form.data);
        console.log(response.data.source);
        responseData.value = response.data;
        loading.value = false;
    } catch (error) {
        console.error(error);
        loading.value = false;
    }
}

const submit = () => {
    form.post(route('admin.save.barcode'));
};
</script>
