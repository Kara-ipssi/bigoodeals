<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">{{__('Add')}}</p>
        <div class="grid-body">
            <div class="item-wrapper">
                {{-- <form wire:submit.prevent="saveCategory">
                    @csrf
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
            
                            <div class="col-span-12 sm:col-span-12 lg:col-span-12">
                                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                                <input wire:model="name" type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
            
                            <div class="col-span-12 sm:col-span-12 lg:col-span-12">
                                <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description')}}</label>
                                <div class="mt-1">
                                    <textarea wire:model="description" id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="some infos of yours category here"></textarea>
                                    @error('description') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
            
                        </div>
                    </div>
                    <div class=" bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Add') }}
                        </button>
                    </div>
                </form> --}}
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
                    <div class="text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{__("Add")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
