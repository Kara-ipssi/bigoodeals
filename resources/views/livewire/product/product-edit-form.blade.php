<form wire:submit.prevent="updateProduct">
    @csrf
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3 lg:col-span-6" >
                <label for="reference" class="block text-sm font-medium text-gray-700">{{ __('Reference') }}</label>
                <input type="text" name="reference" id="reference" wire:model="reference" disabled class="mt-1 focus:ring-indigo-500 lg:hover:bg-gray-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-700 rounded-md">
                @error('reference') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6 sm:col-span-3 lg:col-span-6">
                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                <input type="text" name="name" id="name" wire:model="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6 sm:col-span-6 lg:col-span-12">
                <label for="email-address" class="block text-sm font-medium text-gray-700">{{ __('Description')}}</label>
                <div class="mt-1">
                    <textarea wire:model="description" id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="some infos of yours product"></textarea>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-3 lg:col-span-6">
                <label for="price" class="block text-sm font-medium text-gray-700">{{ __('Price') }}</label>
                <input type="number" name="price" id="price" wire:model="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('price') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6 sm:col-span-3 lg:col-span-6">
                <label for="stripe_price" class="block text-sm font-medium text-gray-700">{{ __('Stripe price') }}</label>
                <input type="text" name="stripe_price" id="stripe_price" wire:model="stripe_price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('stripe_price') <span class="error">{{ $message }}</span> @enderror
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
        <a href="{{route("products.index")}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ __('Cancel') }}
        </a>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ __('Edit') }}
        </button>
    </div>
</form>
