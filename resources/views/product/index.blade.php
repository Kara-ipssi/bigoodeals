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
                    <li><a href="{{route('dashboard')}}" class="text-blue ">{{ __('Dashboard')}}</a></li>
                    <li><span class="mx-2">></span></li>
                    <li><a href="{{route('products.index')}}" class="text-blue font-bold">{{ __('Products') }}</a></li>
                </ol>
            </nav>
        </div>
    </x-slot>


    <x-slot name="slot">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 form-body">
            <h1 class="mt-3" style="font-size: 32px; font-weight: bold"> {{ __('Products list') }} </h1>

            <div class="flex flex-col">
                <div class="py-3">
                    <a href="{{route('products.create')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Add') }}
                    </a>
                </div>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <livewire:product-list/>
                            {{--<table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Reference') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Name') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Price') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Stripe price') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Add date') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Stock') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$product->reference}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$product->name}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$product->price}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$product->stripe_price}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$product->created_at}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                @foreach($product->stocks as $stock)
                                                    {{$stock->quantity}}
                                                @endforeach
                                            </div>
                                        </td>

                                        --}}{{--<td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              Active
                                            </span>
                                        </td>--}}{{--
                                        --}}{{--<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              Admin
                                            </span>
                                        </td>--}}{{--
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <a href="{{route('products.show', $product->id)}}" class="text-indigo-600 hover:text-indigo-900">{{ __('Show') }}</a>
                                            <a href="{{route('products.edit', $product->id)}}" class="text-yellow-600 hover:text-yellow-900">{{ __('Edit') }}</a>
                                            <a href="#" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</a>
                                        </td>
                                    </tr>
                                @endforeach

                                <!-- More people... -->
                                </tbody>
                            </table>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>


    <x-slot name="scripts">
        <script>

        </script>
    </x-slot>

</x-app-layout>
