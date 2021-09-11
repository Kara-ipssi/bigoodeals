<div class="col-lg-12">
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
    <div class="grid">
        <p class="grid-header">{{$editMode === true ? 'Modification' : __('Add')}}</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <form wire:submit.prevent="saveCategory">
                    @csrf
                    <div class="form-group row showcase_row_area">
                        <div class="col-md-2 showcase_text_area">
                            <label for="name" class="block font-medium text-gray-700">{{__("Name")}}</label>
                        </div>
                        <div class="col-md-10 showcase_content_area">
                            <input type="text" class="form-control focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="name" wire:model="name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row showcase_row_area">
                        <div class="col-md-2 showcase_text_area">
                            <label for="description" class="block font-medium text-gray-700">{{__("Description")}}</label>
                            @error('description') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-10 showcase_content_area">
                            <textarea 
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" 
                                id="maxlength-textarea" 
                                cols="12" 
                                rows="5"
                                maxlength="500"
                                wire:model="description" 
                                placeholder="informations supplémentaires">
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group row showcase_row_area">
                        <div class="col-md-2 showcase_text_area">
                            <label class="block font-medium text-gray-700">Ajout de l'image</label>
                        </div>
                        <div class="col-md-10 showcase_content_area mb-1">
                            <input type="file" wire:model="{{$editMode === true ? 'newImage' : 'image'}}">
                            @error('image.*') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-2 "></div>
                        <div class="col-md-10 showcase_content_area">
                            <div class="flex flex-wrap ">
                                @if (!empty($image) && $editMode === false)
                                    <div>
                                        Prévisualisation de l'image :
                                        <img class="m-2" width="180" src="{{ $image->temporaryUrl() }}">
                                    </div>
                                @endif
                                @if ($editMode === true)
                                        <div>
                                            image actuelle :
                                            <img class="m-2" width="180" src="{{ $currentImageURL }}">
                                        </div>
                                    @if ($newImage !== null)
                                        <div>
                                            Nouvelle image :
                                            <img class="m-2" width="180" src="{{ $newImage->temporaryUrl() }}">
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        @if ($editMode === true)
                            <a wire:click="cancelEdit()" class="btn btn-sm btn-secondary cursor-pointer">{{__("Cancel")}}</a>
                            <a wire:click="updateCategory()" class="btn btn-sm btn-success cursor-pointer">{{__("Update")}}</a>
                        @else
                            <button type="submit" class="btn btn-sm btn-primary">{{__("Add")}}</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
