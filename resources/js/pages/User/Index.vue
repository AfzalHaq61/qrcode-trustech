<template>
    <Head title="Dashboard" />
    <UserLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <ConfirmationModel ref="myChild"  :modalData="modalData"/>
            <!-- row 1 -->
            <div class="flex flex-wrap -mx-3">
                <!-- card1 -->
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans text-sm font-semibold leading-normal">CURRENT PLAN</p>
                                        <h5 class="mb-0 font-bold">
                                           
                                            <span
                                                class="text-sm leading-normal font-weight-bolder text-lime-500">Free Trial</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-lg bg-themeColor">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="leading-none text-lg relative top-2 text-white icon-tabler icon-tabler-businessplan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M16 6m-5 0a5 3 0 1 0 10 0a5 3 0 1 0 -10 0"></path>
                                                <path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                                <path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                                <path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                                <path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                                                <path d="M5 15v1m0 -8v1"></path>
                                            </svg>
                                        <!-- <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card2 -->
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans text-sm font-semibold leading-normal">QR CODES</p>
                                        <h5 class="mb-0 font-bold" v-if="$page.props.APP_TYPE == 'BOTH' || $page.props.APP_TYPE == 'QRCODE'">
                                            {{ qr_codes_count }}
                                            <span class="text-sm leading-normal font-weight-bolder text-lime-500"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-lg  bg-themeColor">
                                        <!-- <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="leading-none text-lg relative top-2 text-white icon-tabler icon-tabler-qrcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card3 -->
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans text-sm font-semibold leading-normal">BARCODES</p>
                                        <h5 class="mb-0 font-bold" v-if="$page.props.APP_TYPE == 'BOTH' || $page.props.APP_TYPE == 'BARCODE'">
                                            {{barcodes_count}}
                                            <span class="text-sm leading-normal text-red-600 font-weight-bolder"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-lg bg-themeColor">
                                        <!-- <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="leading-none text-lg relative top-2 text-white icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                            <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                            <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                            <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                            <path d="M5 11h1v2h-1z"></path>
                                            <path d="M10 11l0 2"></path>
                                            <path d="M14 11h1v2h-1z"></path>
                                            <path d="M19 11l0 2"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- card4 -->
                 <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans text-sm font-semibold leading-normal">Transactions</p>
                                        <h5 class="mb-0 font-bold">
                                           5
                                            <span
                                                class="text-sm leading-normal font-weight-bolder text-lime-500"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-lg bg-themeColor">
                                        <!-- <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="leading-none text-lg relative top-2 text-white icon-tabler icon-tabler-transfer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M20 10h-16l5.5 -6"></path>
                                            <path d="M4 14h16l-5.5 6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

             
            </div>
            
            <!--graph for Barcode and Qrcode-->
            <div class="flex flex-wrap mt-6 -mx-3">
                <div class="w-full max-w-full px-3 mt-0 lg:w-full lg:flex-none">
                    <div
                        class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                            <h6>Bar Code & QR Code OVerview
