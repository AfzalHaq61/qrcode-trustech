<template>
    <Head title="Invoice" />
    <AdminLayout>
        <div class="bg-gray-50 dark:bg-slate-900">
      <!-- Invoice -->
            <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
                <div class="sm:w-11/12 lg:w-3/4 mx-auto">
                    <!-- Buttons -->
                    <div class="mb-6 flex justify-between gap-x-3">
                        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Invoice</h6>
                        </div>
                        <div>
                            <PrimaryButton @click="downloadPDF" class="mr-5">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                            </svg>
                            PDF
                            </PrimaryButton>
                            <PrimaryButton @click="printContent">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                            </svg>
                            Print details
                            </PrimaryButton>
                        </div>
                    </div>
                    <!-- End Buttons -->

                    <!-- Card -->
                    <div id="print-content" class="flex flex-col p-4 mt-2 sm:p-10 bg-white shadow-md rounded-xl dark:bg-gray-800">
                        <!-- Grid -->
                        <div class="flex justify-between">
                            <div>
                                <Link href="/">
                                    <ApplicationLogo class="py-2.375 text-sm mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 lg:ml-0" />
                                </Link>

                                <div class="mt-10 ml-5 md:mt-16 md:ml-16">
                                    <img :src="'/assets/img/IncoicePaid.png'" class="w-40 h-40" alt="">
                                </div>
                            </div>

                            <!-- Col -->

                            <div class="text-right">
                                <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-200">Invoice #</h2>
                                <span v-if="transaction.invoice_number > 0" class="mt-1 block text-gray-500"> {{ transaction.invoice_prefix }}{{ transaction.invoice_number }}</span>

                                <h3 class="mt-4 text-lg font-semibold text-gray-800 dark:text-gray-200">Bill from:</h3>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ transaction.billing_details['from_billing_name'] }}</h3>
                                <address class="mt-4 not-italic text-gray-800 dark:text-gray-200">
                                    <span v-if="transaction.billing_details['from_billing_address']">{{ transaction.billing_details['from_billing_address'] }}<br></span><span v-else>Not Available<br></span>
                                    <span v-if="transaction.billing_details['from_billing_state']">{{ transaction.billing_details['from_billing_state'] }}, </span><span v-else>Not Available, </span>
                                    <span v-if="transaction.billing_details['from_billing_city']">{{ transaction.billing_details['from_billing_city'] }}<br></span><span v-else>Not Available<br></span>
                                    <span v-if="transaction.billing_details['from_billing_country']">{{ transaction.billing_details['from_billing_country'] }}, </span><span v-else>Not Available, </span>
                                    <span v-if="transaction.billing_details['from_billing_zipcode']">{{ transaction.billing_details['from_billing_zipcode'] }}<br></span><span v-else>Not Available<br></span>
                                </address>
                                <div class="mt-4">
                                    <span v-if="transaction.billing_details['from_vat_number']" class="text-lg font-semibold text-gray-800 dark:text-gray-200">Tax Number: {{ transaction.billing_details['from_vat_number'] }}</span>
                                </div>
                            </div>
                            <!-- Col -->
                            </div>
                            <!-- End Grid -->

                            <!-- Grid -->
                            <div class="mt-8 grid sm:grid-cols-2 gap-3">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Bill to:</h3>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ transaction.billing_details['to_billing_name'] }}</h3>
                                <address class="mt-2 not-italic text-gray-500">
                                    <span v-if="transaction.billing_details['to_billing_address']">{{ transaction.billing_details['to_billing_address'] }}<br></span><span v-else>Not Available<br></span>
                                    <span v-if="transaction.billing_details['to_billing_state']">{{ transaction.billing_details['to_billing_state'] }}, </span><span v-else>Not Available, </span>
                                    <span v-if="transaction.billing_details['to_billing_city']">{{ transaction.billing_details['to_billing_city'] }}<br></span><span v-else>Not Available<br></span>
                                    <span v-if="transaction.billing_details['to_billing_country']">{{ transaction.billing_details['to_billing_country'] }}, </span><span v-else>Not Available, </span>
                                    <span v-if="transaction.billing_details['to_billing_zipcode']">{{ transaction.billing_details['to_billing_zipcode'] }}<br></span><span v-else>Not Available<br></span>
                                    <span v-if="transaction.billing_details['to_billing_email']">{{ transaction.billing_details['to_billing_email'] }}<br></span><span v-else>Not Available<br></span>
                                    <span v-if="transaction.billing_details['to_billing_phone']">{{ transaction.billing_details['to_billing_phone'] }}<br></span><span v-else>Not Available<br></span>
                                </address>
                                <div class="mt-4">
                                    <span v-if="transaction.billing_details['to_vat_number']" class="text-lg font-semibold text-gray-800 dark:text-gray-200">Tax Number: {{ transaction.billing_details['to_vat_number'] }}</span>
                                </div>
                            </div>
                            <!-- Col -->

                            <div class="sm:text-right space-y-2">
                                <!-- Grid -->
                                <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                    <dl class="grid sm:grid-cols-5 gap-x-3">
                                        <dt class="col-span-2 font-semibold text-gray-800 dark:text-gray-200">Invoice date:</dt>
                                        <dd class="col-span-3 text-gray-500">{{ formatDate(transaction.transaction_date) }}</dd>
                                    </dl>
                                </div>
                                <!-- End Grid -->
                            </div>
                            <!-- Col -->
                            </div>
                            <!-- End Grid -->

                            <!-- Table -->
                            <div class="mt-6">
                                <div class="border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
                                    <div class="hidden sm:grid sm:grid-cols-5">
                                        <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Description</div>
                                        <div class="text-left text-xs font-medium text-gray-500 uppercase">Qty</div>
                                        <div class="text-left text-xs font-medium text-gray-500 uppercase">Rate</div>
                                        <div class="text-right text-xs font-medium text-gray-500 uppercase">Amount</div>
                                    </div>

                                    <div class="hidden sm:block border-b border-gray-200 dark:border-gray-700"></div>

                                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                                        <div class="col-span-full sm:col-span-2">
                                            <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
                                            <p class="font-medium text-gray-800 dark:text-gray-200">Extended: {{ transaction.desciption }} <span class="text-sm text-gray-600">(Via {{ transaction.payment_gateway_name }})</span></p>
                                        </div>
                                        <div>
                                            <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
                                            <p class="text-gray-800 dark:text-gray-200"></p>
                                        </div>
                                        <div>
                                            <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Rate</h5>
                                            <p class="text-gray-800 dark:text-gray-200"></p>
                                        </div>
                                        <div>
                                            <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                                            <p class="sm:text-right text-gray-800 dark:text-gray-200">{{ currencySymbol(transaction.transaction_currency) }}{{ formatNumber(transaction.billing_details['subtotal']) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Table -->

                            <!-- Flex -->
                            <div class="mt-8 flex sm:justify-end">
                            <div class="w-full max-w-2xl sm:text-right space-y-2">
                                <!-- Grid -->
                                <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                    <dl class="grid sm:grid-cols-5 gap-x-3">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Subtotal:</dt>
                                        <dd class="col-span-2 text-gray-500">{{ currencySymbol(transaction.transaction_currency) }}{{ formatNumber(transaction.billing_details['subtotal']) }}</dd>
                                    </dl>

                                    <dl v-if="transaction.billing_details['tax_amount'] > 0" class="grid sm:grid-cols-5 gap-x-3">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">{{ transaction.billing_details['tax_name'] }} Rate {{ transaction.billing_details['tax_value'] }}%:</dt>
                                        <dd class="col-span-2 text-gray-500">{{ currencySymbol(transaction.transaction_currency) }}{{ formatNumber(transaction.billing_details['tax_amount']) }}</dd>
                                    </dl>

                                    <dl class="grid sm:grid-cols-5 gap-x-3">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Total:</dt>
                                        <dd class="col-span-2 text-gray-500">{{ currencySymbol(transaction.transaction_currency) }}{{ transaction.billing_details['invoice_amount'] }}</dd>
                                    </dl>
                                </div>
                                <!-- End Grid -->
                            </div>
                            </div>
                            <!-- End Flex -->

                            <div class="mt-8 sm:mt-12">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Thank you!</h4>
                            <p class="text-gray-500">{{ config[29].config_value }}:</p>
                            <div class="mt-2">
                                <p class="block text-sm font-medium text-gray-800 dark:text-gray-200"><span v-if="transaction.billing_details['from_billing_email']">{{ transaction.billing_details['from_billing_email'] }}<br></span><span v-else>Not Available</span></p>
                                <p class="block text-sm font-medium text-gray-800 dark:text-gray-200"><span v-if="transaction.billing_details['from_billing_phone']">{{ transaction.billing_details['from_billing_phone'] }}<br></span><span v-else>Not Available</span></p>
                            </div>
                        </div>

                        <p class="mt-5 text-sm text-gray-500">© 2022 QR Code.</p>
                    </div>
                <!-- End Card -->
                </div>
            </div>
      <!-- End Invoice -->
        </div>
    </AdminLayout>
</template>

<script setup>

const props = defineProps({
    transaction: Object,
    settings: Object,
    config: Object,
    currencies: Object,
});

</script>

<script>
import html2pdf from 'html2pdf.js';
import { saveAs } from 'file-saver';

export default {
    methods: {
        currencySymbol(transaction_currency) {
            var symbol = '';
            this.currencies.forEach(currency => {
                if (transaction_currency == currency.iso_code) {
                    symbol = currency.symbol;
                }
            });

            return symbol;
        },

        formatDate(date) {
            return new Date(date).toLocaleString('en-US', {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                hour12: true,
            });
        },

        formatNumber(number) {
            return Number(number).toFixed(2);
        },

        printContent() {
            const printContent = document.getElementById('print-content');
            if (printContent) {
                const originalContents = document.body.innerHTML;
                const newContents = printContent.innerHTML;
                document.body.innerHTML = newContents;
                window.print();
                document.body.innerHTML = originalContents;
            } else {
                console.error('Print content element not found.');
            }
        },

        async downloadPDF() {
            try {
                // Get the reference to the div element
                const downloadContent = document.getElementById('print-content');

                // Create a new instance of html2pdf
                const pdfInstance = new html2pdf(downloadContent);

                // Set optional configurations for the PDF
                const options = {
                    filename: this.transaction.invoice_prefix + this.transaction.invoice_number,
                    margin: 50,
                    jsPDF: {
                        format: 'a4',
                    },
                };

                // Start the PDF generation process
                await pdfInstance.set(options).from(downloadContent).save();
            } catch (error) {
                console.error('Error generating PDF:', error);
            }
        },
    }
}

</script>
