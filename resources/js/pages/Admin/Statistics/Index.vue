<template>
    <Head title="QR Codes Index" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex items-center justify-between p-6 pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Statistics</h6>
                        </div>
                        <div class="grid md:grid-cols-2 gap-6 p-6">
                            <!-- Countries -->
                            <div>
                                <div class="flex mb-2">
                                    <div class="card-stamp-icon bg-green">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-flag"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="5" y1="5" x2="5" y2="21"></line>
                                            <line x1="19" y1="5" x2="19" y2="14"></line>
                                            <path d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0"></path>
                                            <path d="M5 14a5 5 0 0 1 7 0a5 5 0 0 0 7 0"></path>
                                        </svg>
                                    </div>
                                    <span class="font-bold text-slate-700 mt-1 ml-1">Countries</span>
                                </div>
                                <div v-for="country in countries" :key="country.id">
                                    <div class="flex justify-between mb-1">
                                        <span class="mb-1 block font-bold text-xs text-slate-700 flag flag-country-{{ country.isoCode.toLowerCase() }}">{{ country.country_code }}</span>
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ Math.round(100 / countries.length) }}%</span>
                                    </div>
                                    <div class="mb-6 h-5 border-2 rounded-md shadow-md w-full bg-neutral-200 dark:bg-neutral-600">
                                        <div class="h-4 rounded-md shadow-md bg-gradient-to-tl from-fuchsia-700 to-fuchsia-400" :style="{ width: `${100 / countries.length}%` }" :aria-valuenow="country.total" aria-valuemin="0" aria-valuemax="100" :aria-label="`${100 / country.total}%`" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cities -->
                            <div>
                                <div class="flex mb-2">
                                    <div class="card-stamp-icon bg-green">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-flag"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="5" y1="5" x2="5" y2="21"></line>
                                            <line x1="19" y1="5" x2="19" y2="14"></line>
                                            <path d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0"></path>
                                            <path d="M5 14a5 5 0 0 1 7 0a5 5 0 0 0 7 0"></path>
                                        </svg>
                                    </div>
                                    <span class="font-bold text-slate-700 mt-1 ml-1">Cities</span>
                                </div>
                                <div v-for="city in cities" :key="city.id">
                                    <div class="flex justify-between mb-1">
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ city.city_name }}</span>
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ Math.round(100 / cities.length) }}%</span>
                                    </div>
                                    <div class="mb-6 h-5 border-2 rounded-md shadow-md w-full bg-neutral-200 dark:bg-neutral-600">
                                        <div class="h-4 rounded-md shadow-md bg-gradient-to-tl from-fuchsia-700 to-fuchsia-400" :style="{ width: `${100 / cities.length}%` }" :aria-valuenow="city.total" aria-valuemin="0" aria-valuemax="100" :aria-label="`${100 / city.total}%`" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Devices -->
                            <div>
                                <div class="flex">
                                    <div class="card-stamp-icon bg-green">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-android" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="10" x2="4" y2="16"></line>
                                            <line x1="20" y1="10" x2="20" y2="16"></line>
                                            <path d="M7 9h10v8a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-8a5 5 0 0 1 10 0"></path>
                                            <line x1="8" y1="3" x2="9" y2="5"></line>
                                            <line x1="16" y1="3" x2="15" y2="5"></line>
                                            <line x1="9" y1="18" x2="9" y2="21"></line>
                                            <line x1="15" y1="18" x2="15" y2="21"></line>
                                        </svg>
                                    </div>
                                    <span class="font-bold text-slate-700 mt-1 ml-1">Devices</span>
                                </div>
                                <div v-for="device_type in device_types" :key="device_type.id">
                                    <div class="flex justify-between mb-1">
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ device_type.device_type }}</span>
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ Math.round(100 / device_types.length) }}%</span>
                                    </div>
                                    <div class="mb-6 h-5 border-2 rounded-md shadow-md w-full bg-neutral-200 dark:bg-neutral-600">
                                        <div class="h-4 rounded-md shadow-md bg-gradient-to-tl from-fuchsia-700 to-fuchsia-400" :style="{ width: `${100 / device_types.length}%` }" :aria-valuenow="device_type.total" aria-valuemin="0" aria-valuemax="100" :aria-label="`${100 / device_type.total}%`" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Operating Systems -->
                            <div>
                                <div class="flex">
                                    <div class="card-stamp-icon bg-green">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-windows" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M17.8 20l-12 -1.5c-1 -.1 -1.8 -.9 -1.8 -1.9v-9.2c0 -1 .8 -1.8 1.8 -1.9l12 -1.5c1.2 -.1 2.2 .8 2.2 1.9v12.1c0 1.2 -1.1 2.1 -2.2 1.9z">
                                            </path>
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="4" y1="12" x2="20" y2="12"></line>
                                        </svg>
                                    </div>
                                    <span class="font-bold text-slate-700 mt-1 ml-1">Operating Systems</span>
                                </div>
                                <div v-for="os_name in os_names" :key="os_name.id">
                                    <div class="flex justify-between mb-1">
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ os_name.os_name }}</span>
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ Math.round(100 / os_names.length) }}%</span>
                                    </div>
                                    <div class="mb-6 h-5 border-2 rounded-md shadow-md w-full bg-neutral-200 dark:bg-neutral-600">
                                        <div class="h-4 rounded-md shadow-md bg-gradient-to-tl from-fuchsia-700 to-fuchsia-400" :style="{ width: `${100 / os_names.length}%` }" :aria-valuenow="os_name.total" aria-valuemin="0" aria-valuemax="100" :aria-label="`${100 / os_name.total}%`" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Browsers -->
                            <div>
                                <div class="flex">
                                    <div class="card-stamp-icon bg-green">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-chrome" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <line x1="12" y1="9" x2="20.4" y2="9"></line>
                                            <line x1="12" y1="9" x2="20.4" y2="9"
                                                transform="rotate(120 12 12)"></line>
                                            <line x1="12" y1="9" x2="20.4" y2="9"
                                                transform="rotate(240 12 12)"></line>
                                        </svg>
                                    </div>
                                    <span class="font-bold text-slate-700 mt-1 ml-1">Browsers</span>
                                </div>
                                <div v-for="browser_name in browser_names" :key="browser_name.id">
                                    <div class="flex justify-between mb-1">
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ browser_name.browser_name }}</span>
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ Math.round(100 / browser_names.length) }}%</span>
                                    </div>
                                    <div class="mb-6 h-5 border-2 rounded-md shadow-md w-full bg-neutral-200 dark:bg-neutral-600">
                                        <div class="h-4 rounded-md shadow-md bg-gradient-to-tl from-fuchsia-700 to-fuchsia-400" :style="{ width: `${100 / browser_names.length}%` }" :aria-valuenow="browser_name.total" aria-valuemin="0" aria-valuemax="100" :aria-label="`${100 / browser_name.total}%`" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Languages -->
                            <div>
                                <div class="flex">
                                    <div class="card-stamp-icon bg-green">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-language"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 5h7"></path>
                                            <path d="M9 3v2c0 4.418 -2.239 8 -5 8"></path>
                                            <path d="M5 9c-.003 2.144 2.952 3.908 6.7 4"></path>
                                            <path d="M12 20l4 -9l4 9"></path>
                                            <path d="M19.1 18h-6.2"></path>
                                        </svg>
                                    </div>
                                    <span class="font-bold text-slate-700 mt-1 ml-1">Languages</span>
                                </div>
                                <div v-for="browser_language in browser_languages" :key="browser_language.id">
                                    <div class="flex justify-between mb-1">
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ browser_language.browser_language }}</span>
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ Math.round(100 / browser_languages.length) }}%</span>
                                    </div>
                                    <div class="mb-6 h-5 border-2 rounded-md shadow-md w-full bg-neutral-200 dark:bg-neutral-600">
                                        <div class="h-4 rounded-md shadow-md bg-gradient-to-tl from-fuchsia-700 to-fuchsia-400" :style="{ width: `${100 / browser_languages.length}%` }" :aria-valuenow="browser_language.total" aria-valuemin="0" aria-valuemax="100" :aria-label="`${100 / browser_language.total}%`" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Count -->
                            <div>
                                <div class="flex">
                                    <div class="card-stamp-icon bg-green">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-android" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="10" x2="4" y2="16"></line>
                                            <line x1="20" y1="10" x2="20" y2="16"></line>
                                            <path d="M7 9h10v8a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-8a5 5 0 0 1 10 0"></path>
                                            <line x1="8" y1="3" x2="9" y2="5"></line>
                                            <line x1="16" y1="3" x2="15" y2="5"></line>
                                            <line x1="9" y1="18" x2="9" y2="21"></line>
                                            <line x1="15" y1="18" x2="15" y2="21"></line>
                                        </svg>
                                    </div>
                                    <span class="font-bold text-slate-700 mt-1 ml-1">Scanning Count</span>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ count }}</span>
                                        <span class="mb-1 block font-bold text-xs text-slate-700">{{ count }}%</span>
                                    </div>
                                    <div class="mb-6 h-5 border-2 rounded-md shadow-md w-full bg-neutral-200 dark:bg-neutral-600">
                                        <div class="h-4 rounded-md shadow-md bg-gradient-to-tl from-fuchsia-700 to-fuchsia-400" :style="{ width: `${ count }%` }" :aria-valuenow="count" aria-valuemin="0" aria-valuemax="100" :aria-label="`${count}%`" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>

const props = defineProps({
    countries: Object,
    cities: Object,
    device_types: Object,
    os_names: Object,
    browser_names: Object,
    browser_languages: Object,
    count: Object
});

</script>
