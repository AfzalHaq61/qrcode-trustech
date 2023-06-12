<script>
import { ref } from 'vue';

export default {
    props: {
        Buttontext: {
            type: String,
            required: true,
        },
    },
    setup() {
        const showModal = ref(false);

        const openModal = () => {
            showModal.value = true;
        };

        const closeModal = () => {
            showModal.value = false;
        };

        const proceed = () => {
            // Perform the desired action when the user clicks "Yes, proceed"
            console.log('Proceed with deletion');
        };

        return {
            showModal,
            openModal,
            closeModal,
            proceed,
        };
    },
};
</script>

<template>
    <div>
        <!-- Button to open the modal -->
        <button @click="openModal" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            {{ Buttontext }}
        </button>

        <!-- Modal component -->
        <div v-if="showModal" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="text-danger text-lg font-bold mb-4">WARNING!</div>
                <div class="mb-4">This action will remove user account and user data. It is not reversible.</div>
                <div class="flex justify-end">
                    <button @click="closeModal"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded mr-2">
                        Cancel
                    </button>
                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" @click="proceed">
                        Yes, proceed
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
