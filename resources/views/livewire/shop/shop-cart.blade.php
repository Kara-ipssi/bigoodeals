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
                            {{__('Shopping cart')}}
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
                                    
                                    @auth
                                        @if(count($cart->items)>0)
                                            @foreach ($cart->items as $cartContent)
                                                <li class="py-6 flex">
                                                    <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                                        <img src="{{$cartContent->product->images[0]->image_url}}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="w-full h-full object-center object-cover">
                                                    </div>
                                
                                                    <div class="ml-4 flex-1 flex flex-col">
                                                        <div>
                                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                                <a href="#">
                                                                {{$cartContent->product->name}}
                                                                </a>
                                                            </h3>
                                                            <p class="ml-4">
                                                                {{$cartContent->product->price}}.00€ {{-- <span class="text-sm">HT</span> --}}
                                                            </p>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-500">
                                                            Taille : {{$cartContent->size->code}}
                                                        </p>
                                                    </div>
                                                    <div class="flex-1 flex items-end justify-between text-sm">
                                                        <p class="text-gray-500">
                                                        Qté {{$cartContent->quantity}}
                                                        </p>
                                
                                                        <div class="flex">
                                                            <button wire:click="removeItem({{$cartContent->id}})" type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    @else 
                                    <li class="py-6 flex">
                                        <div class="ml-4 flex-1 flex flex-col">
                                            {{__('Please log in or Sign In Before')}}
                                        </div>
                                    </li>
                                    @endauth
                
                                <!-- More products... -->
                                </ul>
                            </div>
                        </div>
                    </div>
        
                    @auth
                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>{{__('Total')}}</p>
                                <p>{{$total}}.00 € <span class="text-sm">TTC<span></p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                            <div class="mt-6">
                                <a href="#" class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">{{__('Checkout')}}</a>
                            </div>
                            <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
                                <p>
                                    or <button @click="isShow = !isShow" type="button" class="text-indigo-600 font-medium hover:text-indigo-500">{{__('Continue Shopping')}}<span aria-hidden="true"> &rarr;</span></button>
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                            
                            <div class="mt-6">
                                <a href="{{route('login')}}" class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">{{__('Log In')}}</a>
                            </div>
                            <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
                                <p>
                                    {{__('or')}} <a href="{{route('register')}}" class="text-indigo-600 font-medium hover:text-indigo-500">{{__('Register')}}<span aria-hidden="true"> &rarr;</span></a>
                                </p>
                            </div>
                        </div> 
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>