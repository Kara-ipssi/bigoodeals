<div>
     <form wire:submit.prevent="saveProduct">
        @csrf
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6 lg:col-span-6" >
                    <label for="reference" class="block text-sm font-medium text-gray-700">{{ __('Reference') }}</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        REF
                      </span>
                        <input wire:model="dataref" type="text" name="reference" id="reference" autocomplete="given-reference" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="0000">
                    </div>
                    @error('reference') <span class="error">{{ $message }}</span> @enderror
                    @error('dataref') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input wire:model="name" type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-12 sm:col-span-12 lg:col-span-12">
                    <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description')}}</label>
                    <div class="mt-1">
                        <textarea wire:model="description" id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="some infos of yours product"></textarea>
                    </div>
                </div>


                <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                    <label for="price" class="block text-sm font-medium text-gray-700">{{ __('Price') }}</label>
                    <input wire:model="price" type="text" name="price" id="price" autocomplete="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('price') <span class="error">{{ $message }}</span> @enderror
                </div>


                <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                    <label for="stripe_price" class="block text-sm font-medium text-gray-700">{{ __('Stripe price') }}</label>
                    <input wire:model="stripe_price" type="text" name="stripe_price" id="stripe_price" autocomplete="stripe_price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('stripe_price') <span class="error">{{ $message }}</span> @enderror
                </div>


                <div class="col-span-12 sm:col-span-12 lg:col-span-12">
                    @if (!empty($photos))
                        Photo Preview :
                        <div class="flex flex-wrap">
                            @foreach($photos as $photo)
                                <div><img class="col-span-4 sm:col-span-4 lg:col-span-4 m-1" width="200" src="{{ $photo->temporaryUrl() }}"></div>
                            @endforeach
                        </div>
                    @endif
                    <label class="block text-sm font-medium text-gray-700">Upload images</label>
                    <input type="file" wire:model="photos" multiple>
                    @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-12 sm:col-span-12 lg:col-span-12">
                    <label for="country" class="block text-sm font-medium text-gray-700">{{__('Categories')}}</label>
                    <select id="categories" wire:model="categories" name="categories" autocomplete="categories" multiple class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($categoriesList as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('categories') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-span-3 sm:col-span-3 lg:col-span-3">
                    <a wire:click="setCategoryModalVisibilityToFixed" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                        <i class="fa fa-plus-circle mt-1 mr-1"> </i> {{__('New category')}}
                    </a>
                </div>


            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Add') }}
            </button>
        </div>
    </form>
</div>
