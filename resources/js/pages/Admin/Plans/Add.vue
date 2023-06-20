<template>
    <Head title="Plan Edit" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />


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





            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Plan Details</h6>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-6 overflow-x-auto">
                                <form @submit.prevent="submit" role="form">
                                    <div class="grid grid-cols-12 mt-10">
                                        <div class="col-span-2 mt-1.5">
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="recommended">Recommended</Label>
                                            <div class="ml-12">
                                                <Checkbox name="recommended" v-model:checked="form.recommended" />
                                            </div>
                                        </div>

                                        <div class="col-span-10">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="plan_name">Plan Name
                                                <span class="text-red-600">*</span></Label>
                                            <TextInput id="plan_name" type="text" v-model="form.plan_name" autofocus
                                                autocomplete="username" placeholder="Plan Name..." />

                                            <InputError class="mt-2" :message="form.errors.plan_name" />
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="plan_description">Description
                                            <span class="text-red-600">*</span></Label>
                                        <textarea class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                        name="plan_description" id="plan_description" v-model="form.plan_description" autofocus placeholder="Plan Description..." cols="10" rows="5"></textarea>

                                        <InputError class="mt-2" :message="form.errors.plan_description" />
                                    </div>

                                    <div
                                        class="mt-10 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                        <h6>Plan Prices</h6>
                                    </div>

                                    <div class="grid grid-cols-2 gap-x-6">
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="plan_price">Price <span class="text-gray-600">(For free: 0)</span> <span class="text-red-600">*</span></Label>
                                            <TextInput id="plan_price" type="number" v-model="form.plan_price" autofocus
                                                    placeholder="Plan Name..." />

                                            <InputError class="mt-2" :message="form.errors.plan_price" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="validity">Validity <span class="text-gray-600">(Enter no. of days) (For forever: 9999)</span> <span class="text-red-600">*</span></Label>
                                            <TextInput id="validity" type="number" v-model="form.validity" autofocus
                                                    placeholder="Validity..." />
                                            <span class="mb-2 ml-1 font-bold text-xs text-slate-700">Please enter validy in multiple of months</span>

                                            <InputError class="mt-2" :message="form.errors.validity" />
                                        </div>
                                    </div>

                                    <div
                                        class="mt-10 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                        <h6>Plan Features</h6>
                                    </div>

                                    <div class="grid grid-cols-3 gap-x-6 mt-5">
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">QR Code Types <span class="text-red-600">*</span></Label>
                                            <TextInput id="no_access_qr" type="number" v-model="form.no_access_qr" autofocus
                                                    placeholder="QR Code Types..." />

                                            <InputError class="mt-2" :message="form.errors.no_access_qr" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">No. Of QR Codes <span class="text-gray-600">(For unlimited: 999)</span> <span class="text-red-600">*</span></Label>
                                            <TextInput id="no_qrcodes" type="number" v-model="form.no_qrcodes" autofocus
                                                    placeholder="No. Of QR Codes..." />

                                            <InputError class="mt-2" :message="form.errors.no_qrcodes" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="no_barcodes">No. Of Barcodes <span class="text-gray-600">((For unlimited: 999))</span> <span class="text-red-600">*</span></Label>
                                            <TextInput id="no_barcodes" type="number" v-model="form.no_barcodes" autofocus
                                                    placeholder="No. Of Barcodes..." />

                                            <InputError class="mt-2" :message="form.errors.no_barcodes" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-4 gap-x-6 gap-y-6 mt-5">
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="text">Text</Label>
                                            <div class="ml-12">
                                                <Checkbox name="text" v-model:checked="form.text" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="url">URL</Label>
                                            <div class="ml-12">
                                                <Checkbox name="url" v-model:checked="form.url" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="phone">Phone</Label>
                                            <div class="ml-12">
                                                <Checkbox name="phone" v-model:checked="form.phone" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="sms">SMS</Label>
                                            <div class="ml-12">
                                                <Checkbox name="sms" v-model:checked="form.sms" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="email">Email</Label>
                                            <div class="ml-12">
                                                <Checkbox name="email" v-model:checked="form.email" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="whatsapp">WhatsApp</Label>
                                            <div class="ml-12">
                                                <Checkbox name="whatsapp" v-model:checked="form.whatsapp" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="facetime">Facetime</Label>
                                            <div class="ml-12">
                                                <Checkbox name="facetime" v-model:checked="form.facetime" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="location">Location</Label>
                                            <div class="ml-12">
                                                <Checkbox name="location" v-model:checked="form.location" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="wifi">Wifi</Label>
                                            <div class="ml-12">
                                                <Checkbox name="wifi" v-model:checked="form.wifi" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="event">Event</Label>
                                            <div class="ml-12">
                                                <Checkbox name="event" v-model:checked="form.event" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="crypto">Crypto</Label>
                                            <div class="ml-12">
                                                <Checkbox name="crypto" v-model:checked="form.crypto" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="vcard">vCard</Label>
                                            <div class="ml-12">
                                                <Checkbox name="vcard" v-model:checked="form.vcard" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="paypal">Paypal</Label>
                                            <div class="ml-12">
                                                <Checkbox name="paypal" v-model:checked="form.paypal" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="upi">UPI</Label>
                                            <div class="ml-12">
                                                <Checkbox name="upi" v-model:checked="form.upi" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="additional_tools">Additional Tools</Label>
                                            <div class="ml-12">
                                                <Checkbox name="additional_tools" v-model:checked="form.additional_tools" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="enable_analaytics">Enable Analytics</Label>
                                            <div class="ml-12">
                                                <Checkbox name="enable_analaytics" v-model:checked="form.enable_analaytics" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="hide_branding">Hide Branding</Label>
                                            <div class="ml-12">
                                                <Checkbox name="hide_branding" v-model:checked="form.hide_branding" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label class="block mb-2 font-bold text-xs text-slate-700" for="support">Support</Label>
                                            <div class="ml-12">
                                                <Checkbox name="support" v-model:checked="form.support" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing">
                                            Add
                                        </PrimaryButton>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { onMounted } from "vue";
import {
  Collapse,
  initTE,
} from "tw-elements";


    onMounted(() => {
        initTE({ Collapse });
    });

const props = defineProps({
    settings: Object,
    config: Object
});

const form = useForm({
    plan_name: '',
    plan_description: '',
    plan_price: '',
    validity: '',
    no_access_qr: '',
    no_qrcodes: '',
    no_barcodes: '',
    text: false,
    url: false,
    phone: false,
    sms: false,
    email: false,
    whatsapp: false,
    facetime: false,
    location: false,
    wifi: false,
    event: false,
    crypto: false,
    vcard: false,
    paypal: false,
    upi: false,
    additional_tools: false,
    enable_analaytics: false,
    hide_branding: false,
    free_setup: false,
    support: false,
    recommended: false
});

const submit = () => {
    form.post(route('admin.save.plan'));
};
</script>
