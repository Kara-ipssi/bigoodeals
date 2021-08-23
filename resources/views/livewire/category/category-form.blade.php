<div>
    <form wire:submit.prevent="saveCategory">
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
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Add') }}
            </button>
        </div>
    </form>

    <!-- This example requires Tailwind CSS v2.0+ -->
    {{--<div class="{{$categoryModalVisibility}} z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fa fa-gear"> </i>
                        </div>

                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Nouvelle catégorie ?
                        </h3>
                        <div class="mt-6">
                            <p class="text-sm text-gray-500">
                            <form>
                                @csrf
                                <div class="col-span-12 sm:col-span-12 lg:col-span-12">
                                    <label for="price" class="block text-sm font-medium text-gray-700">{{ __('Price') }}</label>
                                    <input wire:model="price" type="number" name="price" id="price" autocomplete="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @error('price') <span class="error">{{ $message }}</span> @enderror
                                </div>


                                <div class="col-span-12 sm:col-span-12 lg:col-span-12">
                                    <label for="stripe_price" class="block text-sm font-medium text-gray-700">{{ __('Stripe price') }}</label>
                                    <input wire:model="stripe_price" type="text" name="stripe_price" id="stripe_price" autocomplete="stripe_price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @error('stripe_price') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </form>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" wire:click="" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        {{__('Delete')}}
                    </button>
                    <button type="button" wire:click="setCategoryModalVisibilityToHidden" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        {{__('Cancel')}}
                    </button>
                </div>
            </div>
        </div>
    </div>--}}
</div>
