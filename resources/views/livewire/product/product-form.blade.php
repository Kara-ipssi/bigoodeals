<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">{{$editMode === true ? 'Modification' : __('Add')}}</p>
        <div class="grid-body">
            <div class="item-wrapper"> 
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <form class="forms-sample" wire:submit.prevent="saveProduct">
                            @csrf
                            <div class="form-group row mb-3">
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
                                        <input 
                                            wire:model="dataref" 
                                            type="text" 
                                            name="reference" 
                                            id="reference"  
                                            autocomplete="given-reference" 
                                            class="{{$editMode === true ? 'bg-gray-100 cursor-not-allowed' : '' }} focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" 
                                            placeholder="0000"
                                            {{$editMode === true ? 'disabled' : '' }}
                                        >
                                    </div>
                                    @error('reference') <span class="error text-red-600">{{ $message }}</span> @enderror
                                    @error('dataref') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="col">
                                    <label for="name">{{__('Name')}}</label>
                                    <input type="text" wire:model="name" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="" />
                                    @error('name') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col">
                                    <label for="price">{{__('Price')}}</label>
                                    <input type="number" wire:model="price" id="price" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="" />
                                    @error('price') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col">
                                    <label for="description">{{ __('Description')}}</label>
                                    <div>
                                        <textarea wire:model="description" 
                                            id="maxlength-textarea" 
                                            name="description" 
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" 
                                            placeholder="Informations supplémentaires" 
                                            maxlength="500"
                                            rows="5" ></textarea>

                                        @error('description') <span class="error text-red-600">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            @if (!empty($categories))
                                <div class="form-group row mb-0">
                                    <div class="col">
                                        <label for="inputType12">{{__('Categories')}} sélectionnés</label>
                                        <div class="showcase_content_area">
                                            <div class="form-group shadow-sm h-auto rounded-sm p-1 mx-auto">
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
                            <div class="form-group row mb-3">
                                <div class="col">
                                    <label for="js-select-example">{{__('Categories')}}</label>
                                    <div class="showcase_content_area">
                                        <div class="form-group shadow-sm rounded-sm p-1 mx-auto h-auto}}">
                                            @foreach($categoriesList as $category)
                                                <a 
                                                    href="javascript:void(0)" 
                                                    wire:click="addCategory({{$category->id}})" 
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xm font-medium bg-gray-100 text-gray-800 m-1"
                                                >
                                                    {{$category->name}}
                                                </a>
                                            @endforeach
                                        </div>
                                        @error('categories') <span class="error text-red-600">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                {{-- <div class="col-3 mt-2">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="size" wire:model="size">
                                        <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                                    </div>
                                </div> --}}
                                <div class="col mt-1.5">
                                    <label for="sizeType" class="block text-sm font-medium text-gray-700">Sélectionnez le type de taille de votre produit</label>
                                    <select 
                                        id="sizeType" 
                                        name="sizeType"
                                        wire:model="sizeType"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                    >
                                        @foreach ($sizesTypesList as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="js-select-example">{{__('Quantity')}}</label>
                                    <input 
                                        type="number" 
                                        wire:model.lazy="quantity"
                                        id="quantity"
                                        name="quantity" 
                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                    />
                                    @error('quantity') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col">
                                    <label class="block font-medium text-gray-700">Ajout des images</label>
                                    <div class="input-group">
                                        <input type="file" wire:model="{{$editMode === true ? 'newImages' : 'images'}}" multiple>
                                    </div>
                                    @error('images.*') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @if (!empty($images) && $editMode === false)
                            Prévisualisation des images :
                                <div class="form-group row">
                                    @foreach ($images as $image)
                                        <div class="m-1"> <img src="{{$image->temporaryUrl()}}" width="200" alt="Image"> </div>
                                    @endforeach
                                </div>
                            @endif
                            @if ($editMode === true)
                                images actuelles :
                                <div class="form-group row">
                                    @foreach ($currentsImages as $image)
                                        <div class="m-1"> <img src="{{$image->image_url}}" width="200" alt="Image"> </div>
                                    @endforeach
                                </div>
                                @if (!empty($newImages))
                                    Nouvelles Images :
                                    <div class="form-group row">
                                        @foreach ($newImages as $img)
                                            <div class="m-1"> <img src="{{$img->temporaryUrl()}}" width="200" alt="Image"> </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endif
                            
                            <div class="text-right">
                                @if ($editMode === true)
                                    <a wire:click="cancelEdit()" class="btn btn-sm btn-secondary cursor-pointer">{{__("Cancel")}}</a>
                                    <a wire:click="updateProduct()" class="btn btn-sm btn-success cursor-pointer">{{__("Update")}}</a>
                                @else
                                    <button type="submit" class="btn btn-sm btn-primary">{{__("Add")}}</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if($editMode === true)
            <div class="bg-green-600" id="successMessage">
                <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between flex-wrap">
                        <div class="w-0 flex-1 flex items-center">
                            <span class="flex p-2 rounded-lg bg-green-800">
                                <!-- Heroicon name: outline/speakerphone -->
                                {{-- <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                </svg> --}}
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor" aria-hidden="true">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <p class="ml-3 font-medium text-white truncate">
                                <span>
                                    Mode édition
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
