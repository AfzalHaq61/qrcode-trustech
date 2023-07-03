<template>
    <Head title="Pages Index" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">

            <!-- Success Messege -->
            <Notifications />

            <!-- Static pages table -->
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Static Pages</h6>
                        </div>
                        <div class="px-6 pb-0 mb-0 text-sm bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <p>Note : Static pages are doesn't have HTML editor. You can able to change the contents only.</p>
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
                                                PAGE</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                SLUG</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                STATUS</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(page, index) in pages.data" :key="page.id">
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ index + 1 }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ page.name }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight text-blue-600 dark:text-blue-500">
                                                    <span v-if="page.slug == 'home'">
                                                        <Link :href="$page.props.appUrl">
                                                            <span v-if="page.slug === '/'">/</span>
                                                            <span v-else>/{{ page.slug }}</span>
                                                        </Link>
                                                    </span>
                                                    <span v-else>
                                                        <Link :href="$page.props.appUrl+page.slug">
                                                            <span v-if="page.slug === '/'">/</span>
                                                            <span v-else>/{{ page.slug }}</span>
                                                        </Link>
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span v-if="page.status === 0"
                                                    class="bg-gradient-to-tl from-red-600 to-red-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Discontinued</span>
                                                <span v-else
                                                    class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Active</span>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <Link
                                                    :href="route('admin.edit.page', { slug: page.slug })"
                                                    class="text-xs font-semibold leading-tight text-slate-400 mr-2">Edit
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <Pagination :data="pages"> </Pagination>

            <!-- Custom pages table -->

            <div class="flex flex-wrap -mx-3 mt-10">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex items-center justify-between p-6 pb-0 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Custom Pages</h6>
                            <Link :href="route('admin.add.page')">
                                <PrimaryButton>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    <span class="ml-1">Add New Page</span>
                                </PrimaryButton>
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
                                                PAGE</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                SLUG</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                STATUS</th>
                                            <th
                                                class="px-3 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(custom_page, index) in custom_pages.data" :key="custom_page.id">
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ index + 1 }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ custom_page.name }}</p>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight text-blue-600 dark:text-blue-500 hover:underline">
                                                    <span v-if="custom_page.slug == 'home'">
                                                        <Link :href="$page.props.appUrl">
                                                            <span v-if="custom_page.slug === '/'">/</span>
                                                            <span v-else>/{{ custom_page.slug }}</span>
                                                        </Link>
                                                    </span>
                                                    <span v-else>
                                                        <Link :href="$page.props.appUrl + custom_page.slug">
                                                            <span v-if="custom_page.slug === '/'">/</span>
                                                            <span v-else>/{{ custom_page.slug }}</span>
                                                        </Link>
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span v-if="custom_page.status === 0"
                                                    class="bg-gradient-to-tl from-red-600 to-red-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Discontinued</span>
                                                <span v-else
                                                    class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Active</span>
                                            </td>
                                            <td
                                                class="px-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <Link
                                                    :href="route('admin.edit.custom.page', { id: custom_page.id })"
                                                    class="text-xs font-semibold leading-tight text-slate-400 mr-2">Edit
                                                </Link>
                                                <Link
                                                    :href="route('admin.status.page', { id: custom_page.id })"
                                                    class="text-xs font-semibold leading-tight text-slate-400 mr-2"><span v-if="custom_page.status === 0">Enable</span><span v-else>Disable</span>
                                                </Link>
                                                <Link
                                                    :href="route('admin.delete.page', { id: custom_page.id })"
                                                    class="text-xs font-semibold leading-tight text-slate-400 mr-2">Delete
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <Pagination :data="custom_pages"> </Pagination>
        </div>
    </AdminLayout>
</template>


<script setup>
import { ref } from 'vue'
const props = defineProps({
    pages: Object,
    custom_pages: Object,
    settings: Object,
    currencies: Object,
});

</script>

<script>
export default {
    methods: {
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

        currencySymbol(transaction_currency) {
            var symbol = '';
            this.currencies.forEach(currency => {
                if (transaction_currency == currency.iso_code) {
                    symbol = currency.symbol;
                }
            });

            return symbol;
        },
    }
}

</script>
