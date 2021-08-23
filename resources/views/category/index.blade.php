<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories list') }}
        </h2>
    </x-slot>

    <x-slot name="breadcrumb">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 form-body ">
            <nav class="bg-grey-light p-3 rounded font-sans w-full border-2 border-opacity-10 border-indigo-600">
                <ol class="list-reset flex text-grey-dark">
                    <li><a href="{{route('dashboard')}}" class="text-blue ">{{ __('Dashboard')}}</a></li>
                    <li><span class="mx-2">></span></li>
                    <li><a href="{{route('categories.index')}}" class="text-blue font-bold">{{ __('Categories') }}</a></li>
                </ol>
            </nav>
        </div>
    </x-slot>


    <x-slot name="slot">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 form-body">
            <h1 class="mt-3" style="font-size: 32px; font-weight: bold"> {{ __('Categories list') }} </h1>

            <div class="flex flex-col">
                <div class="py-3">
                    <a href="{{route('categories.create')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Add') }}
                    </a>
                </div>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <livewire:category-list/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
