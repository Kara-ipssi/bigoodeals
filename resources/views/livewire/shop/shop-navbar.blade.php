<div
    x-data="{
        isShow: false,
        isOpen : false,
        women : false,
        men : false,
        mobileMenuOpen : false,
        toggleWomen() { 
            this.women = ! this.women,
            this.men = false
        },
        toggleMen() { 
            this.men = ! this.men,
            this.women = false
        }
    }">
    <div
        x-show="mobileMenuOpen"
        class="fixed inset-0 flex z-40 lg:hidden" 
        role="dialog" 
        aria-modal="true">
        <!--
            Off-canvas menu overlay, show/hide based on off-canvas menu state.
    
            Entering: "transition-opacity ease-linear duration-300"
            From: "opacity-0"
            To: "opacity-100"
            Leaving: "transition-opacity ease-linear duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div
            x-show="mobileMenuOpen"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>
    
        <!--
            Off-canvas menu, show/hide based on off-canvas menu state.
    
            Entering: "transition ease-in-out duration-300 transform"
            From: "-translate-x-full"
            To: "translate-x-0"
            Leaving: "transition ease-in-out duration-300 transform"
            From: "translate-x-0"
            To: "-translate-x-full"
        -->
        <div 
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            x-translate
            class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">

            <div class="px-4 pt-5 pb-2 flex">
                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    type="button" 
                    class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
    
            <!-- Mobile Links -->
            <div class="mt-2">
                <div class="border-b border-gray-200">
                    <div class="-mb-px flex px-4 space-x-8" aria-orientation="horizontal" role="tablist">
                    <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                    <button 
                        id="tabs-1-tab-1" 
                        @click="toggleWomen()"
                        :class="{'text-indigo-600 border-indigo-600': women, 'text-gray-700 hover:text-gray-800': !women}"
                        class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">
                        Women
                    </button>
        
                    <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                    <button 
                        id="tabs-1-tab-2"
                        @click='toggleMen()'
                        :class="{'text-indigo-600 border-indigo-600': men, 'text-gray-700 hover:text-gray-800': !men}" 
                        class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">
                        Men
                    </button>
                    </div>
                </div>
    
                <!-- 'Women' tab panel, show/hide based on tab state. -->
                <div 
                    x-show="women"
                    id="tabs-1-panel-1" class="px-4 py-6 space-y-12" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                    <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                    <div class="group relative">
                        <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                        New Arrivals
                        </a>
                        <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                    </div>
        
                    <div class="group relative">
                        <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                        Basic Tees
                        </a>
                        <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                    </div>
        
                    <div class="group relative">
                        <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg" alt="Model wearing minimalist watch with black wristband and white watch face." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                        Accessories
                        </a>
                        <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                    </div>
        
                    <div class="group relative">
                        <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-04.jpg" alt="Model opening tan leather long wallet with credit card pockets and cash pouch." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                        Carry
                        </a>
                        <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                    </div>
                    </div>
                </div>
        
                <!-- 'Men' tab panel, show/hide based on tab state. -->
                <div
                    x-show="men" 
                    id="tabs-1-panel-2" class="px-4 py-6 space-y-12" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
                    <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                    <div class="group relative">
                        <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-01.jpg" alt="Hats and sweaters on wood shelves next to various colors of t-shirts on hangers." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                        New Arrivals
                        </a>
                        <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                    </div>
        
                    <div class="group relative">
                        <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-02.jpg" alt="Model wearing light heather gray t-shirt." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                        Basic Tees
                        </a>
                        <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                    </div>
        
                    <div class="group relative">
                        <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-03.jpg" alt="Grey 6-panel baseball hat with black brim, black mountain graphic on front, and light heather gray body." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                        Accessories
                        </a>
                        <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                    </div>
        
                    <div class="group relative">
                        <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-04.jpg" alt="Model putting folded cash into slim card holder olive leather wallet with hand stitching." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                        Carry
                        </a>
                        <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                    </div>
                    </div>
                </div>
            </div>
    
            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
            <div class="flow-root">
                <a href="#" class="-m-2 p-2 block font-medium text-gray-900">{{__('Contact us')}}</a>
            </div>

            </div>
    
            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                <div class="flow-root">
                    {{-- TO DO --}}
                    {{-- <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Sign in</a> --}}
                    <a href="#" class="-m-2 p-2 block font-medium text-gray-900">{{__('About')}}</a>
                </div>
            </div>
    
            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                <!-- Currency selector -->
                {{-- <form>
                    <div class="inline-block">
                    <label for="mobile-currency" class="sr-only">Currency</label>
                    <div class="-ml-2 group relative border-transparent rounded-md focus-within:ring-2 focus-within:ring-white">
                        <select id="mobile-currency" name="currency" class="bg-none border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-gray-700 group-hover:text-gray-800 focus:outline-none focus:ring-0 focus:border-transparent">
                        <option>CAD</option>
        
                        <option>USD</option>
        
                        <option>AUD</option>
        
                        <option>EUR</option>
        
                        <option>GBP</option>
                        </select>
                        <div class="absolute right-0 inset-y-0 flex items-center pointer-events-none">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="w-5 h-5 text-gray-500">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 8l4 4 4-4" />
                        </svg>
                        </div>
                    </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
    
    <header class="relative">
        <nav aria-label="Top">
            <!-- Top navigation -->
            {{-- <div class="bg-gray-900">
                <div class="max-w-7xl mx-auto h-10 px-4 flex items-center justify-between sm:px-6 lg:px-8">
                    <!-- Currency selector -->
                    <form>
                        <div>
                            <label for="desktop-currency" class="sr-only">Currency</label>
                            <div class="-ml-2 group relative bg-gray-900 border-transparent rounded-md focus-within:ring-2 focus-within:ring-white">
                            <select id="desktop-currency" name="currency" class="bg-none bg-gray-900 border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-white group-hover:text-gray-100 focus:outline-none focus:ring-0 focus:border-transparent">
                                <option>CAD</option>
            
                                <option>USD</option>
            
                                <option>AUD</option>
            
                                <option>EUR</option>
            
                                <option>GBP</option>
                            </select>
                            <div class="absolute right-0 inset-y-0 flex items-center pointer-events-none">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="w-5 h-5 text-gray-300">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 8l4 4 4-4" />
                                </svg>
                            </div>
                            </div>
                        </div>
                    </form>
        
                    <div class="flex items-center space-x-6">
                        <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Sign in</a>
                        <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Create an account</a>
                    </div>
                </div>
            </div> --}}
    
            <!-- Secondary navigation -->
            <div class="bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="h-16 flex items-center justify-between">
                    <!-- Logo (lg+) -->
                    <div class="hidden lg:flex-1 lg:flex lg:items-center">
                        <a href="#">
                        <span class="sr-only">Workflow</span>
                        <img class="h-8 w-auto" src="{{asset('assets/images/logo/logo.png')}}" alt="">
                        </a>
                    </div>
        
                    <div class="hidden h-full lg:flex">
                        <!-- Flyout menus Desktop -->
                        <div class="px-4 bottom-0 inset-x-0">
                        <div class="h-full flex justify-center space-x-8">
                            <div class="flex">
                                <div class="relative flex">
                                    <!-- Item active: "text-indigo-600", Item inactive: "text-gray-700 hover:text-gray-800" -->
                                    <button
                                        @click="toggleWomen()" 
                                        type="button"
                                        :class="{'text-indigo-600': women, 'text-gray-700 hover:text-gray-800': !women}"
                                        class="text-gray-700 hover:text-gray-800 relative flex items-center justify-center transition-colors ease-out duration-200 text-sm font-medium" aria-expanded="false">
                                    Women
                                    <!-- Open: "bg-indigo-600", Closed: "" -->
                                    <span class="absolute z-20 -bottom-px inset-x-0 h-0.5 transition ease-out duration-200" aria-hidden="true"></span>
                                    </button>
                                </div>
        
                                <!--
                                    'Women' flyout menu, show/hide based on flyout menu state.
            
                                    Entering: "transition ease-out duration-200"
                                    From: "opacity-0"
                                    To: "opacity-100"
                                    Leaving: "transition ease-in duration-150"
                                    From: "opacity-100"
                                    To: "opacity-0"
                                -->
                                <div
                                    x-show="women"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class="absolute z-10 top-full inset-x-0 bg-white text-sm text-gray-500">
                                    <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                    <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>
                                    <!-- Fake border when menu is open -->
                                    <div class="absolute inset-0 top-0 h-px max-w-7xl mx-auto px-8" aria-hidden="true">
                                    <!-- Open: "bg-gray-200", Closed: "bg-transparent" -->
                                        <div :class="{'bg-gray-200':women, 'bg-transparent': !women}" class="bg-transparent w-full h-px transition-colors ease-out duration-200"></div>
                                    </div>
            
                                    <div class="relative">
                                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                            <div class="grid grid-cols-4 gap-y-10 gap-x-8 py-16">
                                            <div class="group relative">
                                                <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-center object-cover">
                                                </div>
                                                <a href="#" class="mt-4 block font-medium text-gray-900">
                                                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                                New Arrivals
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                
                                            <div class="group relative">
                                                <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-center object-cover">
                                                </div>
                                                <a href="#" class="mt-4 block font-medium text-gray-900">
                                                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                                Basic Tees
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                
                                            <div class="group relative">
                                                <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg" alt="Model wearing minimalist watch with black wristband and white watch face." class="object-center object-cover">
                                                </div>
                                                <a href="#" class="mt-4 block font-medium text-gray-900">
                                                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                                Accessories
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                
                                            <div class="group relative">
                                                <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-04.jpg" alt="Model opening tan leather long wallet with credit card pockets and cash pouch." class="object-center object-cover">
                                                </div>
                                                <a href="#" class="mt-4 block font-medium text-gray-900">
                                                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                                Carry
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="flex">
                                <div class="relative flex">
                                    <!-- Item active: "text-indigo-600", Item inactive: "text-gray-700 hover:text-gray-800" -->
                                    <button 
                                        @click = "toggleMen()"
                                        type="button"
                                        :class="{'text-indigo-600': men, 'text-gray-700 hover:text-gray-800': !men}" 
                                        class="text-gray-700 hover:text-gray-800 relative flex items-center justify-center transition-colors ease-out duration-200 text-sm font-medium" aria-expanded="false">
                                    Men
                                    <!-- Open: "bg-indigo-600", Closed: "" -->
                                    <span class="absolute z-20 -bottom-px inset-x-0 h-0.5 transition ease-out duration-200" aria-hidden="true"></span>
                                    </button>
                                </div>
        
                                <!--
                                    'Women' flyout menu, show/hide based on flyout menu state.
            
                                    Entering: "transition ease-out duration-200"
                                    From: "opacity-0"
                                    To: "opacity-100"
                                    Leaving: "transition ease-in duration-150"
                                    From: "opacity-100"
                                    To: "opacity-0"
                                -->
                                <div
                                    x-show="men"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class="absolute z-10 top-full inset-x-0 bg-white text-sm text-gray-500">
                                    <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                    <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>
                                    <!-- Fake border when menu is open -->
                                    <div class="absolute inset-0 top-0 h-px max-w-7xl mx-auto px-8" aria-hidden="true">
                                    <!-- Open: "bg-gray-200", Closed: "bg-transparent" -->
                                    <div class="bg-transparent w-full h-px transition-colors ease-out duration-200"></div>
                                    </div>
            
                                    <div class="relative">
                                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                        <div class="grid grid-cols-4 gap-y-10 gap-x-8 py-16">
                                        <div class="group relative">
                                            <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-01.jpg" alt="Hats and sweaters on wood shelves next to various colors of t-shirts on hangers." class="object-center object-cover">
                                            </div>
                                            <a href="#" class="mt-4 block font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            New Arrivals
                                            </a>
                                            <p aria-hidden="true" class="mt-1">Shop now</p>
                                        </div>
            
                                        <div class="group relative">
                                            <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-02.jpg" alt="Model wearing light heather gray t-shirt." class="object-center object-cover">
                                            </div>
                                            <a href="#" class="mt-4 block font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Basic Tees
                                            </a>
                                            <p aria-hidden="true" class="mt-1">Shop now</p>
                                        </div>
            
                                        <div class="group relative">
                                            <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-03.jpg" alt="Grey 6-panel baseball hat with black brim, black mountain graphic on front, and light heather gray body." class="object-center object-cover">
                                            </div>
                                            <a href="#" class="mt-4 block font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Accessories
                                            </a>
                                            <p aria-hidden="true" class="mt-1">Shop now</p>
                                        </div>
            
                                        <div class="group relative">
                                            <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-04.jpg" alt="Model putting folded cash into slim card holder olive leather wallet with hand stitching." class="object-center object-cover">
                                            </div>
                                            <a href="#" class="mt-4 block font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Carry
                                            </a>
                                            <p aria-hidden="true" class="mt-1">Shop now</p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
        
                            <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">{{__('Contact us')}}</a>
        
                            <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">{{__('About')}}</a>
                        </div>
                        </div>
                    </div>
        
                    <!-- Mobile menu and search (lg-) -->
                    <div 
                        class="flex-1 flex items-center lg:hidden">
                        <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                        <button 
                            type="button"
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            class="-ml-2 bg-white p-2 rounded-md text-gray-400 cursor-pointer">
                        <span class="sr-only">Open menu</span>
                        <!-- Heroicon name: outline/menu -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        </button>
        
                        <!-- Search -->
                        <a href="#" class="ml-2 p-2 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Search</span>
                        <!-- Heroicon name: outline/search -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        </a>
                    </div>
        
                    <!-- Logo (lg-) -->
                    <a href="#" class="lg:hidden">
                        <span class="sr-only">Workflow</span>
                        <img src="{{asset('assets/images/logo/logo.png')}}" alt="" class="h-8 w-auto">
                    </a>
        
                    <div class="flex-1 flex items-center justify-end">
                        {{-- <a href="#" class="hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">
                        Search
                        </a> --}}
        
                        <div class="flex items-center lg:ml-8">
                        <!-- Help -->
                        <a href="#" class="p-2 text-gray-400 hover:text-gray-500 lg:hidden">
                            <span class="sr-only">Support</span>
                            <!-- Heroicon name: outline/question-mark-circle -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </a>
                        <a href="#" class="hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">Support</a>
        
                        <!-- Cart -->
                        <div class="ml-4 flow-root lg:ml-8">
                            <a 
                                @click="isShow = !isShow"
                                href="#" 
                                class="group -m-2 p-2 flex items-center">
                                <!-- Heroicon name: outline/shopping-bag -->
                                <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                <span class="sr-only">items in cart, view bag</span>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div x-show='isShow' class="fixed inset-0 overflow-hidden z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">
          <!--
            Background overlay, show/hide based on slide-over state.
      
            Entering: "ease-in-out duration-500"
              From: "opacity-0"
              To: "opacity-100"
            Leaving: "ease-in-out duration-500"
              From: "opacity-100"
              To: "opacity-0"
          -->
            <div 
                x-show="isShow"
                x-transition:enter="ease-in-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out duration-500"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
      
            <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
                <!--
                    Slide-over panel, show/hide based on slide-over state.
            
                    Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                    From: "translate-x-full"
                    To: "translate-x-0"
                    Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                    From: "translate-x-0"
                    To: "translate-x-full"
                -->
                <div 
                    x-show="isShow"
                    x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full" 
                    class="w-screen max-w-md">
                    <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                    <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                        <div class="flex items-start justify-between">
                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                            Shopping cart
                        </h2>
                        <div class="ml-3 h-7 flex items-center">
                            <button 
                                @click="isShow = !isShow"
                                type="button" 
                                class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Close panel</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        </div>
            
                        <div class="mt-8">
                        <div class="flow-root">
                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                            <li class="py-6 flex">
                                <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="w-full h-full object-center object-cover">
                                </div>
            
                                <div class="ml-4 flex-1 flex flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                    <h3>
                                        <a href="#">
                                        Throwback Hip Bag
                                        </a>
                                    </h3>
                                    <p class="ml-4">
                                        $90.00
                                    </p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">
                                    Salmon
                                    </p>
                                </div>
                                <div class="flex-1 flex items-end justify-between text-sm">
                                    <p class="text-gray-500">
                                    Qty 1
                                    </p>
            
                                    <div class="flex">
                                    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                    </div>
                                </div>
                                </div>
                            </li>
            
                            <li class="py-6 flex">
                                <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg" alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch." class="w-full h-full object-center object-cover">
                                </div>
            
                                <div class="ml-4 flex-1 flex flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                    <h3>
                                        <a href="#">
                                        Medium Stuff Satchel
                                        </a>
                                    </h3>
                                    <p class="ml-4">
                                        $32.00
                                    </p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">
                                    Blue
                                    </p>
                                </div>
                                <div class="flex-1 flex items-end justify-between text-sm">
                                    <p class="text-gray-500">
                                    Qty 1
                                    </p>
            
                                    <div class="flex">
                                    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                    </div>
                                </div>
                                </div>
                            </li>
            
                            <!-- More products... -->
                            </ul>
                        </div>
                        </div>
                    </div>
            
                    <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                        <div class="flex justify-between text-base font-medium text-gray-900">
                        <p>Subtotal</p>
                        <p>$262.00</p>
                        </div>
                        <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                        <div class="mt-6">
                        <a href="#" class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Checkout</a>
                        </div>
                        <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
                        <p>
                            or <button @click="isShow = !isShow" type="button" class="text-indigo-600 font-medium hover:text-indigo-500">Continue Shopping<span aria-hidden="true"> &rarr;</span></button>
                        </p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
