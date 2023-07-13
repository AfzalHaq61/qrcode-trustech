<template>
<Head title="User Index" />
<UserLayout>
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <!-- Success Messege -->
        <Notifications />

        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white h-48">
                <h6 class="text-sm font-bold dark:text-white px-2 py-2">Upgrade/Renewel Plan</h6>

                <table class="border-separate w-5/6 ml-2  ...">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="text-left text-sm">Description</th>
                            <th class="text-left text-sm">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="">3 Months - 90 Days</td>
                            <td class="">$90</td>
                        </tr>
                        <tr>
                            <td class="">Goods and Service Tax</td>
                            <td class="">$16.2</td>
                        </tr>
                        <tr>
                            <td class="font-bold text-sm">Total Payable</td>
                            <td class="font-bold text-sm">$105.20</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-span-2 bg-white">
                <h6 class="text-sm  dark:text-white px-2 py-2">Billing Details</h6>

                <form role="form"  method="POST">

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3 ml-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Full Name<span class="text-red-600">*</span></Label>
                            <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />

                        </div>
                        <div class="sm:col-span-3 mr-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Email<span class="text-red-600">*</span></Label>
                            <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-6 ml-2 mr-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Address<span class="text-red-600">*</span></Label>
                            <textarea id="message" rows="2" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"></textarea>

                        </div>

                    </div>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3 ml-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Phone<span class="text-red-600">*</span></Label>
                            <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />

                        </div>
                        <div class="sm:col-span-3 mr-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">City<span class="text-red-600">*</span></Label>
                            <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3 ml-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Billing State/Province<span class="text-red-600">*</span></Label>
                            <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />

                        </div>
                        <div class="sm:col-span-3 mr-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Postal Code<span class="text-red-600">*</span></Label>
                            <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mb-2">
                        <div class="sm:col-span-3 ml-2">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Code<span class="text-red-600">*</span></Label>
                            <input class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />

                        </div>

                    </div>

                </form>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="col-start-2 col-span-2 bg-white mt-8 h-48">

                <h6 class="text-sm  dark:text-white px-2 py-2">Payment Method</h6>
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-start-1 col-span-3 px-2">
                        <div class="flex gap-1 p-7 w-full  border border-gray-300 rounded">
                            <div class="flex items-center">
                                <input id="country-option-1" type="radio" name="countries" value="USA" class="h-4 w-4 mr-2 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="country-option-1" aria-describedby="country-option-1">
                            </div>

                            <img :src='"/img/payments/visacard.png"' class="w-8 h-3 mt-1 object-cover" />
                            <img :src='"/img/payments/master.png"' class="w-8 h-4 mt-1 object-cover rounded-full" />
                            <img :src='"/img/payments/american.png"' class="w-8 h-4 mt-1 object-cover" />
                            <span class="text-xs mt-1 font-bold">Credit / Debit Card</span>
                        </div>
                        <a :href="route('user.payment.stripe',1)" class="mt-5 inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Continue For Payment</a>
                        <!-- <PrimaryButton class="mt-5" ></PrimaryButton> -->

                    </div>
                    <div class="col-end-7 col-span-2">
                        <div class="flex gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                                <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                                <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                            </svg>
                            <span class="text-sm">SECURE PAYMENT</span>
                        </div>
                        <p class="text-sm mb-0">Accepted payment methods</p>
                        <div class="flex gap-1 ml-6">
                            <img :src='"/img/payments/visacard.png"' class="w-8 h-3 mt-1 object-cover" />
                            <img :src='"/img/payments/master.png"' class="w-8 h-4 mt-1 object-cover rounded-full" />
                            <img :src='"/img/payments/american.png"' class="w-8 h-4 mt-1 object-cover" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="flex flex-wrap mx-3 py-5">

        </div>
    </div>
</UserLayout>
</template>


<script setup>

   

 </script>

<style scoped>

 </style>
