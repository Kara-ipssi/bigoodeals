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
            class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">
            
            <div class="px-4 pt-5 pb-2 flex">
                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    type="button" 
                    class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400">
                        <span class="sr-only">{{__('Close menu')}}</span>
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
                        {{__('Women')}}
                    </button>
        
                    <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                    <button 
                        id="tabs-1-tab-2"
                        @click='toggleMen()'
                        :class="{'text-indigo-600 border-indigo-600': men, 'text-gray-700 hover:text-gray-800': !men}" 
                        class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">
                        {{__('Men')}}
                    </button>
                    </div>
                </div>
    
                <!-- 'Women' tab panel, show/hide based on tab state. -->
                <div 
                    x-show="women"
                    id="tabs-1-panel-1" class="px-4 py-6 space-y-12" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                    <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                        @foreach ($womenCats as $cat)
                            <div class="group relative">
                                <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                <img src="{{$cat->image}}" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-center object-cover">
                                </div>
                                <a href="{{route('shop.products')}}" class="mt-4 block font-medium text-gray-900">
                                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                    {{$cat->name}}
                                </a>
                                <p aria-hidden="true" class="mt-1">{{__('Shop now')}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
        
                <!-- 'Men' tab panel, show/hide based on tab state. -->
                <div
                    x-show="men" 
                    id="tabs-1-panel-2" class="px-4 py-6 space-y-12" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
                    <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                        @foreach ($menCats as $cat)
                            <div class="group relative">
                                <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                <img src="{{$cat->image}}" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-center object-cover">
                                </div>
                                <a href="{{route('shop.products')}}" class="mt-4 block font-medium text-gray-900">
                                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                    {{$cat->name}}
                                </a>
                                <p aria-hidden="true" class="mt-1">{{__('Shop now')}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @auth
                <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                    <div class="flow-root">
                        <a href="{{route('shop.myaccount')}}" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">{{__('My account')}}</a>
                    </div>
                </div>
                @if (Auth::user()->is_admin == true)
                    <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                        <div class="flow-root">
                            <a href="{{route('dashboard')}}" target="_blank" class=" px-2 text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">Admin</a>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="text-sm font-medium text-gray-700 hover:text-gray-800 lg:block"> {{__('Logout')}} </button>
                        </form>
                    </div>
                @else
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <div class="flow-root">
                            <button class="-m-2 p-2 block font-medium text-gray-900"> {{__('Logout')}} </button>
                        </div>
                    </form>
                @endif
            @else
                <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                    <div class="flow-root">
                        <a href="{{route('login')}}" class="-m-2 p-2 block font-medium text-gray-900">{{__('Login')}}</a>
                    </div>
                </div>
                <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                    <div class="flow-root">
                        <a href="{{route('register')}}" class="-m-2 p-2 block font-medium text-gray-900">{{__('Register')}}</a>
                    </div>
                </div>
            @endauth

            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                <div class="flow-root">
                    <a href="#" class="-m-2 p-2 block font-medium text-gray-900">{{__('Contact us')}}</a>
                </div>
            </div>
    
            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                <div class="flow-root">
                    
                    <a href="#" class="-m-2 p-2 block font-medium text-gray-900">{{__('About')}}</a>
                </div>
            </div>
    
        </div>
    </div>
    
    <header class="relative">
        <nav aria-label="Top">
            <!-- Secondary navigation -->
            <div class="bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="h-16 flex items-center justify-between">
                    <!-- Logo (lg+) -->
                    <div class="hidden lg:flex-1 lg:flex lg:items-center">
                        <a href="{{route('shop.index')}}">
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
                                    {{__('Women')}}
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
                                                @foreach ($womenCats as $cat)
                                                    <div class="group relative">
                                                        <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                        <img src="{{$cat->image}}" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-center object-cover">
                                                        </div>
                                                        <a href="{{route('shop.products')}}" class="mt-4 block font-medium text-gray-900">
                                                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                                            {{$cat->name}}
                                                        </a>
                                                        <p aria-hidden="true" class="mt-1">{{__('Shop now')}}</p>
                                                    </div>
                                                @endforeach
                    
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
                                    {{__('Men')}}
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
                                            @foreach ($menCats as $cat)
                                                <div class="group relative">
                                                    <div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                    <img src="{{$cat->image}}" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-center object-cover">
                                                    </div>
                                                    <a href="{{route('shop.products')}}" class="mt-4 block font-medium text-gray-900">
                                                    <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                                        {{$cat->name}}
                                                    </a>
                                                    <p aria-hidden="true" class="mt-1">{{__('Shop now')}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
        
                            
                            <a href="{{route('shop.myaccount')}}" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">{{__('My account')}}</a>
                            

                            {{-- <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">{{__('Contact us')}}</a> --}}
        
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
                        <span class="sr-only">{{__('Open menu')}}</span>
                        <!-- Heroicon name: outline/menu -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        </button>
        
                        <!-- Search -->
                        <a href="{{route('shop.products')}}" class="ml-2 p-2 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">{{__('Search')}}</span>
                        <!-- Heroicon name: outline/search -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        </a>
                    </div>
        
                    <!-- Logo (lg-) -->
                    <a href="{{route('shop.index')}}" class="lg:hidden">
                        <span class="sr-only">Workflow</span>
                        <img src="{{asset('assets/images/logo/logo.png')}}" alt="" class="h-8 w-auto">
                    </a>
        
                    <div class="flex-1 flex items-center justify-end">
                        {{-- <a href="#" class="hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">
                        Search
                        </a> --}}
        
                        <div class="flex items-center lg:ml-8">
                        <!-- Help -->
                        @auth
                            <a href="{{route('dashboard')}}" class="p-2 text-gray-400 hover:text-gray-500 lg:hidden">
                                <span class="sr-only">Admin</span>
                                <!-- Heroicon name: outline/question-mark-circle -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </a>
                        @endauth
                        @if(!empty(Auth::user()))
                            @if (Auth::user()->is_admin == true)
                                <a href="{{route('dashboard')}}" target="_blank" class="px-2 hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">Admin</a>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button class="hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block"> {{__('Logout')}} </button>
                                </form>
                            @else
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button class="hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block"> {{__('Logout')}} </button>
                                </form>
                            @endif
                        @else
                            <a href="{{route('login')}}" class="px-3 hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">{{__('Login')}}</a>
                            <a href="{{route('register')}}" class="hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">{{__('Register')}}</a>
                        @endif
        
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
                                <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{$cartCount}}</span>
                                <span class="sr-only">{{__('items in cart, view bag')}}</span>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <livewire:shop-cart/>
    
</div>