</h6>
                            <p class="text-sm leading-normal">
                                <i class="fa fa-arrow-up text-lime-500"></i>
                                <span class="font-semibold">4% more</span> in {{ getCurrentYear }}
                            </p>
                        </div>
                        <div class="flex-auto p-4">
                            <div>
                                <canvas id="chartBarQr" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


            <!--table start-->

            <div class="flex flex-wrap my-6 -mx-3">
                <div class="flex-none lg:w-2/4 max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex justify-between p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Recent 10 QR Codes</h6>
                            <Link :href="route('user.create.qr')">
                                <DashboardButton style="background-color: green;"><span><span class="text-lg">+ </span>Create QR Code</span></DashboardButton>
                            </Link>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                S.NO</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                NAME</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                 TYPE</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                CREATED ON</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                STATUS</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr v-for="(qrcode, index) in qr_codes.data" :key="qrcode.id">
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ index + 1 }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ qrcode.name }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{qrcode.type}}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                   {{formatDate(qrcode.created_at)}}
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span v-if="qrcode.status === 0"
                                                    class="bg-gradient-to-tl from-red-600 to-red-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Deactivated</span>
                                                <span v-else
                                                    class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Activated</span>
                                            </td>
                                            <td class="px-3 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <Menu as="div" class="relative inline-block text-left">
                                                    <div>
                                                    <MenuButton>
                                                        <span class="text-xs font-semibold leading-tight text-slate-400 mr-2">Actions</span>
                                                        <svg class="w-2 transition-all duration-200 transform" :class="{
                                                            'rotate-180': isOpen,
                                                            'rotate-0': !isOpen,
                                                        }" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 10" aria-hidden="true">
                                                                <path d="M15 1.2l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <ChevronDownIcon class="-mr-1 h-5 w-5 text-gray-400" aria-hidden="true" />
                                                    </MenuButton>
                                                    </div>

                                                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                                        <MenuItems class="absolute right-0 z-100 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                            <div class="py-1">
                                                                <MenuItem v-slot="{ active }">
                                                                <Link :href="route('user.qr.statistics', { id: qrcode.qr_code_id })" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Statistics</Link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <Link :href="route('user.download.qrcode', { id: qrcode.qr_code_id })" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Download QR</Link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <Link :href="route('user.edit.qr', { id: qrcode.qr_code_id })" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Edit</Link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }" @click="open = true">
                                                                <button @click="activateDeactivateQRCode(qrcode.qr_code_id)"  :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']"><span v-if="qrcode.status === 0">Activate</span><span v-else>Deactivate</span></button>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                             
                                                                <button  @click="deleteRecordQRCode(qrcode.qr_code_id)"   :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Delete</button>
                                                            </MenuItem>
                                                            </div>
                                                        </MenuItems>
                                                    </transition>
                                                </Menu>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- Pagination -->
            <Pagination :data="qr_codes"> </Pagination>

                </div>
                <div class="flex-none lg:w-2/4 max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex justify-between p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Recent 10 Barcodes</h6>
                            <Link :href="route('user.create.barcode')">
                                <DashboardButton style="background-color: green;"><span><span class="text-lg">+ </span>Create Barcode</span></DashboardButton>
                            </Link>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                S.NO</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                NAME</th>                                           
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                CREATED ON</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                STATUS</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(barcode, index) in bar_codes.data" :key="barcode.id">
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ index + 1 }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ barcode.name }}</p>
                                            </td>
                                            
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                   {{formatDate(barcode.created_at)}}
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span v-if="barcode.status === 0"
                                                    class="bg-gradient-to-tl from-red-600 to-red-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Deactivated</span>
                                                <span v-else
                                                    class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Activated</span>
                                            </td>
                                            <td class="px-3 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <Menu as="div" class="relative inline-block text-left">
                                                    <div>
                                                    <MenuButton>
                                                        <span class="text-xs font-semibold leading-tight text-slate-400 mr-2">Actions</span>
                                                        <svg class="w-2 transition-all duration-200 transform" :class="{
                                                            'rotate-180': isOpen,
                                                            'rotate-0': !isOpen,
                                                        }" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 10" aria-hidden="true">
                                                                <path d="M15 1.2l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <ChevronDownIcon class="-mr-1 h-5 w-5 text-gray-400" aria-hidden="true" />
                                                    </MenuButton>
                                                    </div>

                                                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                                        <MenuItems class="absolute right-0 z-100 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                            <div class="py-1">
                                                                <MenuItem v-slot="{ active }">
                                                                <Link :href="route('user.qr.statistics', { id: barcode.barcode_id })" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Statistics</Link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <Link :href="route('user.download.barcode', { id: barcode.barcode_id })" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Download Barcode</Link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <Link :href="route('user.edit.barcode', { id: barcode.barcode_id })" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Edit</Link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }" @click="open = true">
                                                                <button @click="activateDeactivateBarCode(barcode.barcode_id)"  :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']"><span v-if="barcode.status === 0">Activate</span><span v-else>Deactivate</span></button>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                             
                                                                <button  @click="deleteRecordBarCode(barcode.barcode_id)"   :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-xs font-semibold leading-tight text-slate-400']">Delete</button>
                                                            </MenuItem>
                                                            </div>
                                                        </MenuItems>
                                                    </transition>
                                                </Menu>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- Pagination -->
            <Pagination :data="bar_codes"> </Pagination>

                </div>
            </div>
           
            <!--table end-->

            
        <!-- Footer -->
        <Footer />
    </div>
