<template>
    <Head title="DNS Lookup" />
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
                            <h6>DNS Lookup</h6>
                        </div>
                        <div class="p-6 flex-auto">
                            <form @submit.prevent="submit" role="form">
                                <div class="overflow-x-auto mb-5 p-0.5">
                                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Size">Domain <span class="text-red-600">*</span></Label>
                                    <input
                                        type="text"
                                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-themeColor focus:outline-none focus:transition-shadow"
                                        v-model="form.domain"
                                        name="domain"
                                        id="domain"
                                        placeholder="Eg: https://domain.com ..."
                                        ref="input"
                                        required
                                    />
                                </div>

                                <div class="flex">
                                    <div class="flex items-center justify-start mr-2">
                                        <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing">
                                            <span class="mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                    <path d="M21 21l-6 -6"></path>
                                                </svg>
                                            </span>
                                            Search
                                        </PrimaryButton>
                                    </div>

                                    <div>
                                        <BackButton class="inline-block px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-gray-700 to-gray-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85" :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing">
                                            <span class="ml-1"><a :href="route('user.dns-lookup')">Reset</a></span>
                                        </BackButton>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </UserLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    breadcrumbs: Object
});

const form = useForm({
    domain: '',
});

const submit = () => {
    form.post(route('user.result.dns-lookup'));
};

</script>
