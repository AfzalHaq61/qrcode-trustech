<template>
<Head title="Plan Index" />
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
                        <h6>Plans</h6>
                    </div>
                    <div class="p-6 flex-auto">
                        <h3 class="text-sm font-bold">My Plan</h3>
                        <div v-if="active_plan">
                            <div v-if="active_plan.plan_price === 0">
                                <span class="text-sm font-bold mr-2">{{ active_plan.plan_name }}</span>
                                <span class="text-sm font-bold">(FREE PLAN)</span>
                            </div>
                            <div v-else>
                                <span class="text-sm font-bold mr-2">{{ active_plan.plan_name }}</span>
                                <div v-if="remaining_days > 0">
                                    <span class="text-sm font-bold">Remaining Days: {{ remaining_days }}</span>
                                </div>
                                <div v-else>
                                    <span class="text-sm font-bold">Plan Expired!</span>
                                </div>
                            </div>

                            <div class="flex mt-5">
                                <div v-if="active_plan.plan_price !== 0" class="flex mr-2">
                                    <PrimaryButton class="flex mr-2"><Link :href="route('stripe.payment.cancel.subscribtion')">Cancel Subscription</Link></PrimaryButton>
                                    <PrimaryButton><Link :href="route('user.checkout', active_plan.id)">Renew</Link></PrimaryButton>
                                </div>
                                    <PrimaryButton><Link :href="route('user.plans')">Upgrade</Link></PrimaryButton>
                            </div>
                        </div>
                        <div v-else>
                            <span class="block text-sm font-bold mr-2">No active plans!</span>
                            <PrimaryButton class="mt-5"><Link :href="route('user.plans')">Upgrade</Link></PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Plans -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template v-for="plan in plans">
                <CardComponent :plan="plan" :currency="currency"/>
            </template>
            
        </div>
    </div>
</UserLayout>
</template>

<script setup>
import CardComponent from '../../../Components/User/Plan/Card.vue'
const props = defineProps({
    plans: Object,
    settings: Object,
    currency: Object,
    active_plan: Object,
    remaining_days: Object,
    config: Object,
    free_plan: Object
});

</script>
