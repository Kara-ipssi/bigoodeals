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
        </div>
    </x-slot>
</x-app-layout>
