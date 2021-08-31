<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">{{__('Add')}}</p>
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
                            <textarea class="form-control focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="description" cols="12" rows="5" wire:model="description"></textarea>
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
                                            <img class="m-2" width="180" src="/{{ $currentImageURL }}">
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
