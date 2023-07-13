<template>
    <Head title="QR Codes Create" />
    <UserLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />

            <div class="grid md:grid-cols-5 -mx-3">
                <!-- stepcounts -->
                <div class="col-span-3 w-full max-w-full px-3">

                    <!-- Step count -->
                    <StepCount :stepcount='stepcount'/>

                    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6><span v-if="stepcount === 1">Dynamic QR</span><span v-if="stepcount === 2">Complete the content of the QR</span><span v-if="stepcount === 3">Design the QR</span></h6>
                        </div>

                        <!-- step 1 (qrcode type selection) -->
                        <div v-if="stepcount === 1" class="flex-auto p-6">
                            <div class="grid md:grid-cols-2 md:gap-x-6 gap-y-6">
                                <div @click="qrCodeType('url')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'url' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-www" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M19.5 7a9 9 0 0 0 -7.5 -4a8.991 8.991 0 0 0 -7.484 4"></path>
                                            <path d="M11.5 3a16.989 16.989 0 0 0 -1.826 4"></path>
                                            <path d="M12.5 3a16.989 16.989 0 0 1 1.828 4"></path>
                                            <path d="M19.5 17a9 9 0 0 1 -7.5 4a8.991 8.991 0 0 1 -7.484 -4"></path>
                                            <path d="M11.5 21a16.989 16.989 0 0 1 -1.826 -4"></path>
                                            <path d="M12.5 21a16.989 16.989 0 0 0 1.828 -4"></path>
                                            <path d="M2 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                                            <path d="M17 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                                            <path d="M9.5 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Website</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('text')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'text' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-align-box-left-top" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                            <path d="M9 13h-2"></path>
                                            <path d="M13 10h-6"></path>
                                            <path d="M11 7h-4"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Plain Text</h6>
                                        <p class="text-xs">Show a Text</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('email')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'email' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                                            <path d="M3 7l9 6l9 -6"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Email</h6>
                                        <p class="text-xs">Show Email details</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('sms')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'sms' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-messenger" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path>
                                            <path d="M8 13l3 -2l2 2l3 -2"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Sms</h6>
                                        <p class="text-xs">Redirect to SMS</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('whatsapp')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'whatsapp' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                                            <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Whatsapp</h6>
                                        <p class="text-xs">Redirect to WhatsApp</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('pdf')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'pdf' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                            <path d="M9 9l1 0"></path>
                                            <path d="M9 13l6 0"></path>
                                            <path d="M9 17l6 0"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">PDF</h6>
                                        <p class="text-xs">Show PDF</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('location')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'location' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-current-location" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                            <path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0"></path>
                                            <path d="M12 2l0 2"></path>
                                            <path d="M12 20l0 2"></path>
                                            <path d="M20 12l2 0"></path>
                                            <path d="M2 12l2 0"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Location</h6>
                                        <p class="text-xs">Shaw Location</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('phone')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'phone' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-address-book" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z"></path>
                                            <path d="M10 16h6"></path>
                                            <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M4 8h3"></path>
                                            <path d="M4 12h3"></path>
                                            <path d="M4 16h3"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Phone</h6>
                                        <p class="text-xs">Show Phone number details</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('facetime')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'facetime' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-3d-cube-sphere" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 17.6l-2 -1.1v-2.5"></path>
                                            <path d="M4 10v-2.5l2 -1.1"></path>
                                            <path d="M10 4.1l2 -1.1l2 1.1"></path>
                                            <path d="M18 6.4l2 1.1v2.5"></path>
                                            <path d="M20 14v2.5l-2 1.12"></path>
                                            <path d="M14 19.9l-2 1.1l-2 -1.1"></path>
                                            <path d="M12 12l2 -1.1"></path>
                                            <path d="M18 8.6l2 -1.1"></path>
                                            <path d="M12 12l0 2.5"></path>
                                            <path d="M12 18.5l0 2.5"></path>
                                            <path d="M12 12l-2 -1.12"></path>
                                            <path d="M6 8.6l-2 -1.1"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Facetime</h6>
                                        <p class="text-xs">Redirect to Facetime</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('event')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'event' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                            <path d="M16 3l0 4"></path>
                                            <path d="M8 3l0 4"></path>
                                            <path d="M4 11l16 0"></path>
                                            <path d="M8 15h2v2h-2z"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Event</h6>
                                        <p class="text-xs">Promote and share an Event</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('wifi')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'wifi' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wifi" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 18l.01 0"></path>
                                            <path d="M9.172 15.172a4 4 0 0 1 5.656 0"></path>
                                            <path d="M6.343 12.343a8 8 0 0 1 11.314 0"></path>
                                            <path d="M3.515 9.515c4.686 -4.687 12.284 -4.687 17 0"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Wifi</h6>
                                        <p class="text-xs">Show Wifi details</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('crypto')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'crypto' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coins" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z"></path>
                                            <path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4"></path>
                                            <path d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z"></path>
                                            <path d="M3 6v10c0 .888 .772 1.45 2 2"></path>
                                            <path d="M3 11c0 .888 .772 1.45 2 2"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Crypto</h6>
                                        <p class="text-xs">Share Crypto details</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('paypal')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'paypal' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-paypal" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 13l2.5 0c2.5 0 5 -2.5 5 -5c0 -3 -1.9 -5 -5 -5h-5.5c-.5 0 -1 .5 -1 1l-2 14c0 .5 .5 1 1 1h2.8l1.2 -5c.1 -.6 .4 -1 1 -1zm7.5 -5.8c1.7 1 2.5 2.8 2.5 4.8c0 2.5 -2.5 4.5 -5 4.5h-2.6l-.6 3.6a1 1 0 0 1 -1 .8l-2.7 0a.5 .5 0 0 1 -.5 -.6l.2 -1.4"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Paypal</h6>
                                        <p class="text-xs">Share Paypal details</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('vcard')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'vcard' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18"></path>
                                            <path d="M13 8l2 0"></path>
                                            <path d="M13 12l2 0"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">Vcard</h6>
                                        <p class="text-xs">Share contact details</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('upi')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_type === 'upi' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-superhuman" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M16 12l4 3l-8 7l-8 -7l4 -3"></path>
                                            <path d="M12 3l-8 6l8 6l8 -6z"></path>
                                            <path d="M12 15h8"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left mt-1 ml-2">
                                        <h6 class="text-lg">UPI</h6>
                                        <p class="text-xs">Share UPI details</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton @click="stepCountFunction" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    <span class="ml-1">Next</span>
                                </PrimaryButton>
                            </div>
                        </div>

                        <!-- step 2 (filling content) -->
                        <div v-if="stepcount === 2">
                            <div class="flex-auto px-0 pt-0 pb-2">
                                <form @submit.prevent="stepCountFunction" role="form">
                                    <div class="p-6 overflow-x-auto">
                                        <!-- name -->
                                        <div class='mb-6'>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="name">QR Code
                                                Name
                                                <span class="text-red-600">*</span></Label>
                                            <TextInput id="name" type="text" v-model="form.name" autofocus
                                                placeholder="Name..." minlength="3" maxlength="100" required />

                                            <InputError class="mt-2" :message="form.errors.name" />
                                        </div>

                                        <!-- url -->
                                        <div v-if="form.qrcode_type === 'url'" class="mb-6">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="url">Link Url
                                                <span class="text-red-600">*</span></Label>
                                            <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                type="url" name="url" id="url" v-model="form.url" maxlength="80" autofocus placeholder="Ex: http://domain.com..." required>

                                            <InputError class="mt-2" :message="form.errors.url" />
                                        </div>

                                        <!-- text -->
                                        <div v-if="form.qrcode_type === 'text'" class="mb-6">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="content">Content
                                                <span class="text-red-600">*</span></Label>
                                            <textarea class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                type="text" name="content" id="content" cols="30" rows="5" minlength="1" maxlength="350" v-model="form.content" autofocus placeholder="Lorem Ipsum..." required></textarea>

                                            <InputError class="mt-2" :message="form.errors.content" />
                                        </div>

                                        <!-- email -->
                                        <div v-if="form.qrcode_type === 'email'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="email">Email ID
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="email" name="email" id="email" maxlength="50" v-model="form.email" autofocus placeholder="Email ID ..." required>

                                                <InputError class="mt-2" :message="form.errors.email" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="subject">Subject
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="subject" id="subject" maxlength="50" v-model="form.subject" autofocus placeholder="Subject ..." required>

                                                <InputError class="mt-2" :message="form.errors.subject" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="content">Body
                                                    <span class="text-red-600">*</span></Label>
                                                <textarea class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="content" name="content" id="content" cols="30" rows="5" maxlength="300" v-model="form.content" autofocus placeholder="Body ..."></textarea>

                                                <InputError class="mt-2" :message="form.errors.content" />
                                            </div>
                                        </div>

                                        <!-- sms -->
                                        <div v-if="form.qrcode_type === 'sms'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="phone">Mobile Number
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="phone" id="phone" maxlength="50" v-model="form.phone" autofocus placeholder="Mobile Number ..." required>

                                                <InputError class="mt-2" :message="form.errors.phone" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="content">Message
                                                    <span class="text-red-600">*</span></Label>
                                                <textarea class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="content" id="content" cols="30" rows="5" maxlength="300" v-model="form.content" autofocus placeholder="Message ..." required></textarea>

                                                <InputError class="mt-2" :message="form.errors.content" />
                                            </div>
                                        </div>

                                        <!-- whatsapp number -->
                                        <div v-if="form.qrcode_type === 'whatsapp'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="phone">WhatsaApp Number
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="phone" id="phone" maxlength="50" v-model="form.phone" autofocus placeholder="WhatsApp Number ..." required>
                                                <span class="mb-2 ml-1 font-bold text-xs text-slate-700">Include country code (For ex: 919876543210)</span>

                                                <InputError class="mt-2" :message="form.errors.phone" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="content">Message
                                                    <span class="text-red-600">*</span></Label>
                                                <textarea class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="content" id="content" cols="30" rows="5" maxlength="300" v-model="form.content" autofocus placeholder="Message ..." required></textarea>

                                                <InputError class="mt-2" :message="form.errors.content" />
                                            </div>
                                        </div>

                                        <!-- pdf -->
                                        <div v-if="form.qrcode_type === 'pdf'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="phone">PDF File
                                                    <span class="text-red-600">*</span></Label>
                                                <input @change="getPdfImage($event)" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="file" name="content" id="content" maxlength="50" autofocus placeholder="PDF File ..." accept="application/pdf" required>

                                                <InputError class="mt-2" :message="form.errors.content" />
                                            </div>
                                        </div>

                                        <!-- map location -->
                                        <div v-if="form.qrcode_type === 'location'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="latitude">Latitude
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="latitude" id="latitude" maxlength="50" v-model="form.latitude" autofocus placeholder="Latitude ..." required>

                                                <InputError class="mt-2" :message="form.errors.latitude" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="latitude">Longitude
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="longitude" id="longitude" maxlength="50" v-model="form.longitude" autofocus placeholder="Longitude ..." required>

                                                <InputError class="mt-2" :message="form.errors.longitude" />
                                            </div>
                                        </div>

                                        <!-- mobile number -->
                                        <div v-if="form.qrcode_type === 'phone'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="phone">Mobile Number
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="phone" id="phone" maxlength="50" v-model="form.content" autofocus placeholder="Mobile Number ..." required>

                                                <InputError class="mt-2" :message="form.errors.content" />
                                            </div>
                                        </div>

                                        <!-- facetime -->
                                        <div v-if="form.qrcode_type === 'facetime'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="content">Mobile number/email ID
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="content" id="content" maxlength="50" v-model="form.content" autofocus placeholder="Mobile number/email ID ..." required>
                                                <span class="mb-2 ml-1 font-bold text-xs text-slate-700">Only support on iOS & MacOS Devices</span>

                                                <InputError class="mt-2" :message="form.errors.content" />
                                            </div>
                                        </div>

                                        <!-- event -->
                                        <div v-if="form.qrcode_type === 'event'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="event">Title
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="event" id="event" maxlength="80" v-model="form.event" autofocus placeholder="Title ..." required>

                                                <InputError class="mt-2" :message="form.errors.event" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="event_note">Message
                                                    <span class="text-red-600">*</span></Label>
                                                <textarea class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="event_note" id="event_note" cols="30" rows="2" maxlength="300" v-model="form.event_note" autofocus placeholder="Message ..."></textarea>

                                                <InputError class="mt-2" :message="form.errors.event_note" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="event_location">Location
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="event_location" id="event_location" maxlength="80" v-model="form.event_location" autofocus placeholder="Location ..." required>

                                                <InputError class="mt-2" :message="form.errors.event_location" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="event_start_datetime">From
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="datetime-local" name="event_start_datetime" id="event_start_datetime" maxlength="80" v-model="form.event_start_datetime" autofocus placeholder="From ..." required>

                                                <InputError class="mt-2" :message="form.errors.event_start_datetime" />
                                            </div>

                                            <div class="mb-6">
                                                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="event_end_datetime">To
                                                        <span class="text-red-600">*</span></Label>
                                                    <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                        type="datetime-local" name="event_end_datetime" id="event_end_datetime" maxlength="80" v-model="form.event_end_datetime" autofocus placeholder="To ..." required>

                                                    <InputError class="mt-2" :message="form.errors.event_end_datetime" />
                                                </div>
                                        </div>

                                        <!-- wifi -->
                                        <div v-if="form.qrcode_type === 'wifi'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="wifi_ssid">Network Name (SSID)
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="wifi_ssid" id="wifi_ssid" maxlength="80" v-model="form.wifi_ssid" autofocus placeholder="Network Name (SSID) ..." required>

                                                <InputError class="mt-2" :message="form.errors.wifi_ssid" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="wifi_encryption">Security</Label>
                                                <select class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    name="wifi_encryption" id="wifi_encryption" v-model="form.wifi_encryption" required>
                                                    <option value="nopass">None</option>
                                                    <option value="WEP">WEP</option>
                                                    <option value="WPA">WPA/WPA2-Personal</option>
                                                </select>

                                                <InputError class="mt-2" :message="form.errors.wifi_encryption" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="wifi_password">Password
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="wifi_password" id="wifi_password" maxlength="80" v-model="form.wifi_password" autofocus placeholder="Password ..." required>

                                                <InputError class="mt-2" :message="form.errors.wifi_password" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="wifi_is_hidden">Hidden?</Label>
                                                <select class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    name="wifi_is_hidden" id="wifi_is_hidden" v-model="form.wifi_is_hidden" required>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>

                                                <InputError class="mt-2" :message="form.errors.wifi_encryption" />
                                            </div>
                                        </div>

                                        <!-- crypto -->
                                        <div v-if="form.qrcode_type === 'crypto'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="crypto_coin">Cryptocurrency
                                                    <span class="text-red-600">*</span></Label>
                                                <select class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    name="crypto_coin" id="crypto_coin" v-model="form.crypto_coin" required>
                                                    <option value="bitcoin">Bitcoin</option>
                                                    <option value="bitcoincash">Bitcoin cash address</option>
                                                    <option value="ethereum">Ether</option>
                                                    <option value="litecoin">Litecoin</option>
                                                    <option value="dash">Dash</option>
                                                </select>

                                                <InputError class="mt-2" :message="form.errors.crypto_coin" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="crypto_address">Receiver
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="crypto_address" id="crypto_address" maxlength="250" v-model="form.crypto_address" autofocus placeholder="Receiver ..." required>

                                                <InputError class="mt-2" :message="form.errors.crypto_address" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="crypto_amount">Amount
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="crypto_amount" id="crypto_amount" maxlength="15" v-model="form.crypto_amount" autofocus placeholder="Amount ..." required>

                                                <InputError class="mt-2" :message="form.errors.crypto_amount" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="crypto_msg">Message
                                                    <span class="text-red-600">*</span></Label>
                                                <textarea class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="crypto_msg" id="crypto_msg" cols="30" rows="2" maxlength="150" v-model="form.crypto_msg" autofocus placeholder="Message ..." required></textarea>

                                                <InputError class="mt-2" :message="form.errors.crypto_msg" />
                                            </div>

                                        </div>

                                        <!-- paypal -->
                                        <div v-if="form.qrcode_type === 'paypal'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="paypal_link">Paypal.Me Link
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="paypal_link" id="paypal_link" maxlength="80" v-model="form.paypal_link" autofocus placeholder="yourpaypalmelink ..." autocomplete="off" required>

                                                <InputError class="mt-2" :message="form.errors.paypal_link" />
                                            </div>
                                        </div>

                                        <!-- vcard -->
                                        <div v-if="form.qrcode_type === 'vcard'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_first_name">First name
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="vcard_first_name" id="vcard_first_name" maxlength="40" v-model="form.vcard_first_name" autofocus placeholder="First name ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_first_name" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_last_name">Last name
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="vcard_last_name" id="vcard_last_name" maxlength="40" v-model="form.vcard_last_name" autofocus placeholder="Last name ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_last_name" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_phone">Mobile number
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="vcard_phone" id="vcard_phone" maxlength="40" v-model="form.vcard_phone" autofocus placeholder="Mobile number ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_phone" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_email">Email Address
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="email" name="vcard_email" id="vcard_email" maxlength="50" v-model="form.vcard_email" autofocus placeholder="Email Address ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_email" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_url">Website Link
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="url" name="vcard_url" id="vcard_url" maxlength="50" v-model="form.vcard_url" autofocus placeholder="Website Link ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_url" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_company">Company Name
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="vcard_company" id="vcard_company" maxlength="50" v-model="form.vcard_company" autofocus placeholder="Company Name ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_company" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_job_title">Job Position
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="vcard_job_title" id="vcard_job_title" maxlength="50" v-model="form.vcard_job_title" autofocus placeholder="Job Position ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_job_title" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_birthday">DOB
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="date" name="vcard_birthday" id="vcard_birthday" maxlength="50" v-model="form.vcard_birthday" autofocus placeholder="DOB ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_birthday" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_street">Street
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="vcard_street" id="vcard_street" maxlength="50" v-model="form.vcard_street" autofocus placeholder="Street ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_street" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_city">City
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="vcard_city" id="vcard_city" maxlength="50" v-model="form.vcard_city" autofocus placeholder="City ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_city" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_postal">Postal Code
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="vcard_postal" id="vcard_postal" maxlength="50" v-model="form.vcard_postal" autofocus placeholder="Postal Code ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_postal" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_region">Region
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="vcard_region" id="vcard_region" maxlength="50" v-model="form.vcard_region" autofocus placeholder="Region ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_region" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_country">Country
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="vcard_country" id="vcard_country" maxlength="50" v-model="form.vcard_country" autofocus placeholder="Country ..." required>

                                                <InputError class="mt-2" :message="form.errors.vcard_country" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="vcard_note">More Info
                                                    <span class="text-red-600">*</span></Label>
                                                <textarea class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    name="vcard_note" id="vcard_note" cols="30" rows="2" maxlength="100" v-model="form.vcard_note" autofocus placeholder="More Info ..." required></textarea>

                                                <InputError class="mt-2" :message="form.errors.vcard_note" />
                                            </div>
                                        </div>

                                        <!-- upi -->
                                        <div v-if="form.qrcode_type === 'upi'" class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="upi_id">UPI ID / VPA
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="upi_id" id="upi_id" maxlength="80" v-model="form.upi_id" autofocus placeholder="Eg: abi@okicici ..." autocomplete="off" required>

                                                <InputError class="mt-2" :message="form.errors.upi_id" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="upi_payee_name">Payee Name
                                                    <span class="text-red-600">*</span></Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="text" name="upi_payee_name" id="upi_payee_name" maxlength="80" v-model="form.upi_payee_name" autofocus placeholder="Eg: Abi ..." autocomplete="off" required>

                                                <InputError class="mt-2" :message="form.errors.upi_payee_name" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="upi_currency">Currency
                                                    <span class="text-red-600">*</span></Label>
                                                <select class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    name="upi_currency" id="upi_currency" v-model="form.upi_currency" required>
                                                    <option value="INR">Indian Rupees</option>
                                                </select>

                                                <InputError class="mt-2" :message="form.errors.upi_currency" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="upi_amount">Amount</Label>
                                                <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    type="number" name="upi_amount" id="upi_amount" maxlength="80" v-model="form.upi_amount" autofocus placeholder="Eg: 500 ..." autocomplete="off" required>

                                                <InputError class="mt-2" :message="form.errors.upi_amount" />
                                            </div>

                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="upi_msg">Transaction Remark</Label>
                                                <textarea class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                    name="upi_msg" id="upi_msg" cols="30" rows="2" maxlength="150" v-model="form.upi_msg" autofocus placeholder="Transaction Remark ..." required></textarea>

                                                <InputError class="mt-2" :message="form.errors.upi_msg" />
                                            </div>
                                        </div>

                                        <!-- buttons -->
                                        <div class="flex justify-end space-x-5 mt-4">
                                            <div>
                                                <BackButton @click="stepCountBackFunction" class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-gray-700 to-gray-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85" :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing">
                                                    <span class="ml-1">Back</span>
                                                </BackButton>
                                            </div>

                                            <div>
                                                <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing">
                                                    <span class="ml-1">Next</span>
                                                </PrimaryButton>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- step 1 (qrcode design) -->
                        <div v-if="stepcount === 3">
                            <div class="flex-auto px-0 pt-0 pb-2">
                                <form @submit.prevent="submit" role="form">
                                    <div class="p-6 overflow-x-auto">
                                        <!-- QR Code Style -->
                                        <div class="mb-6">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">QR Code Style</Label>

                                            <div class="flex space-x-5">
                                                <div>
                                                    <Label @click="qrCodeStyle('square')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_style === 'square' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-1 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="qrcode_style">
                                                        <span>
                                                            <svg class="MuiSvgIcon-root w-20" focusable="false" viewBox="0 0 80 80" aria-hidden="true"><g fill="#000000"><path d="M48,32h16v32h-16v-8h8v-8h-8v-8h-8v-8h-8v-8h8v-8h8v16Zm8-16v8h8v-8h-8Zm-24,8v-8H16v16h8v-8h8Zm16,24v8h-8v8H16v-24h8v-8h8v8h8v8h8Zm-16,0h-8v8h8v-8Z"></path></g></svg>
                                                        </span>
                                                    </Label>
                                                    <span class="flex justify-center font-bold text-xs text-slate-700 mt-2">Square</span>
                                                </div>
                                                <div>
                                                    <Label @click="qrCodeStyle('dot')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_style === 'dot' }" class="font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-1 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="qrcode_style">
                                                        <span>
                                                            <svg class="MuiSvgIcon-root w-20" focusable="false" viewBox="0 0 80 80" aria-hidden="true"><g fill="#000000"><path d="M28,32c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm8,8c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm-8,0c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm-8,0c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm16,16c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm-8,0c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm-8,0c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm16-8c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm-16,0c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm16-24c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm8-8c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm0,8c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm0,8c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm8,0c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm8-16c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm0,16c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm0,8c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4ZM20,24c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm0-8c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm8,0c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm16,32c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm8-8c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm8,8c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm0,8c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Zm-8,0c2.21,0,4,1.79,4,4s-1.79,4-4,4-4-1.79-4-4,1.79-4,4-4Z"></path></g></svg>
                                                        </span>
                                                    </Label>
                                                    <span class="flex justify-center font-bold text-xs text-slate-700 mt-2">Dot</span>
                                                </div>
                                                <div>
                                                    <Label @click="qrCodeStyle('round')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_style === 'round' }" class="font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-1 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="qrcode_style">
                                                        <span>
                                                            <svg class="MuiSvgIcon-root w-20" focusable="false" viewBox="0 0 80 80" aria-hidden="true"><g fill="#000000"><path d="M58,16h4c1.1,0,2,.9,2,2v4c0,1.1-.9,2-2,2h-4c-1.1,0-2-.9-2-2v-4c0-1.1,.9-2,2-2ZM18,32h4c1.1,0,2-.9,2-2v-6h6c1.1,0,2-.9,2-2v-4c0-1.1-.9-2-2-2h-12c-1.1,0-2,.9-2,2v12c0,1.1,.9,2,2,2Zm30,18c0-1.1-.9-2-2-2h-6v-6c0-1.1-.9-2-2-2h-6v-6c0-1.1-.9-2-2-2h-4c-1.1,0-2,.9-2,2v6h-6c-1.1,0-2,.9-2,2v20c0,1.1,.9,2,2,2h20c1.1,0,2-.9,2-2v-6h6c1.1,0,2-.9,2-2v-4Zm-16,6h-8v-8h8v8Zm30-24h-14v-14c0-1.1-.9-2-2-2h-4c-1.1,0-2,.9-2,2v6h-6c-1.1,0-2,.9-2,2v4c0,1.1,.9,2,2,2h6v6c0,1.1,.9,2,2,2h6v6c0,1.1,.9,2,2,2h6v8h-6c-1.1,0-2,.9-2,2v4c0,1.1,.9,2,2,2h12c1.1,0,2-.9,2-2v-28c0-1.1-.9-2-2-2Z"></path></g></svg>
                                                        </span>
                                                    </Label>
                                                    <span class="flex justify-center font-bold text-xs text-slate-700 mt-2">Round</span>
                                                </div>
                                            </div>

                                            <InputError class="mt-2" :message="form.errors.qrcode_style" />
                                        </div>

                                        <!-- Color Style -->
                                        <div class="mb-6">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">Color Style</Label>

                                            <div class="flex space-x-5">
                                                <div>
                                                    <Label @click="qrColorStyle('color')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.color_style === 'color' }" class="font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-1 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="qrcode_style">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler me-1 icon-tabler-brush"
                                                                width="75"
                                                                height="75"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="2"
                                                                stroke="#000000"
                                                                fill="none"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <desc>Download more icon
                                                                    variants from
                                                                    https://tabler-icons.io/i/brush
                                                                </desc>
                                                                <path stroke="none"
                                                                    d="M0 0h24v24H0z"
                                                                    fill="none"></path>
                                                                <path
                                                                    d="M3 21v-4a4 4 0 1 1 4 4h-4">
                                                                </path>
                                                                <path
                                                                    d="M21 3a16 16 0 0 0 -12.8 10.2">
                                                                </path>
                                                                <path
                                                                    d="M21 3a16 16 0 0 1 -10.2 12.8">
                                                                </path>
                                                                <path
                                                                    d="M10.6 9a9 9 0 0 1 4.4 4.4">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </Label>
                                                    <span class="flex justify-center font-bold text-xs text-slate-700 mt-2">Single Color</span>
                                                </div>

                                                <div>
                                                    <Label @click="qrColorStyle('gradient')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.color_style === 'gradient' }" class="font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-1 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="qrcode_style">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler me-1 icon-tabler-palette"
                                                                width="75"
                                                                height="75"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="2"
                                                                stroke="#000000"
                                                                fill="none"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <desc>Download more icon
                                                                    variants from
                                                                    https://tabler-icons.io/i/palette
                                                                </desc>
                                                                <path stroke="none"
                                                                    d="M0 0h24v24H0z"
                                                                    fill="none"></path>
                                                                <path
                                                                    d="M12 21a9 9 0 1 1 0 -18a9 8 0 0 1 9 8a4.5 4 0 0 1 -4.5 4h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25">
                                                                </path>
                                                                <circle cx="7.5"
                                                                    cy="10.5"
                                                                    r=".5"
                                                                    fill="currentColor">
                                                                </circle>
                                                                <circle cx="12"
                                                                    cy="7.5"
                                                                    r=".5"
                                                                    fill="currentColor">
                                                                </circle>
                                                                <circle cx="16.5"
                                                                    cy="10.5"
                                                                    r=".5"
                                                                    fill="currentColor">
                                                                </circle>
                                                            </svg>
                                                        </span>
                                                    </Label>
                                                    <span class="flex justify-center font-bold text-xs text-slate-700 mt-2">Gradient Color</span>
                                                </div>
                                            </div>

                                            <InputError class="mt-2" :message="form.errors.color_style" />
                                        </div>

                                        <!-- Color -->
                                        <div v-if="form.color_style === 'color'" class="mb-6">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">Color</Label>

                                            <div class="flex justify-between items-center focus:shad ow-soft-primary-outline text-sm leading-5.6 ease-soft  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                                                <span>{{ form.color }}</span>
                                                <input @input="regenerateQrCode()" class="rounded-md cursor-pointer w-8" type="color" id="color" v-model="form.color" autofocus
                                                placeholder="Foreground Color ..." required>
                                            </div>

                                            <InputError class="mt-2" :message="form.errors.color" />
                                        </div>

                                        <!-- gradient color -->
                                        <div v-if="form.color_style === 'gradient'" class="mb-6">
                                            <!-- gradient type -->
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">Gradient Type</Label>

                                                <div class="flex space-x-2">
                                                    <!-- vertical -->
                                                    <div>
                                                        <Label @click="qrCodeGradientType('vertical')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.foreground_gradient_type === 'vertical' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Vertical
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- horizontal -->
                                                    <div>
                                                        <Label @click="qrCodeGradientType('horizontal')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.foreground_gradient_type === 'horizontal' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Horizontal
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- diagonal -->
                                                    <div>
                                                        <Label @click="qrCodeGradientType('diagonal')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.foreground_gradient_type === 'diagonal' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Diagonal
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- inverse_diagonal -->
                                                    <div>
                                                        <Label @click="qrCodeGradientType('inverse_diagonal')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.foreground_gradient_type === 'inverse_diagonal' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Inverse Diagonal
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- radial -->
                                                    <div>
                                                        <Label @click="qrCodeGradientType('radial')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.foreground_gradient_type === 'radial' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Radial
                                                            </span>
                                                        </Label>
                                                    </div>
                                                </div>

                                                <InputError class="mt-2" :message="form.errors.foreground_gradient_type" />
                                            </div>

                                            <div class="mb-5">
                                                <!-- primary color -->
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="primary_color">Primary Color</Label>

                                                <div class="mb-5 flex justify-between items-center focus:shad ow-soft-primary-outline text-sm leading-5.6 ease-soft  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                                                    <span>{{ form.primary_color }}</span>
                                                    <input @input="regenerateQrCode()" class="rounded-md cursor-pointer w-8" type="color" v-model="form.primary_color" autofocus
                                                    placeholder="Secondary Color ..." required>
                                                </div>

                                                <!-- secondary color -->
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="primary_color">Secondary Color</Label>

                                                <div class="flex justify-between items-center focus:shad ow-soft-primary-outline text-sm leading-5.6 ease-soft  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                                                    <span>{{ form.secondary_color }}</span>
                                                    <input @input="regenerateQrCode()" class="rounded-md cursor-pointer w-8" type="color" v-model="form.secondary_color" autofocus
                                                    placeholder="Secondary Color ..." required>
                                                </div>
                                            </div>

                                            <InputError class="mt-2" :message="form.errors.secondary_color" />
                                        </div>

                                        <!-- need eye color -->
                                        <div class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">Need eye color?</Label>

                                                <div class="flex space-x-2">
                                                    <div>
                                                        <Label @click="needEyeColor('1')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.need_eye_color === '1' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Yes
                                                            </span>
                                                        </Label>
                                                    </div>
                                                    <div>
                                                        <Label @click="needEyeColor('2')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.need_eye_color === '2' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                No
                                                            </span>
                                                        </Label>
                                                    </div>
                                                </div>

                                                <InputError class="mt-2" :message="form.errors.need_eye_color" />
                                            </div>
                                        </div>

                                        <!-- eye color configuration -->
                                        <div v-if="form.need_eye_color === '1'" class="mb-6">

                                            <div class="mb-5">
                                                <!-- Change the eye colors -->
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="primary_color">Change the eye colors</Label>

                                                <div class="mb-5 flex justify-between items-center focus:shad ow-soft-primary-outline text-sm leading-5.6 ease-soft  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow">
                                                    <span>{{ form.eye_color }}</span>
                                                    <input @input="regenerateQrCode()" class="rounded-md cursor-pointer w-8" type="color" v-model="form.eye_color" autofocus
                                                    placeholder="Eye Color ..." required>
                                                </div>
                                            </div>

                                            <InputError class="mt-2" :message="form.errors.eye_color" />

                                            <!-- eye color position -->
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">Eye Color Position</Label>
                                                <div class="flex space-x-5">
                                                    <!-- left -->
                                                    <div>
                                                        <Label @click="eyeColorPosition('0')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.eyeColor_position === '0' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-1 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="eyeColor_position">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler me-1 icon-tabler-float-left"
                                                                    width="75"
                                                                    height="75"
                                                                    viewBox="0 0 24 24"
                                                                    stroke-width="2"
                                                                    stroke="#000000"
                                                                    fill="none"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <desc>Download more icon
                                                                        variants from
                                                                        https://tabler-icons.io/i/float-left
                                                                    </desc>
                                                                    <path stroke="none"
                                                                        d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <rect width="6"
                                                                        height="6"
                                                                        x="4"
                                                                        y="5"
                                                                        rx="1"></rect>
                                                                    <line x1="14"
                                                                        y1="7"
                                                                        x2="20"
                                                                        y2="7"></line>
                                                                    <line x1="14"
                                                                        y1="11"
                                                                        x2="20"
                                                                        y2="11"></line>
                                                                    <line x1="4"
                                                                        y1="15"
                                                                        x2="20"
                                                                        y2="15"></line>
                                                                    <line x1="4"
                                                                        y1="19"
                                                                        x2="20"
                                                                        y2="19"></line>
                                                                </svg>
                                                            </span>
                                                        </Label>
                                                        <span class="flex justify-center font-bold text-xs text-slate-700 mt-2">Left</span>
                                                    </div>

                                                    <!-- right -->
                                                    <div>
                                                        <Label @click="eyeColorPosition('1')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.eyeColor_position === '1' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-1 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="eyeColor_position">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler me-1 icon-tabler-float-right"
                                                                    width="75"
                                                                    height="75"
                                                                    viewBox="0 0 24 24"
                                                                    stroke-width="2"
                                                                    stroke="#000000"
                                                                    fill="none"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <desc>Download more icon
                                                                        variants from
                                                                        https://tabler-icons.io/i/float-right
                                                                    </desc>
                                                                    <path stroke="none"
                                                                        d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <rect width="6"
                                                                        height="6"
                                                                        x="14"
                                                                        y="5"
                                                                        rx="1"></rect>
                                                                    <line x1="4"
                                                                        y1="7"
                                                                        x2="10"
                                                                        y2="7"></line>
                                                                    <line x1="4"
                                                                        y1="11"
                                                                        x2="10"
                                                                        y2="11"></line>
                                                                    <line x1="4"
                                                                        y1="15"
                                                                        x2="20"
                                                                        y2="15"></line>
                                                                    <line x1="4"
                                                                        y1="19"
                                                                        x2="20"
                                                                        y2="19"></line>
                                                                </svg>
                                                            </span>
                                                        </Label>
                                                        <span class="flex justify-center font-bold text-xs text-slate-700 mt-2">Right</span>
                                                    </div>

                                                    <!-- bottom -->
                                                    <div>
                                                        <Label @click="eyeColorPosition('2')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.eyeColor_position === '2' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-1 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="eyeColor_position">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler me-1 icon-tabler-float-center"
                                                                    width="75"
                                                                    height="75"
                                                                    viewBox="0 0 24 24"
                                                                    stroke-width="2"
                                                                    stroke="#000000"
                                                                    fill="none"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <desc>Download more icon
                                                                        variants from
                                                                        https://tabler-icons.io/i/float-center
                                                                    </desc>
                                                                    <path stroke="none"
                                                                        d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <rect width="6"
                                                                        height="6"
                                                                        x="9"
                                                                        y="5"
                                                                        rx="1"></rect>
                                                                    <line x1="4"
                                                                        y1="7"
                                                                        x2="5"
                                                                        y2="7"></line>
                                                                    <line x1="4"
                                                                        y1="11"
                                                                        x2="5"
                                                                        y2="11"></line>
                                                                    <line x1="19"
                                                                        y1="7"
                                                                        x2="20"
                                                                        y2="7"></line>
                                                                    <line x1="19"
                                                                        y1="11"
                                                                        x2="20"
                                                                        y2="11"></line>
                                                                    <line x1="4"
                                                                        y1="15"
                                                                        x2="20"
                                                                        y2="15"></line>
                                                                    <line x1="4"
                                                                        y1="19"
                                                                        x2="20"
                                                                        y2="19"></line>
                                                                </svg>
                                                            </span>
                                                        </Label>
                                                        <span class="flex justify-center font-bold text-xs text-slate-700 mt-2">Bottom</span>
                                                    </div>

                                                </div>

                                                <InputError class="mt-2" :message="form.errors.eyeColor_position" />
                                            </div>

                                            <!-- eye color style -->
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">Eye Color Position</Label>
                                                <div class="flex space-x-5">
                                                    <!-- Square -->
                                                    <div>
                                                        <Label @click="eyeColorStyle('square')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.eye_color_style === 'square' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-1 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="eyeColor_position">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler me-1 icon-tabler-square"
                                                                    width="75"
                                                                    height="75"
                                                                    viewBox="0 0 24 24"
                                                                    stroke-width="2"
                                                                    stroke="#000000"
                                                                    fill="none"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <desc>Download more icon
                                                                        variants from
                                                                        https://tabler-icons.io/i/square
                                                                    </desc>
                                                                    <path stroke="none"
                                                                        d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <rect x="4"
                                                                        y="4"
                                                                        width="16"
                                                                        height="16"
                                                                        rx="2"></rect>
                                                                </svg>
                                                            </span>
                                                        </Label>
                                                        <span class="flex justify-center font-bold text-xs text-slate-700 mt-2">Square</span>
                                                    </div>

                                                    <!-- Square -->
                                                    <div>
                                                        <Label @click="eyeColorStyle('circle')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.eye_color_style === 'circle' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-1 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="eyeColor_position">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler me-1 icon-tabler-circle"
                                                                    width="75"
                                                                    height="75"
                                                                    viewBox="0 0 24 24"
                                                                    stroke-width="2"
                                                                    stroke="#000000"
                                                                    fill="none"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <desc>Download more icon
                                                                        variants from
                                                                        https://tabler-icons.io/i/circle
                                                                    </desc>
                                                                    <path stroke="none"
                                                                        d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <circle cx="12"
                                                                        cy="12"
                                                                        r="9">
                                                                    </circle>
                                                                </svg>
                                                            </span>
                                                        </Label>
                                                        <span class="flex justify-center font-bold text-xs text-slate-700 mt-2">Circle</span>
                                                    </div>
                                                </div>

                                                <InputError class="mt-2" :message="form.errors.eye_color_style" />
                                            </div>
                                        </div>

                                        <!-- logo image -->
                                        <div class="mb-6">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="upload_logo">Upload Logo</Label>
                                            <input @change="getLogoImage($event)" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                                type="file" name="upload_logo" id="upload_logo" accept=".jpg, .jpeg, .png, .gif">

                                            <InputError class="mt-2" :message="form.errors.content" />
                                        </div>

                                        <!-- upload logo size -->
                                        <div class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">Upload Logo Size</Label>

                                                <div class="flex space-x-2">
                                                    <!-- small -->
                                                    <div>
                                                        <Label @click="uploadLogoSize('0.1')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.upload_logo_size === '0.1' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Small
                                                            </span>
                                                        </Label>
                                                    </div>
                                                    <!-- medium -->
                                                    <div>
                                                        <Label @click="uploadLogoSize('0.2')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.upload_logo_size === '0.2' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Medium
                                                            </span>
                                                        </Label>
                                                    </div>
                                                    <!-- large -->
                                                    <div>
                                                        <Label @click="uploadLogoSize('0.5')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.upload_logo_size === '0.5' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Large
                                                            </span>
                                                        </Label>
                                                    </div>
                                                </div>

                                                <InputError class="mt-2" :message="form.errors.upload_logo_size" />
                                            </div>
                                        </div>

                                        <!-- More settings -->
                                        <div class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">Download Quality</Label>

                                                <div class="flex space-x-2">
                                                    <!-- basic -->
                                                    <div>
                                                        <Label @click="downloadQuality('200')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.size === '200' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Basic
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- normal -->
                                                    <div>
                                                        <Label @click="downloadQuality('500')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.size === '500' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Normal
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- fine -->
                                                    <div>
                                                        <Label @click="downloadQuality('1000')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.size === '1000' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Fine
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- high -->
                                                    <div>
                                                        <Label @click="downloadQuality('1500')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.size === '1500' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                High
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- very high -->
                                                    <div>
                                                        <Label @click="downloadQuality('2000')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.size === '2000' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Very High
                                                            </span>
                                                        </Label>
                                                    </div>
                                                </div>

                                                <InputError class="mt-2" :message="form.errors.size" />
                                            </div>
                                        </div>

                                        <!-- Level of error correction -->
                                        <div class="mb-6">
                                            <div class="mb-6">
                                                <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">Level of error correction</Label>

                                                <div class="flex space-x-2">
                                                    <!-- low -->
                                                    <div>
                                                        <Label @click="qrCodeEcc('L')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_ecc === 'L' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Low
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- medium -->
                                                    <div>
                                                        <Label @click="qrCodeEcc('M')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_ecc === 'M' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Medium
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- quartile -->
                                                    <div>
                                                        <Label @click="qrCodeEcc('Q')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_ecc === 'Q' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                Quartile
                                                            </span>
                                                        </Label>
                                                    </div>

                                                    <!-- high -->
                                                    <div>
                                                        <Label @click="qrCodeEcc('H')" :class="{ 'border-themeColor shadow-soft-primary-outline': form.qrcode_ecc === 'H' }" class="block font-bold text-xs text-gray-600 rounded bg-white bg-clip-padding p-2 hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-themeColor hover:outline-none hover:transition-shadow cursor-pointer" for="foreground_gradient_type">
                                                            <span>
                                                                High
                                                            </span>
                                                        </Label>
                                                    </div>
                                                </div>

                                                <InputError class="mt-2" :message="form.errors.qrcode_ecc" />
                                            </div>
                                        </div>

                                        <!-- note -->
                                        <div>
                                            <span class="font-bold text-sm text-slate-700">Note: Double-check your QR Code once
                                                before using it.</span>
                                        </div>

                                        <!-- button -->
                                        <div class="flex justify-end space-x-5 mt-4">
                                            <div>
                                                <BackButton @click="stepCountBackFunction" class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-gray-700 to-gray-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85" :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing">
                                                    <span class="ml-1">Back</span>
                                                </BackButton>
                                            </div>

                                            <div>
                                                <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing">
                                                    <span class="ml-1">Save</span>
                                                </PrimaryButton>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- view -->
                <div class="col-span-2 px-3">
                    <div class="p-2">
                        <div>
                            <div class="flex items-center justify-between py-6">
                                <div>
                                    <span v-if="stepcount === 3">
                                        <h6>QR Code</h6>
                                    </span>
                                    <span v-else>
                                        <h6>Example</h6>
                                    </span>
                                </div>
                                <div v-if="stepcount != 1" class="bg-white p-2 cursor-pointer rounded-md shadow-md mb-2">
                                    <span @click="view('mobile')" v-if="viewVar === 'qrcode'">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-mobile" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z"></path>
                                            <path d="M11 4h2"></path>
                                            <path d="M12 17v.01"></path>
                                        </svg>
                                    </span>
                                    <span @click="view('qrcode')" v-if="viewVar === 'mobile'">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-qrcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Show QR Code -->
                        <div v-if="viewVar === 'qrcode'">
                            <div class="flex justify-center overflow-x-auto py-10 rounded bg-white bg-clip-padding border border-solid border-gray-300">
                                <img class="w-80" :src="qrCodeImage">
                            </div>

                            <div class="flex-auto px-0 pt-0 pb-2">
                                <div
                                    class="flex items-center justify-center p-6 pb-0 mb-0border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                    <h6>Download Formats</h6>
                                </div>
                                <div class="flex items-center justify-center p-6 overflow-x-auto space-x-6">
                                    <div>
                                        <button @click="downloadQrCode('png')"
                                            class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-red-600 to-red-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                            .PNG
                                        </button>
                                    </div>
                                    <div>
                                        <button @click="downloadQrCode('jpg')"
                                            class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-gray-600 to-gray-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                            .JPG
                                        </button>
                                    </div>
                                    <div>
                                        <button @click="downloadQrCode('svg')"
                                            class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-green-600 to-green-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                            .SVG
                                        </button>
                                    </div>
                                    <div>
                                        <button @click="downloadQrCode('webp')"
                                            class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-orange-600 to-orange-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                            .WebP
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Show Mobile Views -->
                        <div v-if="viewVar === 'mobile'" class="flex justify-center overflow-x-auto relative">
                            <img class="w-56" :src="$page.props.imagePath + 'images/mobile.webp'">
                            <div class="absolute bg-white w-[200px] h-[432px] rounded-[35px] top-2 p-3">
                                <!-- sample -->
                                <div>
                                    <img class="w-44" :src="$page.props.imagePath + 'images/menu.png'">
                                </div>

                                <div class="my-5">
                                    <span v-if="stepcount === 2" >
                                        <div v-if="form.qrcode_type != 'url'" class="text-center">
                                            <h6 class="text-xs">QR Code Generator</h6>
                                        </div>
                                        <div class="mt-3">
                                            <div class="relative p-2 flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-md rounded bg-clip-border">
                                                <div class="bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                                   <!-- url -->
                                                    <div v-if="form.qrcode_type === 'url'" class="flex flex-col justify-center ">
                                                        <span class="border-2 border-gray-500 text-gray-600 px-2 py-2 text-xs rounded">
                                                            <span v-if="form.url === ''">
                                                                https://www.qrcode.com
                                                            </span>
                                                            <span v-else >{{ form.url }}</span>
                                                        </span>
                                                        <img class="mt-2" :src="$page.props.imagePath + 'images/url-preview.png'">
                                                    </div>
                                                    <!-- text -->
                                                    <span v-if="form.qrcode_type === 'text'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">Plain Text</h6>
                                                        </div>
                                                        <div>
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Text Message</Label>
                                                            <span class="mb-1 block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.content }}</span>
                                                        </div>
                                                    </span>

                                                    <!-- eamil -->
                                                    <span v-if="form.qrcode_type === 'email'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">Email</h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Email ID</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.email }}</span>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Subject</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.subject }}</span>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Body</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.content }}</span>
                                                        </div>
                                                    </span>

                                                    <!-- sms -->
                                                    <span v-if="form.qrcode_type === 'sms'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">Email</h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Mobile Number</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.upload_logo }}</span>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Messege</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.content }}</span>
                                                        </div>
                                                    </span>

                                                    <!-- whatsapp -->
                                                    <span v-if="form.qrcode_type === 'whatsapp'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">WhatsApp Message</h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">WhatsApp Number</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.phone }}</span>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Messege</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.content }}</span>
                                                        </div>
                                                    </span>

                                                    <!-- pdf -->
                                                    <span v-if="form.qrcode_type === 'pdf'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">PDF</h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">PDF File</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.content }}</span>
                                                        </div>
                                                    </span>

                                                    <!-- location -->
                                                    <span v-if="form.qrcode_type === 'location'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">Map Location</h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Latitude</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.latitude }}</span>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Longitude</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.longitude }}</span>
                                                        </div>
                                                    </span>

                                                    <!-- phone -->
                                                    <span v-if="form.qrcode_type === 'phone'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">Phone Number</h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Mobile Number</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.phone }}</span>
                                                        </div>
                                                    </span>

                                                    <!-- facetime -->
                                                    <span v-if="form.qrcode_type === 'facetime'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">Facetime</h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Mobile Number</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.content }}</span>
                                                        </div>
                                                    </span>

                                                    <!-- event -->
                                                    <span v-if="form.qrcode_type === 'event'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">Event</h6>
                                                        </div>
                                                        <div class="overflow-y-scroll h-68">
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Title</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.event }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Message</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.event_note }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Location</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.event_location }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">From</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.event_start_datetime }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">To</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.event_end_datetime }}</span>
                                                            </div>
                                                        </div>
                                                    </span>

                                                    <!-- wifi -->
                                                    <span v-if="form.qrcode_type === 'wifi'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">WiFi</h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Network Name (SSID)</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.wifi_ssid }}</span>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Security</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.wifi_encryption }}</span>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Password</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.wifi_password }}</span>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Hidden?</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.wifi_is_hidden }}</span>
                                                        </div>
                                                    </span>

                                                    <!-- crypto -->
                                                    <span v-if="form.qrcode_type === 'crypto'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">Crypto Payment</h6>
                                                        </div>
                                                        <div class="overflow-y-scroll h-68">
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Cryptocurrency</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.crypto_coin }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Receiver</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.crypto_address }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Amount</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.crypto_amount }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Message</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.crypto_msg }}</span>
                                                            </div>
                                                        </div>
                                                    </span>

                                                    <!-- paypal -->
                                                    <span v-if="form.qrcode_type === 'paypal'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">Paypal Payment</h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <Label class="mb-1 block font-bold text-xs text-slate-700">Paypal.Me Link</Label>
                                                            <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.paypal_link }}</span>
                                                        </div>
                                                    </span>

                                                    <!-- vcard -->
                                                    <span v-if="form.qrcode_type === 'vcard'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">Save Contact</h6>
                                                        </div>
                                                        <div class="overflow-y-scroll h-68">
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">First Name</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_first_name }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Last Name</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_last_name }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Mobile Number</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_phone }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Email Address</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_email }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Website Link</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_url }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Company Name</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_company }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Job Position</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_job_title }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">DOB</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_birthday }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Street</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_street }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">City</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_city }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Postal Code</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_postal }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Region</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_region }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Country</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_country }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">More Info</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.vcard_note }}</span>
                                                            </div>
                                                        </div>
                                                    </span>

                                                    <!-- upi -->
                                                    <span v-if="form.qrcode_type === 'upi'">
                                                        <div>
                                                            <h6 class="text-sm font-bold">UPI Payment</h6>
                                                        </div>
                                                        <div class="overflow-y-scroll h-72">
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">UPI ID / VPA</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.upi_id }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Payee Name</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.upi_payee_name }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Currency</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.upi_currency }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Amount</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.upi_amount }}</span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <Label class="mb-1 block font-bold text-xs text-slate-700">Transaction Remark</Label>
                                                                <span class="block text-xs text-slate-500 bg-gray-100 p-1 rounded">{{ form.upi_msg }}</span>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <span v-else>
                                        <span v-if="form.qrcode_type === 'url'" class="flex flex-col justify-center my-5">
                                            <span class="border-2 border-gray-500 text-gray-600 px-2 py-2 text-xs rounded">
                                                <span>
                                                    https://www.qrcode.com
                                                </span>
                                            </span>
                                            <img class="mt-2" :src="$page.props.imagePath + 'images/url-preview.png'">
                                        </span>
                                        <span v-else-if="form.qrcode_type === ''" class="flex items-center justify-center h-full">
                                            <img class="w-32" :src="$page.props.imagePath + 'images/qrcode.png'">
                                        </span>
                                        <span v-else>
                                            <img class="w-44" :src="$page.props.imagePath + 'images/url-preview.png'">
                                        </span>
                                    </span>
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
import StepCount from '@/Components/Shared/StepCount.vue'
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { onMounted, computed } from "vue";
import axios from 'axios';

