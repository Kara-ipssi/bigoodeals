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
                <section aria-labelledby="trending-heading">
                    <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:pt-32 lg:px-8">
                    <div class="md:flex md:items-center md:justify-between">
                        <h2 id="favorites-heading" class="text-2xl font-extrabold tracking-tight text-gray-900">Trending Products</h2>
                        <a href="#" class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 md:block">Shop the collection<span aria-hidden="true"> &rarr;</span></a>
                    </div>
            
                    <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
                        <div class="group relative">
                            <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-trending-product-02.jpg" alt="Hand stitched, orange leather long wallet." class="w-full h-full object-center object-cover">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">
                                <a href="#">
                                <span class="absolute inset-0"></span>
                                Leather Long Wallet
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Natural</p>
                            <p class="mt-1 text-sm font-medium text-gray-900">$75</p>
                        </div>
                        
                        <div class="group relative">
                            <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
                                <img src="https://ae01.alicdn.com/kf/Hce5ed1b5c97c4314ad15f76573b4a14d1/Famous-Brand-Designer-3-IN-1-Shoulder-Bag-Women-Vintage-Printing-Purse-And-Hand-Bags-For.jpg_220x220xz.jpg_.webp" alt="Hand stitched, orange leather long wallet." class="w-full h-full object-center object-cover">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">
                                <a href="#">
                                <span class="absolute inset-0"></span>
                                Leather Long Wallet
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Natural</p>
                            <p class="mt-1 text-sm font-medium text-gray-900">$75</p>
                        </div>
                        <div class="group relative">
                            <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Hand stitched, orange leather long wallet." class="w-full h-full object-center object-cover">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">
                                <a href="#">
                                <span class="absolute inset-0"></span>
                                Leather Long Wallet
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Natural</p>
                            <p class="mt-1 text-sm font-medium text-gray-900">$75</p>
                        </div>
                        <div class="group relative">
                            <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
                                <img src="https://ae01.alicdn.com/kf/Hf9527d3501094d3f857e5e9ea76fd1685/Sxclaee-chaussures-d-contract-es-coussin-d-air-pour-hommes-baskets-respirantes-et-confortables-avec-doublure.jpg_Q90.jpg_.webp" alt="Hand stitched, orange leather long wallet." class="w-full h-full object-center object-cover">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">
                                <a href="#">
                                <span class="absolute inset-0"></span>
                                Leather Long Wallet
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Natural</p>
                            <p class="mt-1 text-sm font-medium text-gray-900">$75</p>
                        </div>
                        <!-- More products... -->
                    </div>
            
                    <div class="mt-8 text-sm md:hidden">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Shop the collection<span aria-hidden="true"> &rarr;</span></a>
                    </div>
                    </div>
                </section>
        
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
                                Free returns
                                </h3>
                                <p class="mt-3 text-sm text-gray-500">
                                Not what you expected? Place it back in the parcel and attach the pre-paid postage stamp.
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
                                Same day delivery
                                </h3>
                                <p class="mt-3 text-sm text-gray-500">
                                We offer a delivery service that has never been done before. Checkout today and receive your products within hours.
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
                                All year discount
                                </h3>
                                <p class="mt-3 text-sm text-gray-500">
                                Looking for a deal? You can use the code &quot;ALLYEAR&quot; at checkout and get money off all year round.
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
                                For the planet
                                </h3>
                                <p class="mt-3 text-sm text-gray-500">
                                We’ve pledged 1% of sales to the preservation and restoration of the natural environment.
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
    
            <livewire:shop-footer/>
        </div>
  
    </x-slot>
</x-guest-layout>