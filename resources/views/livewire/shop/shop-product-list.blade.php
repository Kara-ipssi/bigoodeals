<div
    class="bg-white"
    x-data="{
        isMenu : false,
        category: true,
        size: true,
    }">
    <!--
        Mobile filter dialog

        Off-canvas menu for mobile, show/hide based on off-canvas menu state.
    -->
    <div
        x-show="isMenu"
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
            x-show="isMenu"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black bg-opacity-25" 
            aria-hidden="true"></div>

        <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
            From: "translate-x-full"
            To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
            From: "translate-x-0"
            To: "translate-x-full"
        -->
        <div
            x-show="isMenu"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-6 flex flex-col overflow-y-auto">
            <div class="px-4 flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                <button
                    @click="isMenu = !isMenu"
                    type="button" 
                    class="-mr-2 w-10 h-10 p-2 flex items-center justify-center text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Filters -->
            <form class="mt-4">
                <div class="border-t border-gray-200 pt-4 pb-4">
                    <fieldset>
                        <legend class="w-full px-2">
                            <!-- Expand/collapse section button -->
                            <button
                                @click="category = !category"
                                type="button" 
                                class="w-full p-2 flex items-center justify-between text-gray-400 hover:text-gray-500" 
                                aria-controls="filter-section-1" 
                                aria-expanded="false">
                                <span class="text-sm font-medium text-gray-900">
                                    Category
                                </span>
                                <span class="ml-6 h-7 flex items-center">
                                    <!--
                                        Expand/collapse icon, toggle classes based on section open state.

                                        Heroicon name: solid/chevron-down

                                        Open: "-rotate-180", Closed: "rotate-0"
                                    -->
                                    <svg
                                        :class="{'-rotate-180': category, 'rotate-0': !category }" 
                                        class="rotate-0 h-5 w-5 transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        </legend>
                        <div
                            x-show="category" 
                            class="pt-4 pb-2 px-4" id="filter-section-1">
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <input id="category-0-mobile" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="category-0-mobile" class="ml-3 text-sm text-gray-500">
                                        All New Arrivals
                                    </label>
                                </div>

                                @foreach ($categories as $category)
                                    <div class="flex items-center">
                                        <input id="category-{{$category->id}}-mobile" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="category-{{$category->id}}-mobile" class="ml-3 text-sm text-gray-500">
                                            {{$category->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </fieldset>
                </div>

                <div class="border-t border-gray-200 pt-4 pb-4">
                    <fieldset>
                        <legend class="w-full px-2">
                            <!-- Expand/collapse section button -->
                            <button
                                @click="size = !size"
                                type="button" 
                                class="w-full p-2 flex items-center justify-between text-gray-400 hover:text-gray-500" 
                                aria-controls="filter-section-2" 
                                aria-expanded="false">
                                <span class="text-sm font-medium text-gray-900">
                                    Sizes
                                </span>
                                    <span class="ml-6 h-7 flex items-center">
                                    <!--
                                        Expand/collapse icon, toggle classes based on section open state.

                                        Heroicon name: solid/chevron-down

                                        Open: "-rotate-180", Closed: "rotate-0"
                                    -->
                                    <svg
                                        :class="{'-rotate-180':size, 'rotate-0': !size}" 
                                        class="rotate-0 h-5 w-5 transform" 
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        </legend>
                        <div
                            x-show="size" 
                            class="pt-4 pb-2 px-4" id="filter-section-2">
                            <div class="space-y-6">

                                @foreach ($sizes as $size)
                                    <div class="flex items-center">
                                        <input id="sizes-{{$size->id}}-mobile" name="sizes[]" value="xs" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                        <label for="sizes-{{$size->id}}-mobile" class="ml-3 text-sm text-gray-500">
                                            {{$size->code}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>

    {{-- max-w-2xl lg:max-w-7xl  --}}
    <main class="mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200 pb-10">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">New Arrivals</h1>
            <p class="mt-4 text-base text-gray-500">Checkout out the latest release of Basic Tees, new and improved with four openings!</p>
        </div>

        <div class="pt-12 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
            <aside>
                <h2 class="sr-only">Filters</h2>

                <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
                <button
                    @click="isMenu = !isMenu"
                    type="button" 
                    class="inline-flex items-center lg:hidden">
                <span class="text-sm font-medium text-gray-700">Filters</span>
                <!-- Heroicon name: solid/plus-sm -->
                <svg class="flex-shrink-0 ml-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                </button>

                <div class="hidden lg:block">
                <form class="divide-y divide-gray-200 space-y-10">
                    <div>
                    <fieldset>
                        <legend class="block text-sm font-medium text-gray-900">
                            {{__('Categories')}}
                        </legend>
                        <div class="pt-6 space-y-3">

                            <div class="flex items-center">
                                <input id="category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="category-0" class="ml-3 text-sm text-gray-600">
                                    New Arrivals
                                </label>
                            </div>

                            @foreach ($categories as $category)
                                <div class="flex items-center">
                                    <input id="category-{{$category->id}}" name="category[]" value="tees" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="category-{{$category->id}}" class="ml-3 text-sm text-gray-600">
                                        {{$category->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                    </div>

                    <div class="pt-10">
                    <fieldset>
                        <legend class="block text-sm font-medium text-gray-900">
                            {{__('Sizes')}}
                        </legend>
                        <div class="pt-6 space-y-3">
                            @foreach ($sizes as $size)
                                <div class="flex items-center">
                                    <input id="size-{{$size->id}}" name="sizes[]" value="xs" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="size-{{$size->id}}" class="ml-3 text-sm text-gray-600">
                                        {{$size->code}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                    </div>
                </form>
                </div>
            </aside>

            <!-- Product grid -->
            <div class="mt-6 border-2 border-dashed lg:mt-0 lg:col-span-2 xl:col-span-3">
                <!-- Replace with your content -->
                
                    <div class="grid grid-flow-row lg:grid-cols-4 gap-4 sm:grid-cols-2 ">

                        @foreach ($productToDisplay as $product)
                            <div>
                                <div class="relative">
                                    <div class="relative w-full h-72 rounded-lg overflow-hidden">
                                        <img src="{{$product->images[0]->image_url}}" alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls." class="w-full h-full object-center object-cover">
                                    </div>
                                    <div class="relative mt-4">
                                        <h3 class="text-lg font-medium text-gray-900">{{$product->name}}</h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            En stock : 
                                            @foreach ($product->stocks as $stock)
                                                @if ($stock->quantity > 0)
                                                    {{$stock->size->code}}
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                                        <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                                        <p class="relative text-lg font-semibold text-white">{{$product->price}}€</p>
                                    </div>
                                </div>
                                <div class="mt-6 flex items-center justify-center flex-row gap-1">
                                    <a href="#" wire:click="addToCart({{$product->id}})" class="relative  bg-indigo-500 border border-transparent rounded-md py-2 px-8 text-sm font-medium text-white hover:bg-indigo-400">{{__('Add to cart')}}<span class="sr-only">, {{$product->name}}</span></a>
                                    <a href="{{route('shop.product.show', $product->id)}}" class="relative  bg-gray-100 border border-transparent rounded-md py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">{{__('View details')}}<span class="sr-only">, {{$product->name}}</span></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                
                
                <!-- /End replace -->
            </div>
        </div>
    </main>
</div>