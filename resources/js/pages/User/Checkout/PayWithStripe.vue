<template>
<Head title="User Index" />
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
                        <h6>Check out</h6>
                    </div>
                    <div class="p-6 flex-auto">
                        <div class="overflow-x-auto mb-5 p-0.5">
                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="New Password">Card Details<span class="text-red-600"> *</span></Label>
                            <!-- Stripe Element-->
                            <div class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                                <StripeElement :element="cardElement" @change="event = $event" />
                            </div>
                            <div v-if="event && event.error" class="text-sm text-red-600">{{ event.error.message }}</div>
                            <div v-if="error" class="text-sm text-red-600">{{ error }}</div>
                        </div>

                        <div class="flex">
                            <div class="flex items-center justify-start mr-2">
                                <PrimaryButton @click="registerCard">
                                    Pay Now
                                </PrimaryButton>
                            </div>
                            <div>
                                <Link :href="route('user.plans')">
                                    <BackButton>
                                        <span>Cancel Payment</span>
                                    </BackButton>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</UserLayout>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useStripe, StripeElement } from 'vue-use-stripe'
import { router } from '@inertiajs/vue3'

export default defineComponent({
    components: { StripeElement },
    props: {
        intent: Object,
        plan_details: Object
    },

    setup(props) {
        const event = ref(null)
        const error = ref(null)

        const {
            stripe,
            elements: [cardElement],
        } = useStripe({
            key: 'pk_test_51NSHk4HRnXkNM5jOKSD0KTsXV1W67rqRRCJeWcCZEJXGjXjZYDXwPtsfxdZIk470TfUFGUFtZScnFUvG3mveaO6o00g8ze8qMC' || '',
            elements: [{ type: 'card', options: {} }],
        })

        const registerCard = async () => {
            if (event.value?.complete) {
                try {
                    const result = await stripe.value?.confirmCardSetup(props.intent.client_secret, {
                        payment_method: {
                            card: cardElement.value,
                        },
                    })

                    if (result.error) {
                        // Handle error scenario
                        error.value = result.error.message;
                    } else if (result.setupIntent) {
                        // Submit the form
                        submitForm(result.setupIntent)
                    }
                } catch (error) {
                    // Handle error scenario
                    error.value = error;
                }
            }
        }

        const submitForm = async (setupIntent) => {

            // Perform form validation, data manipulation, etc.
            const formData = {
                // Define form data properties based on your form inputs
                plan_id: props.plan_details.id,
                token: setupIntent.payment_method
            };

            try {
                // Handle successful form submission
                router.post('/stripe-payment-status/paymentSlug=' + props.plan_details.plan_name, formData)
            } catch (error) {
                // Handle form submission error
                error.value = error;
            }
        };

        return {
            event,
            error,
            cardElement,
            registerCard,
            submitForm,
        }
    },
})

</script>
