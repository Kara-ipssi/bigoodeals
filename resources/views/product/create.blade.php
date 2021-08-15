<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products list') }}
        </h2>
    </x-slot>

    <x-slot name="breadcrumb">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 form-body ">
            <nav class="bg-grey-light p-3 rounded font-sans w-full border-2 border-opacity-10 border-indigo-600">
                <ol class="list-reset flex text-grey-dark">
                    <li><a href="{{route('dashboard')}}" class="text-black ">{{ __('Dashboard')}}</a></li>
                    <li><span class="mx-2">></span></li>
                    <li><a href="{{route('products.index')}}" class="text-black ">{{ __('Products') }}</a></li>
                    <li><span class="mx-2">></span></li>
                    <li><a href="{{route('products.create')}}" class="text-black font-bold">{{ __('Add') }}</a></li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 form-body ">
            <h1 class="mt-3" style="font-size: 32px; font-weight: bold"> {{ __('Products list') }} Ajout </h1>
            <livewire:product-form/>
            {{--<form action="{{route('products.store')}}" method="POST">
                @csrf
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3 lg:col-span-6" >
                            <label for="reference" class="block text-sm font-medium text-gray-700">{{ __('Reference') }}</label>
                            <input value="REF" required type="text" name="reference" id="reference" autocomplete="given-reference" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-12">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">{{ __('Description')}}</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="some infos of yours product"></textarea>
                            </div>
                        </div>



                        <div class="col-span-6 sm:col-span-3 lg:col-span-6">
                            <label for="price" class="block text-sm font-medium text-gray-700">{{ __('Price') }}</label>
                            <input type="number" name="price" id="price" autocomplete="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-6">
                            <label for="stripe_price" class="block text-sm font-medium text-gray-700">{{ __('Stripe price') }}</label>
                            <input type="text" name="stripe_price" id="stripe_price" autocomplete="stripe_price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-12">
                            <label for="tags" class="block text-sm font-medium text-gray-700">{{ __('Tags')}}</label>
                            <div class="mt-1">
                                <textarea id="tags" name="tags" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="tags of your product here"></textarea>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-12">
                            <label for="category" class="block text-sm font-medium text-gray-700">{{ __('Category')}}</label>
                            <div class="mt-1">
                                <textarea id="category" name="category" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Category of your product here"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Add') }}
                    </button>
                </div>
            </form>--}}
        </div>
    </x-slot>
</x-app-layout>
