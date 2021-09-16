<x-guest-layout>
    <x-slot name="slot">

        <div class="bg-white">
            <!--
            Mobile menu
        
            Off-canvas menu for mobile, show/hide based on off-canvas menu state.
            -->
            {{-- Hero section --}}
            <livewire:shop-hero/>
            <main>

                {{-- Trending products --}}
                <livewire:shop-trending/>
                
                <section aria-labelledby="perks-heading" class="bg-gray-50 border-t border-gray-200">
                    <h2 id="perks-heading" class="sr-only">Our perks</h2>
            
                    <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:px-8">
                        <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-0">
                            <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                            <div class="md:flex-shrink-0">
                                <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-returns-light.svg" alt="">
                                </div>
                            </div>
                            <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                                <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">
                                {{__('Free returns')}}
                                </h3>
                                <p class="mt-3 text-sm text-gray-500">
                                {{__('Not what you expected? Place it back in the parcel and attach the pre-paid postage stamp.')}}
                                </p>
                            </div>
                            </div>
                
                            <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                            <div class="md:flex-shrink-0">
                                <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-calendar-light.svg" alt="">
                                </div>
                            </div>
                            <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                                <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">
                                {{__('Few day delivery')}}
                                </h3>
                                <p class="mt-3 text-sm text-gray-500">
                                    {{__('We offer a delivery service that has never been done before. Checkout today and receive your products within days.')}}
                                </p>
                            </div>
                            </div>
                
                            <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                            <div class="md:flex-shrink-0">
                                <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-gift-card-light.svg" alt="">
                                </div>
                            </div>
                            <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                                <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">
                                {{__('All year discount')}}
                                </h3>
                                <p class="mt-3 text-sm text-gray-500">
                                {{__('Looking for a deal? You can use the code &quot;ALLYEAR&quot; at checkout and get money off all year round.')}}
                                </p>
                            </div>
                            </div>
                
                            <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                            <div class="md:flex-shrink-0">
                                <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-planet-light.svg" alt="">
                                </div>
                            </div>
                            <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                                <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">
                                {{__('For the planet')}}
                                </h3>
                                <p class="mt-3 text-sm text-gray-500">
                                {{__('We’ve pledged 1% of sales to the preservation and restoration of the natural environment.')}}
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
    
            {{-- <livewire:shop-footer/> --}}
        </div>
  
    </x-slot>
</x-guest-layout>