const props = defineProps({
    qr_code_details: Object,
});

const stepcount = ref(1);
const qrCodeImage = ref('');
const viewVar = ref('mobile');
const randomId = ref(Math.random().toString(36).substr(2, 9));
const qrCodeDetails = ref(JSON.parse(props.qr_code_details.settings));

const form = useForm({
    qr_code_id: props.qr_code_details.qr_code_id,
    name: props.qr_code_details.name,
    qrcode_type: props.qr_code_details.type,
    url: qrCodeDetails.value.url_value,
    phone: '',
    email: qrCodeDetails.value.email_address_value,
    subject: qrCodeDetails.value.email_subject_value,
    content: '',
    enable_analytics: qrCodeDetails.value.url_enable_analytics_value,
    latitude: qrCodeDetails.value.location_latitude_value,
    longitude: qrCodeDetails.value.location_longitude_value,
    wifi_ssid: qrCodeDetails.value.wifi_ssid_value,
    wifi_encryption: qrCodeDetails.value.wifi_encryption_value,
    wifi_password: qrCodeDetails.value.wifi_password_value,
    wifi_is_hidden: qrCodeDetails.value.wifi_is_hidden_value,
    event: qrCodeDetails.value.event_name_value,
    event_location: qrCodeDetails.value.event_location_value,
    event_note: qrCodeDetails.value.event_note_value,
    event_start_datetime: qrCodeDetails.value.event_start_datetime_value,
    event_end_datetime: qrCodeDetails.value.event_end_datetime_value,
    crypto_coin: qrCodeDetails.value.crypto_coin_value,
    crypto_address: qrCodeDetails.value.crypto_address_value,
    crypto_amount: qrCodeDetails.value.crypto_amount_value,
    crypto_msg: qrCodeDetails.value.crypto_msg_value,
    vcard_first_name: qrCodeDetails.value.vcard_first_name_value,
    vcard_last_name: qrCodeDetails.value.vcard_last_name_value,
    vcard_phone: qrCodeDetails.value.vcard_phone_value,
    vcard_email: qrCodeDetails.value.vcard_email_value,
    vcard_url: qrCodeDetails.value.vcard_url_value,
    vcard_company: qrCodeDetails.value.vcard_company_value,
    vcard_job_title: qrCodeDetails.value.vcard_job_title_value,
    vcard_birthday: qrCodeDetails.value.vcard_birthday_value,
    vcard_street: qrCodeDetails.value.vcard_street_value,
    vcard_city: qrCodeDetails.value.vcard_city_value,
    vcard_postal: qrCodeDetails.value.vcard_postal_value,
    vcard_region: qrCodeDetails.value.vcard_region_value,
    vcard_country: qrCodeDetails.value.vcard_country_value,
    vcard_note: qrCodeDetails.value.vcard_note_value,
    paypal_link: qrCodeDetails.value.paypal_link_value,
    upi_id: qrCodeDetails.value.upi_id_value,
    upi_payee_name: qrCodeDetails.value.upi_payee_name_value,
    upi_currency: qrCodeDetails.value.upi_currency_value,
    upi_amount: qrCodeDetails.value.upi_amount_value,
    upi_msg: qrCodeDetails.value.upi_msg_value,
    qrcode_style: qrCodeDetails.value.qrcode_style,
    color_style: qrCodeDetails.value.color_style,
    color: qrCodeDetails.value.color,
    foreground_gradient_type: qrCodeDetails.value.foreground_gradient_type,
    primary_color: qrCodeDetails.value.primary_color,
    secondary_color: qrCodeDetails.value.secondary_color,
    background_color: '',
    background_color_transparency: '',
    need_eye_color: qrCodeDetails.value.need_eye_color,
    eye_color: qrCodeDetails.value.eye_color,
    eyeColor_position: qrCodeDetails.value.eyeColor_position,
    eye_color_style: qrCodeDetails.value.eye_color_style,
    upload_logo: '',
    upload_logo_size: '',
    size: qrCodeDetails.value.size,
    qrcode_ecc: qrCodeDetails.value.qrcode_ecc,
});

