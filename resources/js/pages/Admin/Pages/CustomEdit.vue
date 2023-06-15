<template>
    <Head title="Plan Edit" />
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
                            <h6>Add Page</h6>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-6 overflow-x-auto">
                                <form @submit.prevent="submit" role="form">
                                    <div class="md:grid grid-cols-2 md:gap-x-6 mt-10">
                                        <div class="mb-6 md:mb-0">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="title">Title
                                                <span class="text-red-600">*</span></Label>
                                            <TextInput id="title" type="text" v-model="form.title" autofocus
                                                placeholder="Title..." />

                                            <InputError class="mt-2" :message="form.errors.title" />
                                        </div>
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="slug">Slug
                                                <span class="text-red-600">*</span></Label>
                                            <TextInput id="slug" type="text" v-model="form.slug" autofocus
                                                placeholder="Slug..." />

                                            <InputError class="mt-2" :message="form.errors.slug" />
                                        </div>
                                    </div>

                                    <div class="grid gap-y-6 mt-10">
                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="body">Body
                                                <span class="text-red-600">*</span></Label>
                                            <editor v-model="form.body" :init="init"></editor>

                                            <InputError class="mt-2" :message="form.errors.body" />
                                        </div>

                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700"
                                                for="meta_keywords">Meta Keywords
                                                <span class="text-red-600">*</span></Label>
                                            <TextInput id="meta_keywords" type="text" v-model="form.meta_keywords" autofocus
                                                placeholder="Meta Keywords..." />

                                            <InputError class="mt-2" :message="form.errors.meta_keywords" />
                                        </div>

                                        <div>
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700"
                                                for="meta_description">Meta Description
                                                <span class="text-red-600">*</span></Label>
                                            <textarea
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                name="meta_description" id="meta_description"
                                                v-model="form.meta_description" autofocus placeholder="Meta Description..."
                                                cols="10" rows="5"></textarea>

                                            <InputError class="mt-2" :message="form.errors.meta_description" />
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing">
                                            Update
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
import { reactive, ref, watch } from 'vue';

// TinyMCE-Vue
import Editor from '@tinymce/tinymce-vue';

const props = defineProps({
    page: Object,
    settings: Object,
    config: Object,
});

const form = useForm({
    page_id: props.page.id,
    name: props.page.name,
    title: props.page.title,
    slug: props.page.slug,
    body: props.page.body,
    meta_keywords: props.page.meta_keywords,
    meta_description: props.page.meta_description,
});

watch(() => form.title, (newTitle) => {
    // Generate slug from the new title
    const newSlug = generateSlug(newTitle);

    // Update the slug field in the form
    form.slug = newSlug;
});

// Function to generate a slug from the title
function generateSlug(title) {
    // Implement your slug generation logic here
    // For example, you can use a library like slugify
    // Here's a simple example using a regular expression to replace spaces with hyphens
    return title.toLowerCase().replace(/\s+/g, '-');
}

const submit = () => {
    form.post(route('admin.update.custom.page', { id: props.page.id }));
};
</script>
