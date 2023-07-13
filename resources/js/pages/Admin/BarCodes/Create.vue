<template>
    <Head title="Barcode Create" />
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
                                            <select id="barcode_type" name="barcode_type" v-model="form.barcode_type" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" required>
                                                <option value="DNS1D">1D</option>
                                                <option value="DNS2D">2D</option>
                                            </select>

                                            <InputError class="mt-2" :message="form.errors.barcode_type" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="barcode_format">Barcode Format
                                                <span class="text-red-600">*</span></Label>
                                                <select v-html="barcode_format" @input="regenerateBarCode" id="barcode_format" name="barcode_format" v-model="form.barcode_format" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                                                </select>

                                            <InputError class="mt-2" :message="form.errors.barcode_format" />
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="content">Value
                                            <span class="text-red-600">*</span></Label>
                                        <TextInput @input="regenerateBarCode" id="content" type="text" v-model="form.content" autofocus
                                            placeholder="Value..." minlength="1" maxlength="15" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required/>
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
                                        <input @input="regenerateBarCode" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                            type="color" id="color" v-model="form.color" autofocus placeholder="Color..." required>

                                        <InputError class="mt-2" :message="form.errors.color" />
                                    </div>

                                    <div class="mb-6">
                                        <input @input="regenerateBarCode" class="mr-2 focus:shadow-soft-primary-outline text-sm ease-soft appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
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
                    <div class="p-2">
                        <div>
                            <div class="py-6">
                                <h6>Barcode</h6>
                            </div>
                        </div>
                        <!-- Show Bar code -->
                        <div v-if="form.barcode_type === 'DNS1D'" class="flex justify-center overflow-x-auto">
                            <img :src="generateBarcodeImage">
                        </div>
                        <div v-if="form.barcode_type === 'DNS2D'" class="flex justify-center overflow-x-auto">
                            <img class="h-96" :src="generateBarcodeImage">
                        </div>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="flex items-center justify-center p-6 pb-0 mb-0border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <h6>Download Formats</h6>
                            </div>
                        <div class="flex items-center justify-center p-6 overflow-x-auto space-x-6">
                            <div>
                                <button @click="downloadBarcode('png')" class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-red-600 to-red-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    .PNG
                                </button>
                            </div>
                            <div>
                                <button @click="downloadBarcode('jpg')" class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-gray-600 to-gray-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    .JPG
                                </button>
                            </div>
                            <div>
                                <button @click="downloadBarcode('svg')" class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-green-600 to-green-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    .SVG
                                </button>
                            </div>
                            <div>
                                <button @click="downloadBarcode('webp')" class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-orange-600 to-orange-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    .WebP
                                </button>
                            </div>
                        </div>
                    </div>
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
import { watch, ref, computed, onMounted } from 'vue';
import JsBarcode from 'jsbarcode';

const barcodeImage = ref('data:image/gif;base64,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');
const barcode_format = ref('');
barcode_format.value = '< option value = "C39" > C39</option ><option value="C39+">C39+</option><option value="C39E">C39E</option><option value="C39E+">C39E+</option><option value="C93">C93</option><option value="S25">S25</option><option value="S25+">S25+</option><option value="I25">I25</option><option value="I25+">I25+</option><option value="C128">C128</option><option value="C128A">C128A</option><option value="C128B">C128B</option><option value="EAN2">EAN2</option><option value="EAN5">EAN5</option><option value="EAN8">EAN8</option><option value="EAN13">EAN13</option><option value="UPCA">UPCA</option><option value="UPCE">UPCE</option><option value="MSI">MSI</option><option value="MSI+">MSI+</option><option value="POSTNET">POSTNET</option><option value="PLANET">PLANET</option><option value="RMS4CC">RMS4CC</option><option value="KIX">KIX</option><option value="IMB">IMB</option><option value="CODABAR">CODABAR</option><option value="CODE11">CODE11</option><option value="PHARMA">PHARMA</option><option value="PHARMA2T">PHARMA2T</option>'

const form = useForm({
    name: '',
    barcode_type: 'DNS1D',
    barcode_format: 'C39+',
    content: '',
    width: '3',
    height: '83',
    color: '#000000',
    showtext: true
});

// Execute code when the component is mounted
onMounted(() => {
    regenerateBarCode();;
});

watch(() => form.barcode_type, (newBarcode_type) => {
    if (form.barcode_type == 'DNS1D') {
        barcode_format.value = '< option value = "C39" > C39</option ><option value="C39+">C39+</option><option value="C39E">C39E</option><option value="C39E+">C39E+</option><option value="C93">C93</option><option value="S25">S25</option><option value="S25+">S25+</option><option value="I25">I25</option><option value="I25+">I25+</option><option value="C128">C128</option><option value="C128A">C128A</option><option value="C128B">C128B</option><option value="EAN2">EAN2</option><option value="EAN5">EAN5</option><option value="EAN8">EAN8</option><option value="EAN13">EAN13</option><option value="UPCA">UPCA</option><option value="UPCE">UPCE</option><option value="MSI">MSI</option><option value="MSI+">MSI+</option><option value="POSTNET">POSTNET</option><option value="PLANET">PLANET</option><option value="RMS4CC">RMS4CC</option><option value="KIX">KIX</option><option value="IMB">IMB</option><option value="CODABAR">CODABAR</option><option value="CODE11">CODE11</option><option value="PHARMA">PHARMA</option><option value="PHARMA2T">PHARMA2T</option>'
        form.barcode_format = 'C39+',
        form.width = 3,
        form.height = 83
    } else if (form.barcode_type == 'DNS2D') {
        barcode_format.value = '<option value="QRCODE">QRCODE</option><option value="PDF417">PDF417</option><option value="DATAMATRIX">DATAMATRIX</option>'
        form.barcode_format='QRCODE',
        form.width = 500,
        form.height = 500
    }

    regenerateBarCode();
});

const regenerateBarCode = async () => {
    try {
        const response = await axios.post('regenerate-barcode', form);
        barcodeImage.value = response.data.source;
    } catch (error) {
        console.error(error);
    }
}

// Generate the barcode image URL
const generateBarcodeImage = computed(() => {
    if (barcodeImage.value) {
        return barcodeImage.value;
    } else {
        return null;
    }
});

// Function to download the barcode as PNG
function downloadBarcode() {
    const imageSrc = barcodeImage.value; // Replace with the path to your image

    // Create a temporary link element
    const link = document.createElement('a');
    link.href = imageSrc;
    link.download = 'image.png'; // Set the desired file name

    // Trigger the download
    link.click();
};

const submit = () => {
    form.post(route('admin.save.barcode'));
};
</script>
