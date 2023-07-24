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
                                        <TextInput id="name" class="focus:ring-themeColor focus:shadow-themeColor" type="text" v-model="form.name" autofocus
                                            placeholder="Name..." minlength="3" maxlength="30" required/>

                                        <InputError class="mt-2" :message="form.errors.name" />
                                    </div>
                                    <div class="md:grid grid-cols-2 md:gap-x-6 mb-6">
                                        <div class="mb-6 md:mb-0">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="barcode_type">Barcode Type
                                                <span class="text-red-600">*</span></Label>
                                            <select id="barcode_type" name="barcode_type" v-model="form.barcode_type" class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" required>
                                                <option value="DNS1D">1D</option>
                                                <option value="DNS2D">2D</option>
                                            </select>

                                            <InputError class="mt-2" :message="form.errors.barcode_type" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="barcode_format">Barcode Format
                                                <span class="text-red-600">*</span></Label>
                                                <select v-html="barcode_format" @input="regenerateBarCode" id="barcode_format" name="barcode_format" v-model="form.barcode_format" class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                                                </select>

                                            <InputError class="mt-2" :message="form.errors.barcode_format" />
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="content">Value
                                            <span class="text-red-600">*</span></Label>
                                        <TextInput @input="regenerateBarCode" id="content" class="focus:ring-themeColor focus:shadow-themeColor" type="text" v-model="form.content" autofocus
                                            placeholder="Value..." minlength="1" maxlength="15" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required/>
                                        <span class="font-bold text-xs text-slate-700">Only valid for numeric value : Eg: 45000</span>

                                        <InputError class="mt-2" :message="form.errors.content" />
                                    </div>

                                    <div class="md:grid grid-cols-2 md:gap-x-6 mb-6">
                                        <div class="mb-6 md:mb-0">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="width">Width
                                                <span class="text-red-600">*</span></Label>
                                            <TextInput @input="regenerateBarCode" id="width" class="focus:ring-themeColor focus:shadow-themeColor" type="number" v-model="form.width" autofocus
                                                placeholder="Width..." required/>

                                            <InputError class="mt-2" :message="form.errors.width" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="height">Height
                                                <span class="text-red-600">*</span></Label>
                                            <TextInput @input="regenerateBarCode" id="height" class="focus:ring-themeColor focus:shadow-themeColor" type="number" v-model="form.height" autofocus
                                                placeholder="Height..." required/>

                                            <InputError class="mt-2" :message="form.errors.height" />
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="color">Color
                                            <span class="text-red-600">*</span></Label>
                                        <input @input="regenerateBarCode" class="focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                            type="color" id="color" v-model="form.color" autofocus placeholder="Color..." required>

                                        <InputError class="mt-2" :message="form.errors.color" />
                                    </div>

                                    <div class="mb-6">
                                        <input @input="regenerateBarCode" class="mr-2 focus:ring-themeColor focus:shadow-themeColor focus:shadow-soft-primary-outline text-sm ease-soft appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
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
                                            <span class="ml-1">Update</span>
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

const props = defineProps({
    barcode_details: Object,
});

const barcodeDetails = ref(JSON.parse(props.barcode_details.settings));
const barcodeImage = ref('');
const barcode_format = ref('');

if(barcodeDetails.value.barcode_type === 'DNS1D' ) {
    barcode_format.value = '< option value = "C39" > C39</option ><option value="C39+">C39+</option><option value="C39E">C39E</option><option value="C39E+">C39E+</option><option value="C93">C93</option><option value="S25">S25</option><option value="S25+">S25+</option><option value="I25">I25</option><option value="I25+">I25+</option><option value="C128">C128</option><option value="C128A">C128A</option><option value="C128B">C128B</option><option value="EAN2">EAN2</option><option value="EAN5">EAN5</option><option value="EAN8">EAN8</option><option value="EAN13">EAN13</option><option value="UPCA">UPCA</option><option value="UPCE">UPCE</option><option value="MSI">MSI</option><option value="MSI+">MSI+</option><option value="POSTNET">POSTNET</option><option value="PLANET">PLANET</option><option value="RMS4CC">RMS4CC</option><option value="KIX">KIX</option><option value="IMB">IMB</option><option value="CODABAR">CODABAR</option><option value="CODE11">CODE11</option><option value="PHARMA">PHARMA</option><option value="PHARMA2T">PHARMA2T</option>'
} else {
    barcode_format.value = '<option value="QRCODE">QRCODE</option><option value="PDF417">PDF417</option><option value="DATAMATRIX">DATAMATRIX</option>'
}


const form = useForm({
    barcode_id: props.barcode_details.barcode_id,
    name: props.barcode_details.name,
    barcode_type: barcodeDetails.value.barcode_type,
    barcode_format: barcodeDetails.value.barcode_format,
    content: barcodeDetails.value.content,
    width: barcodeDetails.value.width,
    height: barcodeDetails.value.height,
    color: barcodeDetails.value.color,
    showtext: barcodeDetails.value.showtext,
});

// Execute code when the component is mounted
onMounted(() => {
    regenerateBarCode();
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
        const response = await axios.post(route('admin.regenerate.barcode'), form);
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
    form.post(route('admin.update.barcode'));
};
</script>
