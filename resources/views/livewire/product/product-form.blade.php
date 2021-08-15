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

            {{--<div class="col-span-6 sm:col-span-3 lg:col-span-4">
                <label for="toggle_1" class="block text-sm font-medium text-gray-700">{{ __('Ce produit possède t-il des tailles ? ') }}</label>
                <input class="hidden" type="checkbox" id="toggle_1" wire:model="hasSize">
                <label class="flex items-center justify-start w-10 border border-black h-6 p-1 rounded-full cursor-pointer" for="toggle_1">
                    <span class="w-4 h-4 bg-black rounded-full"></span>
                </label>
            </div>--}}



            <div class="col-span-6 sm:col-span-6 lg:col-span-12">
                <label for="tags" class="block text-sm font-medium text-gray-700">{{ __('Tags')}}</label>
                <div class="mt-1">
                    <textarea id="tags" name="tags" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="tags of your product here"></textarea>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-6 lg:col-span-12">
                <label for="category" class="block text-sm font-medium text-gray-700">{{ __('Category')}}</label>
                <div class="mt-1">
                    <textarea id="category" name="category" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Category of your product here">
                    </textarea>
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

<!-- Component Start -->

<!-- Component End

<style>
    input[type="checkbox"]:checked + label {
        justify-content: flex-end;
        background-color: darkgreen;
    }

    input[type="checkbox"]:checked + label span {
        background-color: white;
    }

</style>

-->
