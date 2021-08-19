<div>
     <form wire:submit.prevent="saveProduct">
        @csrf
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3 lg:col-span-6" >
                    <label for="reference" class="block text-sm font-medium text-gray-700">{{ __('Reference') }}</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        REF
                      </span>
                        <input wire:model="dataref" type="text" name="reference" id="reference" autocomplete="given-reference" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="0000">
                    </div>
                    @error('reference') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input wire:model="name" type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-12">
                    <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description')}}</label>
                    <div class="mt-1">
                        <textarea wire:model="description" id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="some infos of yours product"></textarea>
                    </div>
                </div>


                <div class="col-span-6 sm:col-span-3 lg:col-span-6">
                    <label for="price" class="block text-sm font-medium text-gray-700">{{ __('Price') }}</label>
                    <input wire:model="price" type="number" name="price" id="price" autocomplete="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('price') <span class="error">{{ $message }}</span> @enderror
                </div>


                <div class="col-span-6 sm:col-span-3 lg:col-span-6">
                    <label for="stripe_price" class="block text-sm font-medium text-gray-700">{{ __('Stripe price') }}</label>
                    <input wire:model="stripe_price" type="text" name="stripe_price" id="stripe_price" autocomplete="stripe_price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('stripe_price') <span class="error">{{ $message }}</span> @enderror
                </div>


                <div class="col-span-12 sm:col-span-12 lg:col-span-12">
                    @if (!empty($photos))
                        Photo Preview:
                        <div class="flex flex-wrap">
                            @foreach($photos as $photo)
                                <div><img class="col-span-4 sm:col-span-4 lg:col-span-4" width="200" src="{{ $photo->temporaryUrl() }}"></div>
                            @endforeach
                        </div>
                    @endif
                    <label class="block text-sm font-medium text-gray-700">Upload images</label>
                    <input type="file" wire:model="photos" multiple>
                    @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                </div>

                {{--<div class="col-span-6 sm:col-span-3 lg:col-span-4">
                    <label for="toggle_1" class="block text-sm font-medium text-gray-700">{{ __('Ce produit possède t-il des tailles ? ') }}</label>
                    <input class="hidden" type="checkbox" id="toggle_1" wire:model="hasSize">
                    <label class="flex items-center justify-start w-10 border border-black h-6 p-1 rounded-full cursor-pointer" for="toggle_1">
                        <span class="w-4 h-4 bg-black rounded-full"></span>
                    </label>
                </div>--}}



                {{--<div class="col-span-6 sm:col-span-6 lg:col-span-12">
                    <label for="tags" class="block text-sm font-medium text-gray-700">{{ __('Tags')}}</label>
                    <!--tags-->

                    @if(!empty($tags))
                        @foreach($tags as $tag)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{$tag}}
                            </span>
                        @endforeach
                    @endif
                    <br>
                    <a wire:click="setDeleteModalVisibilityToFixed" class="inline-flex justify-center cursor-pointer py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{__('Tags')}}
                    </a>
                    --}}{{--<div class="mt-1">
                        <input id="tags" type="text" name="tags" autocomplete="tags"  placeholder="tags of your product here" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>--}}{{--
                </div>--}}

                {{--<div class="col-span-6 sm:col-span-6 lg:col-span-12">
                    <label for="category" class="block text-sm font-medium text-gray-700">{{ __('Category')}}</label>
                    <div class="mt-1">
                        <input id="category" type="text" name="category" autocomplete="category" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Category of your product here">
                    </div>
                </div>--}}

            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Add') }}
            </button>
        </div>

    </form>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="{{$modalVisibility}} z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Suppresion du produit
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Voulez vous vraiment supprimer ce produit? Toutes les données associées seront perdues. Cette action est irréversible.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" wire:click="" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        {{__('Delete')}}
                    </button>
                    <button type="button" wire:click="setDeleteModalVisibilityToHidden" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        {{__('Cancel')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