if(props.qr_code_details.type === 'text') {
    form.content = qrCodeDetails.value.text_value;
} else if(props.qr_code_details.type === 'facetime') {
    form.content = qrCodeDetails.value.facetime_value;
} else if(props.qr_code_details.type === 'phone') {
    form.content = qrCodeDetails.value.phone_value;
} else if(props.qr_code_details.type === 'whatsapp') {
    form.phone = qrCodeDetails.value.whatsapp_no_value;
    form.content = qrCodeDetails.value.whatsapp_send_msg_value;
} else if(props.qr_code_details.type === 'sms') {
    form.phone = qrCodeDetails.value.sms_phone_value;
    form.content = qrCodeDetails.value.sms_msg_value;
} else if(props.qr_code_details.type === 'email') {
    form.content = qrCodeDetails.value.email_body_value;
}

if(props.qr_code_details.qr_code_logo_size === 0.1) {
    form.upload_logo_size = '0.1';

} else if(props.qr_code_details.qr_code_logo_size === 0.2) {
    form.upload_logo_size = '0.2';

} else if (props.qr_code_details.qr_code_logo_size === 0.5) {
    form.upload_logo_size = '0.5';
}

const regenerateQrCode = async () => {
    try {
        const response = await axios.post(route('user.regenerate.qr'), form);
        console.log(response.data);
        qrCodeImage.value = response.data.source;
    } catch (error) {
        console.error(error);
    }
}

