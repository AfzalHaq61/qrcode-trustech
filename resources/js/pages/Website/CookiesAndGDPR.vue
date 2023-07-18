<template>
    <Head title="Cookies and GDPR" />
    <WebsiteLayout>
        <div class="relative isolate overflow-hidden bg-white py-24 sm:py-32">
        <div class="absolute -top-80 left-[max(6rem,33%)] -z-10 transform-gpu blur-3xl sm:left-1/2 md:top-20 lg:ml-20 xl:top-3 xl:ml-56" aria-hidden="true">
          <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(63.1% 29.6%, 100% 17.2%, 76.7% 3.1%, 48.4% 0.1%, 44.6% 4.8%, 54.5% 25.4%, 59.8% 49.1%, 55.3% 57.9%, 44.5% 57.3%, 27.8% 48%, 35.1% 81.6%, 0% 97.8%, 39.3% 100%, 35.3% 81.5%, 97.2% 52.8%, 63.1% 29.6%)" />
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:mx-0">
            <p class="text-lg font-semibold leading-8 tracking-tight text-themeColor">Cookies and GDPR</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ page[1].body }}</h1>
            <p class="mt-6 text-xl leading-8 text-gray-700">{{ page[2].body }}</p>
          </div>
          <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:mt-10 lg:max-w-none lg:grid-cols-12">
            <div class="relative lg:order-last lg:col-span-5">
              <svg class="absolute -top-[40rem] left-1 -z-10 h-[64rem] w-[175.5rem] -translate-x-1/2 stroke-gray-900/10 [mask-image:radial-gradient(64rem_64rem_at_111.5rem_0%,white,transparent)]" aria-hidden="true">
                <defs>
                  <pattern id="e87443c8-56e4-4c20-9111-55b82fa704e3" width="200" height="200" patternUnits="userSpaceOnUse">
                    <path d="M0.5 0V200M200 0.5L0 0.499983" />
                  </pattern>
                </defs>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#e87443c8-56e4-4c20-9111-55b82fa704e3)" />
              </svg>
              <figure class="border-l border-themeColor pl-8">
                <blockquote class="text-xl font-semibold leading-8 tracking-tight text-gray-900">
                  <p>“Vel ultricies morbi odio facilisi ultrices accumsan donec lacus purus. Lectus nibh ullamcorper ac dictum justo in euismod. Risus aenean ut elit massa. In amet aliquet eget cras. Sem volutpat enim tristique.”</p>
                </blockquote>
                <figcaption class="mt-8 flex gap-x-4">
                  <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="mt-1 h-10 w-10 flex-none rounded-full bg-gray-50" />
                  <div class="text-sm leading-6">
                    <div class="font-semibold text-gray-900">Brenna Goyette</div>
                    <div class="text-gray-600">@brenna</div>
                  </div>
                </figcaption>
              </figure>
            </div>
            <div class="max-w-xl text-base leading-7 text-gray-700 lg:col-span-7">
              <p>{{ page[5].body }}</p>
              <p>{{ page[6].body }}</p>
              <p>{{ page[7].body }}</p>
              <ul role="list" class="mt-8 max-w-xl space-y-8 text-gray-600">
                <li class="flex gap-x-3">
                  <span>{{ page[8].body }}</span>
                </li>
                <li class="flex gap-x-3">
                  <span>{{ page[9].body }}</span>
                </li>
                <li class="flex gap-x-3">
                  <span>{{ page[10].body }}</span>
                </li>
              </ul>
              <p class="mt-8">{{ page[11].body }}</p>
              <p class="mt-6">{{ page[12].body }}</p>
            </div>
          </div>
        </div>
      </div>
    </WebsiteLayout>
</template>

<script setup>

const props = defineProps({
    settings: Object,
    config: Object,
    page: Object
});

</script>
