<template>
    <Head title="User Index" />
     <UserLayout>
         <div class="w-full px-6 py-6 mx-auto">
         <!-- table 1 -->

             <!-- Success Messege -->
             <Notifications />

             <div class="flex flex-wrap mx-3">
                 <div class="flex-none w-full max-w-full px-3  ">
                     <div class="relative flex flex-col min-w-0 mb-6 h-48 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                     <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                       
                        <div class="mt-10 grid grid-cols-1 gap-x-2 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                
                                    <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="Size">Domain <span class="text-red-600">*</span></Label>
                                <input
                                type="text"
                                placeholder="https://domain.com"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                
                              
                                ref="input"
                                />
                                <div class="space-x-3 py-7">
                                   
                                    <PrimaryButton class="text-xs"><i class=" px-1 fas fa-search"></i>  Search  </PrimaryButton>
                                    <PrimaryButton>Reset</PrimaryButton>
                            </div>
                            </div> 
                        </div>    
                         
                     </div>
                     </div>
                 </div>
             </div>
            </div>       
     </UserLayout>
</template>
<script scope>
</script>
<style scoped>


</style>