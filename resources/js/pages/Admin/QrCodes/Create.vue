<template>
    <Head title="QR Codes Create" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />

            <div class="grid md:grid-cols-5 -mx-3">
                <div class="col-span-3 w-full max-w-full px-3">
                    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6><span v-if="stepcount === 1">Dynamic QR</span><span v-if="stepcount === 2">Complete the content of the QR</span><span v-if="stepcount === 3">Design the QR</span></h6>
                        </div>
                        <div v-if="stepcount === 1" class="flex-auto p-6">
                            <div class="grid md:grid-cols-2 md:gap-x-6 gap-y-6">
                                <div @click="qrCodeType('url')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'url' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Website</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('text')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'text' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Plain Text</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('email')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'email' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Email</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('sms')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'sms' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Sms</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('whatsapp')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'whatsapp' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Whatsapp</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('pdf')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'pdf' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">PDF</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('location')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'location' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Location</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('phone')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'phone' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Phone</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('facetime')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'facetime' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Facetime</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('event')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'event' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Event</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('wifi')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'wifi' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Wifi</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('crypto')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'crypto' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Crypto</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('paypal')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'paypal' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Paypal</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('vcard')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'vcard' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">Vcard</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                                <div @click="qrCodeType('upi')" :class="{ 'border-fuchsia-300 shadow-soft-primary-outline': form.qrcode_type === 'upi' }" class="flex p-2 overflow-x-auto bg-[#F7F7F7] rounded-[8px] shadow-md pointer-md hover:shadow-soft-primary-outline transition-all border border-solid border-gray-300 hover:border-fuchsia-300 hover:outline-none hover:transition-shadow cursor-pointer">
                                    <div class="bg-[#F7F7F7] rounded px-5 py-2">
                                        <img class="w-12" :src="$page.props.imagePath + 'images/url.png'">
                                    </div>
                                    <div class="flex flex-col items-center mt-1 ml-2">
                                        <h6 class="text-lg">UPI</h6>
                                        <p class="text-xs">Open a URL</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton @click="stepCountFunction" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                        </path>
                                        <circle cx="12" cy="14" r="2"></circle>
                                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                    </svg>
                                    <span class="ml-1">Next</span>
                                </PrimaryButton>
                            </div>
                        </div>

                        <div v-if="stepcount === 2">
                            <div class="flex-auto px-0 pt-0 pb-2">
                                <div class="p-6 overflow-x-auto">
                                     <div id="accordionExample">
                                    <div
                                        class="rounded-t-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                                        <h2 class="mb-0" id="headingOne">
                                        <button
                                            class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                                            type="button"
                                            data-te-collapse-init
                                            data-te-target="#collapseOne"
                                            aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Accordion Item #1
                                            <span
                                            class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
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
                                        </button>
                                        </h2>
                                        <div
                                        id="collapseOne"
                                        class="!visible"
                                        data-te-collapse-item
                                        data-te-collapse-show
                                        aria-labelledby="headingOne"
                                        data-te-parent="#accordionExample">
                                        <div class="px-5 py-4">
                                            <strong>This is the first item's accordion body.</strong> It is
                                            shown by default, until the collapse plugin adds the appropriate
                                            classes that we use to style each element. These classes control
                                            the overall appearance, as well as the showing and hiding via CSS
                                            transitions. You can modify any of this with custom CSS or
                                            overriding our default variables. It's also worth noting that just
                                            about any HTML can go within the <code>.accordion-body</code>,
                                            though the transition does limit overflow.
                                        </div>
                                        </div>
                                    </div>
                                    <div
                                        class="border border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                                        <h2 class="mb-0" id="headingTwo">
                                        <button
                                            class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                                            type="button"
                                            data-te-collapse-init
                                            data-te-collapse-collapsed
                                            data-te-target="#collapseTwo"
                                            aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Accordion Item #2
                                            <span
                                            class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
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
                                        </button>
                                        </h2>
                                        <div
                                        id="collapseTwo"
                                        class="!visible hidden"
                                        data-te-collapse-item
                                        aria-labelledby="headingTwo"
                                        data-te-parent="#accordionExample">
                                        <div class="px-5 py-4">
                                            <strong>This is the second item's accordion body.</strong> It is
                                            hidden by default, until the collapse plugin adds the appropriate
                                            classes that we use to style each element. These classes control
                                            the overall appearance, as well as the showing and hiding via CSS
                                            transitions. You can modify any of this with custom CSS or
                                            overriding our default variables. It's also worth noting that just
                                            about any HTML can go within the <code>.accordion-body</code>,
                                            though the transition does limit overflow.
                                        </div>
                                        </div>
                                    </div>
                                    <div
                                        class="rounded-b-lg border border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                                        <h2 class="accordion-header mb-0" id="headingThree">
                                        <button
                                            class="group relative flex w-full items-center border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[15px] [&[data-te-collapse-collapsed]]:transition-none"
                                            type="button"
                                            data-te-collapse-init
                                            data-te-collapse-collapsed
                                            data-te-target="#collapseThree"
                                            aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Accordion Item #3
                                            <span
                                            class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
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
                                        </button>
                                        </h2>
                                        <div
                                        id="collapseThree"
                                        class="!visible hidden"
                                        data-te-collapse-item
                                        aria-labelledby="headingThree"
                                        data-te-parent="#accordionExample">
                                        <div class="px-5 py-4">
                                            <strong>This is the third item's accordion body.</strong> It is
                                            hidden by default, until the collapse plugin adds the appropriate
                                            classes that we use to style each element. These classes control
                                            the overall appearance, as well as the showing and hiding via CSS
                                            transitions. You can modify any of this with custom CSS or
                                            overriding our default variables. It's also worth noting that just
                                            about any HTML can go within the <code>.accordion-body</code>,
                                            though the transition does limit overflow.
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class='mb-6'>
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="name">QR Code
                                            Name
                                            <span class="text-red-600">*</span></Label>
                                        <TextInput id="name" type="text" v-model="form.name" autofocus
                                            placeholder="Name..." minlength="3" maxlength="100" required />

                                        <InputError class="mt-2" :message="form.errors.name" />
                                    </div>

                                    <div v-if="form.qrcode_type === 'url'" class="mb-6">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="content">Link Url
                                            <span class="text-red-600">*</span></Label>
                                        <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            type="url" name="url" id="url" v-model="form.url" autofocus placeholder="Ex: http://domain.com'...">

                                        <InputError class="mt-2" :message="form.errors.url" />
                                    </div>

                                    <div class="flex justify-end space-x-5 mt-4">
                                            <div>
                                                <BackButton @click="stepCountBackFunction" :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                                        </path>
                                                        <circle cx="12" cy="14" r="2"></circle>
                                                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                                    </svg>
                                                    <span class="ml-1">Back</span>
                                                </BackButton>
                                            </div>

                                            <div>
                                                <PrimaryButton @click="stepCountFunction" :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                                        </path>
                                                        <circle cx="12" cy="14" r="2"></circle>
                                                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                                    </svg>
                                                    <span class="ml-1">Next</span>
                                                </PrimaryButton>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div v-if="stepcount === 3">
                            <div class="flex-auto px-0 pt-0 pb-2">
                                <div class="p-6 overflow-x-auto">
                                    <div class="mb-6">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="qrcode_style">QR Code Style</Label>

                                        <div class="flex space-x-5">
                                            <div>
                                                <Label @input="qrCodeStyle()" :class="{ '': form.qrcode_style === 'square' }" class="font-bold text-xs text-gray-600 rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 cursor-pointer" for="qrcode_style">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler me-1 icon-tabler-square"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="2"
                                                            stroke="currentColor"
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
                                                        Square
                                                    </span>
                                                </Label>
                                            </div>
                                            <div>
                                                <Label class="font-bold text-xs flex focus:shad ow-soft-primary-outline text-sm leading-5.6 ease-soft appearance-none border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" for="color">
                                                    <input
                                                        class="border-none"
                                                        type="radio" id="color" v-model="form.color" autofocus placeholder="Color..."
                                                        required>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler me-1 icon-tabler-square"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="2"
                                                            stroke="currentColor"
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
                                                        Square
                                                    </span>
                                                </Label>
                                            </div>
                                            <div>
                                                <Label class="font-bold text-xs flex focus:shad ow-soft-primary-outline text-sm leading-5.6 ease-soft appearance-none border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" for="color">
                                                    <input
                                                        class="border-none"
                                                        type="radio" id="color" v-model="form.color" autofocus placeholder="Color..."
                                                        required>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler me-1 icon-tabler-square"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="2"
                                                            stroke="currentColor"
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
                                                        Square
                                                    </span>
                                                </Label>
                                            </div>
                                        </div>

                                        <InputError class="mt-2" :message="form.errors.color" />
                                    </div>

                                    <div class="mb-6">
                                        <Label @input="regenerateQrCode" class="mb-2 ml-1 font-bold text-xs text-slate-700"
                                            for="color">Color
                                            <span class="text-red-600">*</span></Label>
                                        <input
                                            class="focus:shad ow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            type="color" id="color" v-model="form.color" autofocus placeholder="Color..."
                                            required>

                                        <InputError class="mt-2" :message="form.errors.color" />
                                    </div>

                                    <div>
                                        <span class="font-bold text-sm text-slate-700">Note: Double-check your QR Code once
                                            before using it.</span>
                                    </div>

                                    <div class="flex justify-end space-x-5 mt-4">
                                        <div>
                                            <BackButton @click="stepCountBackFunction" :class="{ 'opacity-25': form.processing }"
                                                :disabled="form.processing">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                                    </path>
                                                    <circle cx="12" cy="14" r="2"></circle>
                                                    <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                                </svg>
                                                <span class="ml-1">Back</span>
                                            </BackButton>
                                        </div>

                                        <div>
                                            <PrimaryButton @click="stepCountFunction" :class="{ 'opacity-25': form.processing }"
                                                :disabled="form.processing">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                                    </path>
                                                    <circle cx="12" cy="14" r="2"></circle>
                                                    <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                                </svg>
                                                <span class="ml-1">Next</span>
                                            </PrimaryButton>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 px-3">
                    <div class="p-2">
                        <div>
                            <div class="py-6">
                                <h6>Example</h6>
                            </div>
                        </div>

                        <!-- Show QR Code -->
                        <div class="flex justify-center overflow-x-auto relative">
                            <img class="w-56" :src="$page.props.imagePath + 'images/mobile.webp'">
                            <div class="absolute bg-white w-[200px] h-[432px] rounded-[35px] top-2 p-3">
                                <div>
                                    <img class="w-44" :src="$page.props.imagePath + 'images/menu.png'">
                                </div>
                                <div v-if="form.qrcode_type === ''" class="flex items-center justify-center h-full">
                                    <img class="w-32" :src="$page.props.imagePath + 'images/qrcode.png'">
                                </div>
                                <div v-else class="flex flex-col justify-center my-5">
                                    <span class="border-2 border-gray-500 text-gray-600 px-2 py-2 text-xs rounded">
                                        <span v-if="form.url === ''">
                                            https://www.qrcode.com
                                        </span>
                                        <span v-else >{{ form.url }}</span>
                                    </span>
                                    <img class="mt-2" :src="$page.props.imagePath + 'images/url-preview.png'">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="flex-auto px-0 pt-0 pb-2">
                        <div
                            class="flex items-center justify-center p-6 pb-0 mb-0border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Download Formats</h6>
                        </div>
                        <div class="flex items-center justify-center p-6 overflow-x-auto space-x-6">
                            <div>
                                <button @click="downloadBarcode('png')"
                                    class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-red-600 to-red-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    .PNG
                                </button>
                            </div>
                            <div>
                                <button @click="downloadBarcode('jpg')"
                                    class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-gray-600 to-gray-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    .JPG
                                </button>
                            </div>
                            <div>
                                <button @click="downloadBarcode('svg')"
                                    class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-green-600 to-green-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    .SVG
                                </button>
                            </div>
                            <div>
                                <button @click="downloadBarcode('webp')"
                                    class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-orange-600 to-orange-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    .WebP
                                </button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { onMounted } from "vue";
import {
    Collapse,
    initTE,
} from "tw-elements";


onMounted(() => {
    initTE({ Collapse });
});

const stepcount = ref(1);

const form = useForm({
    name: '',
    qrcode_type: '',
    url: '',
    phone: '',
    email: '',
    subject: '',
    content: 'Text',
    enable_analytics: '',
    latitude: '',
    longitude: '',
    wifi_ssid: '',
    wifi_encryption: '',
    wifi_password: '',
    wifi_is_hidden: '',
    event: '',
    event_location: '',
    event_note: '',
    event_start_datetime: '',
    event_end_datetime: '',
    crypto_coin: '',
    crypto_address: '',
    crypto_amount: '',
    crypto_msg: '',
    vcard_first_name: '',
    vcard_last_name: '',
    vcard_phone: '',
    vcard_email: '',
    vcard_url: '',
    vcard_company: '',
    vcard_job_title: '',
    vcard_birthday: '',
    vcard_street: '',
    vcard_city: '',
    vcard_postal: '',
    vcard_region: '',
    vcard_country: '',
    vcard_note: '',
    paypal_link: '',
    upi_id: '',
    upi_payee_name: '',
    upi_currency: '',
    upi_amount: '',
    upi_msg: '',
    qrcode_style: 'square',
    color_style: 'color',
    color: '#000000',
    foreground_gradient_type: 'diagonal',
    primary_color: '#000000',
    secondary_color: '#000000',
    background_color: '',
    background_color_transparency: '',
    need_eye_color: 0,
    eye_color: '#000000',
    eyeColor_position: 0,
    eye_color_style: 'square',
    upload_logo: '',
    upload_logo_size: 0.1,
    size: '2000',
    qrcode_ecc: 'L',
});

function stepCountFunction() {
    if(form.qrcode_type != ''){
        stepcount.value += 1;
    } else {
        aler('Select Qr Code Type');
    }
}

function stepCountBackFunction() {
    if(form.qrcode_type != ''){
        stepcount.value -= 1;
    } else {
        aler('Select Qr Code Type');
    }
}

function qrCodeType(type) {
    form.qrcode_type = type;
}

</script>







