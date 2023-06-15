<template>
    <Head title="Page Edit" />
    <AdminLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <!-- Success Messege -->
            <Notifications />

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Edit Page</h6>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-6 overflow-x-auto">
                                <form @submit.prevent="submit" role="form">
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-10">
                                        <div v-for="(section, index) in sections" :key="section.id">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700"
                                                for="plan_description">{{ section.title }}
                                                <span class="text-red-600">*</span></Label>
                                            <textarea
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                :name="'section'+index" :id="'section' + index" v-model="form[`section${index}`]"
                                                autofocus :placeholder="section.title" cols="10" rows="5" required></textarea>

                                            <InputError class="mt-2" :message="form.errors.plan_description" />
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing">
                                            save
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
import { useForm } from '@inertiajs/vue3';
import { onMounted, ref} from 'vue';

const props = defineProps({
    slug: String,
    sections: Object,
    settings: Object,
    config: Object
});

const fields = ref({});

// Add fields from sections to the myRef object
for (const key in props.sections) {
    if (Object.prototype.hasOwnProperty.call(props.sections, key)) {
        fields.value['section'+key] = props.sections[key].body;
    }
}

const form = useForm(fields.value);

const submit = () => {
    form.post(route('admin.update.page', {slug: props.slug }));
};
</script>