// Generate the QR Code image URL
const generateQRCodeImage = computed(() => {
    if (qrCodeImage.value) {
        return qrCodeImage.value;
    } else {
        return null;
    }
});

function stepCountFunction() {
    if(form.qrcode_type != ''){

        regenerateQrCode();
        stepcount.value += 1;

        if (stepcount.value === 3) {
            viewVar.value = 'qrcode'
        }

    } else {
        alert('Select Qr Code Type');
    }
}

function stepCountBackFunction() {
    if(form.qrcode_type != ''){
        stepcount.value -= 1;
    } else {
        aler('Select Qr Code Type');
    }
}

function downloadQrCode(type) {
    // Get the QR code image URL
    const qrCodeImageUrl = qrCodeImage.value; // Replace with the actual URL of your QR code image

    // Create an anchor element
    const downloadLink = document.createElement("a");
    downloadLink.href = qrCodeImageUrl;

    // Set the download attribute to specify the file name
    downloadLink.download = form.name + '.' + type;

    // Append the anchor element to the document body
    document.body.appendChild(downloadLink);

    // Simulate a click event to trigger the download
    downloadLink.click();

    // Remove the anchor element from the document body
    document.body.removeChild(downloadLink);
}

function getPdfImage($event) {
    form.content = $event.target.files[0];
}

function getLogoImage($event) {
    form.upload_logo = $event.target.files[0];
}

function qrCodeType(type) {
    form.qrcode_type = type;
}

function qrCodeStyle(type) {
    form.qrcode_style = type;
    regenerateQrCode();
}

function qrColorStyle(type) {
    form.color_style = type;
    regenerateQrCode();
}

function qrCodeGradientType(type) {
    form.foreground_gradient_type = type;
    regenerateQrCode();
}

function needEyeColor(type) {
    form.need_eye_color = type;
    regenerateQrCode();
}

function eyeColorPosition(type) {
    form.eyeColor_position = type;
    regenerateQrCode();
}

function eyeColorStyle(type) {
    form.eye_color_style = type;
    regenerateQrCode();
}

function uploadLogoSize(type) {
    form.upload_logo_size = type;
    regenerateQrCode();
}

function downloadQuality(type) {
    form.size = type;
    regenerateQrCode();
}

function qrCodeEcc(type) {
    form.qrcode_ecc = type;
    regenerateQrCode();
}

function view(type) {
    viewVar.value = type;
}

const submit = () => {
    form.post(route('user.update.qr'));
};

</script>