</UserLayout></template>

<script setup>

import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { ref } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'

const open = ref(true)
const props = defineProps(['settings', 'active_plan', 'remaining_days', 'barcodes_count', 'qr_codes_count', 'qr_codes', 'bar_codes', 'settings', 'config', 'qrcode', 'barcode', 'getCurrentYear'])
const myChild = ref(null);
  const modalData = ref({
        title:'',
        desc:'',
        btnText:'Yes, proceed',
        link:''  
 });

 //active deactive QR Code
const activateDeactivateQRCode=((idd)=>{
    console.log('Child value');
    // console.log(myChild.value);
   myChild.value.childMethod();
    modalData.value = {
        ...modalData.value,
        title:'Are you sure?',
        desc:'If you proceed, you will active/deactivate this user data.',
        link:route('user.update.qr.status', { id: idd })
    } 
});

//active deactive Bar Code
const activateDeactivateBarCode=((idd)=>{
    console.log('Child value');
    // console.log(myChild.value);
   myChild.value.childMethod();
    modalData.value = {
        ...modalData.value,
        title:'Are you sure?',
        desc:'If you proceed, you will active/deactivate this user data.',
        link:route('user.update.barcode.status', { id: idd })
    } 
});

//delete record of QR Code
const deleteRecordQRCode=((idd)=>{
    
    myChild.value.childMethod();
    modalData.value = {
        ...modalData.value,
        title:'WARNING!',
        desc:'This action will remove user account and user data. It is not revertable action.',
       
        link: route('user.delete.qr', { id:idd })
    } 
    
});

//delete record of Bar Code
const deleteRecordBarCode=((idd)=>{
    
    myChild.value.childMethod();
    modalData.value = {
        ...modalData.value,
        title:'WARNING!',
        desc:'This action will remove user account and user data. It is not revertable action.',
       
        link: route('user.delete.barcode', { id:idd })
    } 
    
});

// const props = defineProps({
//     qr_codes: Object,
//     settings: Object,
// });


</script>

<script>
import Chart from 'chart.js/auto';
import ConfirmationModel from '../../Components/Modals/Modal.vue';

export default {
   
    components:{Menu, MenuButton, MenuItem, MenuItems},
    props:['qrcode', 'barcode', 'getCurrentYear'],
    mounted(){
          
        this.barqrCode();
    },
 
    methods:{
                //chart for barcode and qrcode
            barqrCode(){

        var ctx2 = document.getElementById("chartBarQr").getContext("2d");
        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
        gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
        gradientStroke1.addColorStop(0, "rgba(203,12,159,0)"); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
        gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
        gradientStroke2.addColorStop(0, "rgba(20,23,39,0)"); //purple colors

        new Chart(ctx2, {
        type: "line",
        data: {
        labels: ["Jan", "Feb", "March", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
        {
        label: "Barcode",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#cb0c9f",
        borderWidth: 3,
        backgroundColor: gradientStroke1,
        fill: true,
        data: this.barcode,
        maxBarThickness: 6,
        },
        {
        label: "Qrcode",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#3A416F",
        borderWidth: 3,
        backgroundColor: gradientStroke2,
        fill: true,
        data: this.qrcode,
        maxBarThickness: 6,
        },
        ],
        },
        options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
        legend: {
        display: false,
        },
        },
        interaction: {
        intersect: false,
        mode: "index",
        },
        scales: {
        y: {
        grid: {
        drawBorder: false,
        display: true,
        drawOnChartArea: true,
        drawTicks: false,
        borderDash: [5, 5],
        },
        ticks: {
        display: true,
        padding: 10,
        color: "#b2b9bf",
        font: {
            size: 11,
            family: "Open Sans",
            style: "normal",
            lineHeight: 2,
        },
        },
        },
        x: {
        grid: {
        drawBorder: false,
        display: false,
        drawOnChartArea: false,
        drawTicks: false,
        borderDash: [5, 5],
        },
        ticks: {
        display: true,
        color: "#b2b9bf",
        padding: 20,
        font: {
            size: 11,
            family: "Open Sans",
            style: "normal",
            lineHeight: 2,
        },
        },
        },
        },
        },
        });


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
    },
}
</script>
