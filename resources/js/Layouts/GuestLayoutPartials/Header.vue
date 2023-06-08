<template>
    <div class="container sticky top-0 z-sticky">
          <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 flex-0">
              <!-- Navbar -->
              <nav class="absolute top-0 left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 mx-6 my-4 shadow-soft-2xl rounded-blur bg-white/80 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start">
                <div class="flex items-center justify-between w-full p-0 pl-6 mx-auto flex-wrap-inherit">
                    <div>
                        <Link href="/">
                            <ApplicationLogo class="py-2.375 text-sm mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 lg:ml-0" />
                        </Link>
                    </div>
                  <button navbar-trigger class="px-3 py-1 ml-2 leading-none transition-all bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg ease-soft-in-out lg:hidden" type="button" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none">
                      <span bar1 class="w-5.5 rounded-xs relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                      <span bar2 class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                      <span bar3 class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                    </span>
                  </button>
                  <div navbar-menu class="items-center flex-grow overflow-hidden transition-all duration-500 ease-soft lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
                    <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                      <li>
                        <Link class="flex items-center px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 lg:px-2" aria-current="page" :href="route('dashboard')">
                          <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                          Dashboard
                        </Link>
                      </li>
                      <li>
                        <Link class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 lg:px-2" :href="route('login')">
                          <i class="mr-1 fa fa-user opacity-60"></i>
                          Profile
                        </Link>
                      </li>
                      <li>
                        <Link class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 lg:px-2" :href="route('register')">
                          <i class="mr-1 fas fa-user-circle opacity-60"></i>
                          Sign Up
                        </Link>
                      </li>
                      <li>
                        <Link class="block px-4 py-2 mr-2 font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-sm text-slate-700 lg:px-2" :href="route('login')">
                          <i class="mr-1 fas fa-key opacity-60"></i>
                          Sign In
                        </Link>
                      </li>
                    </ul>
                    <ul class="hidden pl-0 mb-0 list-none lg:block lg:flex-row">
                        <li>
                            <a href="https://www.creative-tim.com/product/soft-ui-dashboard-tailwind" target="_blank" class="leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-gradient-to-tl from-gray-400 to-gray-100 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-8 py-2 text-center align-middle font-bold uppercase text-slate-800 transition-all">Qr Code</a>
                        </li>
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
</template>
