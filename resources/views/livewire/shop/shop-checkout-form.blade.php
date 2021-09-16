<div class="bg-gray-50">
    <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">{{__('Checkout')}}</h2>
    
        <form wire:submit.prevent="saveInfos()" {{-- action="{{route('shop.stripe')}}" method="POST" --}} class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
            @csrf
            @method('POST')
            <div>
                <div>
                    <h2 class="text-lg font-medium text-gray-900">{{__('Contact information')}}</h2>
            
                    <div class="mt-4">
                        <label for="email-address" class="block text-sm font-medium text-gray-700">{{__('Email address')}}</label>
                        <div class="mt-1">
                        <input type="email" id="email-address" wire:model="email" name="email-address" autocomplete="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        @error('email') <span class="text-red-400 error">{{ $message }}</span> @enderror
                    </div>
                </div>
        
                <div class="mt-10 border-t border-gray-200 pt-10">
                    <h2 class="text-lg font-medium text-gray-900">{{__('Shipping information')}}</h2>
            
                    {{-- <div class="sm:col-span-2 mt-3">
                        <label for="" class="block text-sm font-medium text-gray-700">{{__('My address')}}</label>
                        <div class="mt-1">
                            <select id="adressList" name="" autocomplete="" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option> Choisissez parmis vos adresses de livraisons </option>
                                @if (count($addressList) > 0)
                                    @foreach($addressList as $address)
                                        <option> {{$address->name}}<option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @error('country') <span class="text-red-400 error">{{ $message }}</span> @enderror
                    </div> --}}

                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                        <div>
                            <label for="first-name" class="block text-sm font-medium text-gray-700">{{__('Firstname')}}</label>
                            <div class="mt-1">
                                <input type="text" id="first-name" name="first-name" wire:model="firstname" autocomplete="given-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('firstname') <span class="text-red-400 error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-medium text-gray-700">{{__('Lastname')}}</label>
                            <div class="mt-1">
                                <input type="text" id="last-name" wire:model="lastname" name="last-name" autocomplete="family-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('lastname') <span class="text-red-400 error">{{ $message }}</span> @enderror
                        </div>
            
                        <div class="sm:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">{{__('Address')}}</label>
                            <div class="mt-1">
                                <input type="text" name="address" wire:model="street" id="address" autocomplete="street-address" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('street') <span class="text-red-400 error">{{ $message }}</span> @enderror
                        </div>
            
                        <div class="sm:col-span-2">
                            <label for="apartment" class="block text-sm font-medium text-gray-700">{{__('Apartment, suite, etc.')}}</label>
                            <div class="mt-1">
                                <input type="text" name="apartment" wire:model="more_info" id="apartment" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('more_info') <span class="text-red-400 error">{{ $message }}</span> @enderror
                        </div>
            
                        <div class="sm:col-span-1">
                            <label for="postal-code" class="block text-sm font-medium text-gray-700">{{__('Postal code')}}</label>
                            <div class="mt-1">
                                <input type="text" name="postal-code" wire:model="postal_code" id="postal-code" autocomplete="postal-code" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('postal_code') <span class="text-red-400 error">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="city" class="block text-sm font-medium text-gray-700">{{(__('City'))}}</label>
                            <div class="mt-1">
                                <input type="text" name="city" wire:model="city" id="city" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('city') <span class="text-red-400 error">{{ $message }}</span> @enderror
                        </div>
            

                        <div class="sm:col-span-2">
                            <label for="country" class="block text-sm font-medium text-gray-700">{{__('Country')}}</label>
                            <div class="mt-1">
                                <select id="country" wire:model="country" name="country" autocomplete="country" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option> Choisissez un pays </option>
                                    <option value="France" selected>France</option>
                                    <option value="Belgique">Belgique</option>
                                </select>
                            </div>
                            @error('country') <span class="text-red-400 error">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">{{__('Phone')}}</label>
                            <div class="mt-1">
                                <input type="number" name="phone" wire:model="phone" id="phone" autocomplete="tel" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('phone') <span class="text-red-400 error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
        
                <div
                    x-data="{
                        standard:true,
                        express:false,
                        toggleStandard(){
                            this.standard = true,
                            this.express = false
                        },
                        toggleExpress(){
                            this.express = true,
                            this.standard = false
                        }
                    }" 
                    class="mt-10 border-t border-gray-200 pt-10">
                    <fieldset>
                        <legend class="text-lg font-medium text-gray-900">
                            {{__('Delivery method')}}
                        </legend>
            
                        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <!--
                                Checked: "border-transparent", Not Checked: "border-gray-300"
                                Active: "ring-2 ring-indigo-500"
                            -->
                            <label
                                
                                :class="{'ring-2 ring-indigo-500':standard, '' : !standard}"
                                class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                                <input type="radio" @click="toggleStandard()" wire:model="delivery" name="delivery-method" value="5" class="sr-only" aria-labelledby="delivery-method-0-label" aria-describedby="delivery-method-0-description-0 delivery-method-0-description-1">
                                <div class="flex-1 flex">
                                    <div class="flex flex-col">
                                        <span id="delivery-method-0-label" class="block text-sm font-medium text-gray-900">
                                        Standard
                                        </span>
                                        <span id="delivery-method-0-description-0" class="mt-1 flex items-center text-sm text-gray-500">
                                        4–10 {{__('business days')}}
                                        </span>
                                        <span id="delivery-method-0-description-1" class="mt-6 text-sm font-medium text-gray-900">
                                        5.00 €
                                        </span>
                                    </div>
                                </div>
                                <svg
                                    x-show="standard" 
                                    class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <div
                                    :class="{'border-indigo-500 border':standard, 'border-transparent border-2':!standard}" 
                                    class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                            </label>
                        </div>
                        @error('delivery') <span class="text-red-400 error">{{ $message }}</span> @enderror
                    </fieldset>
                </div>
            </div>
    
            <!-- Order summary -->
            <div class="mt-10 lg:mt-0">
                <div class="sticky top-9">
                    <h2 class="text-lg font-medium text-gray-900">{{__('Order summary')}}</h2>
            
                    <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <h3 class="sr-only">{{__('Items in your cart')}}</h3>
                        <ul role="list" class="divide-y divide-gray-200">
                            @auth
                                @if(count($cart->items) > 0)
                                    @foreach($cart->items as $item)
                                        <li class="flex py-6 px-4 sm:px-6">
                                            <div class="flex-shrink-0">
                                                <img src="{{$item->product->images[0]->image_url}}" alt="Front of men&#039;s Basic Tee in black." class="w-20 rounded-md">
                                            </div>
                                
                                            <div class="ml-6 flex-1 flex flex-col">
                                                <div class="flex">
                                                    <div class="min-w-0 flex-1">
                                                        <h4 class="text-sm">
                                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">
                                                                {{$item->product->name}}
                                                            </a>
                                                        </h4>
                                                        <p class="mt-1 text-sm text-gray-500">
                                                            {{$item->size->code}}
                                                        </p>
                                                    </div>
                                    
                                                    <div class="ml-4 flex-shrink-0 flow-root">
                                                        <button type="button" class="-m-2.5 bg-white p-2.5 flex items-center justify-center text-gray-400 hover:text-gray-500">
                                                        <span class="sr-only">{{__('Remove')}}</span>
                                                        <!-- Heroicon name: solid/trash -->
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                
                                                <div class="flex-1 pt-2 flex items-end justify-between">
                                                <p class="mt-1 text-sm font-medium text-gray-900">{{$item->product->price}}.00€</p>
                                
                                                <div class="ml-4">
                                                    <label for="quantity" class="sr-only">{{__('Quantity')}}</label>
                                                    
                                                        <span>{{__('Qté')}}</span>
                                                        : <span>{{$item->quantity}}</span>
                                                </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            @endauth
                
                            <!-- More products... -->
                        </ul>
                        <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">
                                    {{__('Subtotal')}}
                                </dt>
                                <dd class="text-sm font-medium text-gray-900">
                                    {{$subtotal}}.00 €
                                </dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">
                                    {{__('Shipping')}}
                                </dt>
                                <dd class="text-sm font-medium text-gray-900">
                                    {{$delivery}}.00 €
                                </dd>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                                <dt class="text-base font-medium">
                                    {{__('Total')}}
                                </dt>
                                <dd class="text-base font-medium text-gray-900">
                                    {{$cart->total}}.00 €
                                </dd>
                            </div>
                        </dl>
                
                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                            <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Régler la commande</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>