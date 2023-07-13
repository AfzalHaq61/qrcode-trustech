<template>
<Head title="User Index" />
<UserLayout>
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <!-- Success Messege -->
        <Notifications />

        <div class="grid grid-cols-3 gap-4">

            <div class="col-span-2">
                <h6 class="text-sm  dark:text-white  py-2">3 Months</h6>

                <div class="container p-0">
                    <!-- Card -->
                    <div class="h-50 w-full rounded-lg bg-white">
                        <!-- Header -->
                        <div class="flex items-center justify-between border-b">
                            <div class="p-3 text-gray-600 text-sm font-bold">Please Enter Your Credit Card Information</div>

                        </div>
                        <div class="p-3 text-lg text-gray-600">

                            <form role="form" method="POST">

                                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                    <div class="sm:col-span-6 ml-2 mr-2">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Name<span class="text-red-600">*</span></Label>
                                        <input placeholder="Name on the Card" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />
                                    </div>
                                    <div class="sm:col-span-6 ml-2 mr-2">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Card Detail<span class="text-red-600">*</span></Label>
                                        <input placeholder="Card Detail" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow" />
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="p-3 border-t text-lg text-gray-600">
                            <PrimaryButton>Pay Now</PrimaryButton>
                        </div>
                    </div>
                </div>

                <!-- <form role="form"  method="POST">

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

                    </form> -->
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
