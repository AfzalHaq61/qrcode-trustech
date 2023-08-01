<template>
    <aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
          <div class="h-19.5">
            <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
            <div class="block px-8 m-0 text-sm whitespace-nowrap text-slate-700">
                <ApplicationLogo class="inline h-full max-w-full transition-all duration-200 ease-nav-brand font-bold max-h-8" />
            </div>
          </div>
         
        
         
          <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

          <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full" style="height:100%">
            <ul class="flex flex-col pl-0 mb-0">
              <li class="mt-0.5 w-full">
          
                <Link :class="{'bg-white shadow-soft-xl font-semibold rounded-lg' : route().current() == 'admin.dashboard'}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.dashboard')">
                  <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-themeColor
                   bg-center stroke-0 text-center xl:p-2.5">
                    <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>shop</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(0.000000, 148.000000)">
                              <path
                                class="opacity-60"
                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                              ></path>
                              <path
                                class=""
                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"
                              ></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <span class="ml-1 w-14 text-start duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                </Link>
              </li>

              <li class="mt-0.5 w-full">
                <Accordian :class="{'bg-white shadow-soft-xl font-semibold rounded-lg mr-3' : route().current() == 'admin.all.qr' || route().current() == 'admin.all.barcode'}" >
                    <template v-slot:nav>
                        <span class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors">
                            <div class="bg-themeColor shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-qrcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" fill="#fff" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="#fff"></path>
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <line x1="7" y1="17" x2="7" y2="17.01"></line>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <line x1="7" y1="7" x2="7" y2="7.01"></line>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <line x1="17" y1="7" x2="17" y2="7.01"></line>
                                    <line x1="14" y1="14" x2="17" y2="14"></line>
                                    <line x1="20" y1="14" x2="20" y2="14.01"></line>
                                    <line x1="14" y1="14" x2="14" y2="17"></line>
                                    <line x1="14" y1="20" x2="17" y2="20"></line>
                                    <line x1="17" y1="17" x2="20" y2="17"></line>
                                    <line x1="20" y1="17" x2="20" y2="20"></line>
                                </svg>
                            </div>
                            <span class="ml-1 w-14 text-start duration-1000 opacity-100 pointer-events-none ease-soft">Generate</span>
                        </span>
                    </template>
                    <template v-slot:subnav>
                        <div class="ml-11">
                            <div v-if="$page.props.APP_TYPE === 'QRCODE'">
                                <Link class="py-1 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.all.qr')">
                                    <span class="duration-300 opacity-100 pointer-events-none ease-soft">QR Codes</span>
                                </Link>
                            </div>

                            <div v-if="$page.props.APP_TYPE === 'BARCODE'">
                                <Link class="py-1 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.all.barcode')">
                                    <span class="duration-300 opacity-100 pointer-events-none ease-soft">Barcodes</span>
                                </Link>
                            </div>

                            <div v-if="$page.props.APP_TYPE === 'BOTH'">
                                <Link class="py-1 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.all.qr')">
                                    <span class="duration-300 opacity-100 pointer-events-none ease-soft">QR Codes</span>
                                </Link>
                                <Link class="py-1 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.all.barcode')">
                                    <span class="duration-300 opacity-100 pointer-events-none ease-soft">Barcodes</span>
                                </Link>
                            </div>
                        </div>
                    </template>
                </Accordian>
              </li>

              <li class="mt-0.5 w-full">
                <Accordian :class="{'bg-white shadow-soft-xl font-semibold rounded-lg' : route().current() == 'admin.index.plans' || route().current() == 'admin.add.plan'}" >
                    <template v-slot:nav>
                        <span class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors">
                            <div class="bg-themeColor shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-businessplan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="#fff"></path>
                                    <ellipse cx="16" cy="6" rx="5" ry="3"></ellipse>
                                    <path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                    <path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                    <path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                    <path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                                    <path d="M5 15v1m0 -8v1"></path>
                                </svg>
                            </div>
                            <span class="ml-1 w-14 text-start duration-300 opacity-100 pointer-events-none ease-soft">Plans</span>
                        </span>
                    </template>
                    <template v-slot:subnav>
                        <div class="ml-11">
                            <Link class="py-1 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.index.plans')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">All Plans</span>
                            </Link>
                            <Link class="py-1 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.add.plan')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">Add Plan</span>
                            </Link>
                        </div>
                    </template>
                </Accordian>
              </li>

              <li class="mt-0.5 w-full">
                <Link :class="{'bg-white shadow-soft-xl font-semibold rounded-lg' : route().current() == 'admin.users'}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.users')">
                  <div class="bg-themeColor shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="#fff"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                    </svg>
                  </div>
                  <span class="ml-1 w-14 text-start duration-300 opacity-100 pointer-events-none ease-soft">Users</span>
                </Link>
              </li>

              <li class="mt-0.5 w-full">
                <Link :class="{'bg-white shadow-soft-xl font-semibold rounded-lg' : route().current() == 'admin.payment.methods'}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.payment.methods')">
                  <div class="bg-themeColor shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-building-bank" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="#fff"></path>
                        <line x1="3" y1="21" x2="21" y2="21"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                        <polyline points="5 6 12 3 19 6"></polyline>
                        <line x1="4" y1="10" x2="4" y2="21"></line>
                        <line x1="20" y1="10" x2="20" y2="21"></line>
                        <line x1="8" y1="14" x2="8" y2="17"></line>
                        <line x1="12" y1="14" x2="12" y2="17"></line>
                        <line x1="16" y1="14" x2="16" y2="17"></line>
                    </svg>
                  </div>
                  <span class="ml-1 w-14 text-start duration-300 opacity-100 pointer-events-none ease-soft">Payment Methods</span>
                </Link>
              </li>

              <li class="mt-0.5 w-full">
                <Accordian :class="{'bg-white shadow-soft-xl font-semibold rounded-lg mr-3' : route().current() == 'admin.transactions' || route().current() == 'admin.offline.transactions'}">
                    <template v-slot:nav>
                        <span class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors">
                        <div class="bg-themeColor shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="#fff"></path>
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                                <path d="M12 17v1m0 -8v1"></path>
                            </svg>
                        </div>
                        <span class="ml-1 w-14 text-start duration-300 opacity-100 pointer-events-none ease-soft">Transactions</span>
                        </span>
                    </template>
                    <template v-slot:subnav>
                        <div class="ml-11">
                            <Link class="py-1 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.transactions')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">Transactions</span>
                            </Link>
                            <Link class="py-1 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.offline.transactions')">
                                <span class="duration-300 opacity-100 pointer-events-none ease-soft">Offline Transactions</span>
                            </Link>
                        </div>
                    </template>
                </Accordian>
              </li>

              <li class="mt-0.5 w-full">
                <Link :class="{'bg-white shadow-soft-xl font-semibold rounded-lg' : route().current() == 'admin.pages'}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.pages')">
                  <div class="bg-themeColor shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="#fff"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M19 18v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1"></path>
                        <path d="M3 14h3m4.5 0h3m4.5 0h3"></path>
                        <path d="M5 10v-5a2 2 0 0 1 2 -2h7l5 5v2"></path>
                    </svg>
                  </div>
                  <span class="ml-1 w-14 text-start duration-300 opacity-100 pointer-events-none ease-soft">Pages</span>
                </Link>
              </li>

              <li class="mt-0.5 w-full">
                <Link :class="{'bg-white shadow-soft-xl font-semibold rounded-lg' : route().current() == 'admin.settings.general_settings'}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" :href="route('admin.settings.general_settings')">
                  <div class="bg-themeColor shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="#fff"></path>
                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                        </path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                  </div>
                  <span class="ml-1 w-14 text-start duration-300 opacity-100 pointer-events-none ease-soft">Settings</span>
                </Link>
              </li>
            </ul>
          </div>
        </aside>
</template>
