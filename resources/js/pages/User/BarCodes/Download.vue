<template>
    <Head title="Barcode Download" />
    <UserLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>View Barcode</h6>
                        </div>
                        <div id="printable-area" class="flex-auto px-0 pt-0 pb-2">
                            <div class="flex items-center justify-center p-6 overflow-x-auto">
                                <!-- Show Bar code -->
                                <span v-if="barcodeDetailsSetings.barcode_type === 'DNS1D'">
                                    <img :src="generateBarcodeImage">
                                </span>
                                <span v-else>
                                    <img class="w-80" :src="generateBarcodeImage">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Download Formats</h6>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="flex items-center justify-center p-6 overflow-x-auto space-x-6">
                                <div>
                                    <button @click="printBarcode" class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                        PRINT
                                    </button>
                                </div>
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
        </div>
    </UserLayout>
</template>

<script setup>
import { computed, ref } from 'vue';

const barcodeDetails = ref(null);

const props = defineProps({
    barcode_details: Object,
});

const barcodeDetailsSetings = ref(JSON.parse(props.barcode_details.settings));

// Assign the passed prop value to the barcodeDetails ref
barcodeDetails.value = btoa(props.barcode_details.bar_code);

// Generate the barcode image URL
const generateBarcodeImage = computed(() => {
    if (barcodeDetails.value) {
        return `data:image/svg+xml;base64,${barcodeDetails.value}`;
    } else {
        return null;
    }
});

// Function to download the barcode as PNG
function printBarcode() {
    const printContent = document.getElementById('printable-area');
    if (printContent) {
        const originalContents = document.body.innerHTML;
        const newContents = printContent.innerHTML;
        document.body.innerHTML = newContents;
        window.print();
        document.body.innerHTML = originalContents;
    } else {
        console.error('Print content element not found.');
    }
};

function downloadBarcode(type) {
    // Get the QR code image URL
    const qrCodeImageUrl = generateBarcodeImage; // Replace with the actual URL of your QR code image

    // Create an anchor element
    const downloadLink = document.createElement("a");
    downloadLink.href = qrCodeImageUrl;

    // Set the download attribute to specify the file name
    downloadLink.download = props.barcode_details.name + '.' + type;

    // Append the anchor element to the document body
    document.body.appendChild(downloadLink);

    // Simulate a click event to trigger the download
    downloadLink.click();

    // Remove the anchor element from the document body
    document.body.removeChild(downloadLink);
}

const submit = () => {
    form.post(route('admin.save.barcode'));
};
</script>
