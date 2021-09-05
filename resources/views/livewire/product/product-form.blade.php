<div class="col-lg-12">
    
    <div class="grid">
        <p class="grid-header"> {{__('Add')}}</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <form wire:submit.prevent="saveProduct">
                    @csrf
                    {{-- <div class="px-4 py-5 bg-white sm:p-6">
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
                                @if (!empty($images))
                                    Photo Preview :
                                    <div class="flex flex-wrap">
                                        @foreach($images as $image)
                                            <div><img class="col-span-4 sm:col-span-4 lg:col-span-4 m-1" width="200" src="{{ $image->temporaryUrl() }}"></div>
                                        @endforeach
                                    </div>
                                @endif
                                <label class="block text-sm font-medium text-gray-700">Upload images</label>
                                <input type="file" wire:model="images" multiple>
                                @error('images.*') <span class="error">{{ $message }}</span> @enderror
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
            
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Add') }}
                        </button>
                    </div> --}}
                    
                </form>
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <form class="forms-sample" wire:submit.prevent="saveProduct">
                            @csrf
                            <div class="form-group row">
                                <div class="col">
                                    <label for="reference">{{__('Reference')}}</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            {{-- <div class="input-group-text">REF</div> --}}
                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                REF
                                            </span>
                                        </div>
                                        {{-- <input type="number" wire:model.defer="reference" id="reference" class="form-control enable-mask number-mask" placeholder="0000" /> --}}
                                        <input wire:model="dataref" type="text" name="reference" id="reference" autocomplete="given-reference" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="0000">
                                        @error('reference') <span class="error">{{ $message }}</span> @enderror
                                        @error('dataref') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="name">{{__('Name')}}</label>
                                    <div class="input-group">
                                        <input type="text" wire:model="name" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="" />
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col">
                                    <label for="price">{{__('Price')}}</label>
                                    <div class="input-group">
                                        <input type="number" wire:model="price" id="price" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="" />
                                        @error('price') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="stripe_price">{{__('Stripe price')}}</label>
                                    <div class="input-group">
                                        <input type="text" wire:model.defer="stripe_price" id="stripe_price" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="" />
                                        @error('stripe_price') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col">
                                    <label for="description">{{ __('Description')}}</label>
                                    <div class="mt-1">
                                        <textarea wire:model="description" 
                                            id="maxlength-textarea" 
                                            name="description" 
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" 
                                            placeholder="Informations supplémentaires" 
                                            maxlength="500"
                                            rows="5" ></textarea>

                                        @error('description') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            @if (!empty($categories))
                                <div class="form-group row mb-0">
                                    <div class="col">
                                        <label for="inputType12">{{__('Categories')}} sélectionnés</label>
                                        <div class="showcase_content_area">
                                            <div class="form-group shadow-sm h-20 rounded-sm p-1">
                                                @foreach ($categories as $category)
                                                    <span class="my-2 ml-2 inline-flex rounded-full items-center py-0.5 pl-2.5 p-2 text-sm font-medium bg-indigo-100 text-indigo-700">
                                                        {{$category['name']}}
                                                        <a href="javascript:void(0)" wire:click="cancelAddCategory({{$category['id']}})" type="button" class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-indigo-400 hover:bg-indigo-200 hover:text-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-white">
                                                            <span class="sr-only">Remove large option</span>
                                                            <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                                                            </svg>
                                                        </a>
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row mb-0">
                                <div class="col">
                                    <label for="js-select-example">{{__('Categories')}}</label>
                                    <div class="showcase_content_area">
                                        <div class="form-group shadow-sm h-20 rounded-sm p-1 ">
                                            @foreach($categoriesList as $category)
                                                <a 
                                                    href="javascript:void(0)" 
                                                    wire:click="addCategory({{$category->id}})" 
                                                    value="{{$category->id}}"
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xm font-medium bg-gray-100 text-gray-800"
                                                >
                                                    {{$category->name}}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col">
                                    <label class="block font-medium text-gray-700">Ajout de l'image</label>
                                    <div class="input-group">
                                        <input type="file" wire:model="images" multiple>
                                        @error('images.*') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-primary">{{__("Add")}}</button>
                            </div>
                            @if (!empty($images))
                                <div class="form-group row">
                                    @foreach ($images as $image)
                                        <div class="m-1"> <img src="{{$image->temporaryUrl()}}" width="200" alt="Image"> </div>
                                    @endforeach
                                </div>
                            @endif
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
