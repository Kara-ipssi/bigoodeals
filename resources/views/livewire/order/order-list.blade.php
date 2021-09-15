<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">{{__('Orders list')}}</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="table-responsive">
                    <div class="pt-2 relative mx-auto text-gray-600 flex flex-row-reverse mr-6 mb-2">
                        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                            type="search"
                            name="search"
                            placeholder="Rechercher"
                            wire:model="search">
                    </div>
                    <table class="table info-table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">{{__('Customer')}}</th>
                                <th class="text-center">{{__('Order number')}}</th>
                                <th class="text-center">{{__('Purchased on')}}</th>
                                <th class="text-center">{{__('Order price')}}</th>
                                <th class="text-center">{{__('Order status')}}</th>
                                <th class="text-center">{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="text-center">{{$order->user->name}}</td>
                                    <td class="text-center">{{$order->number}}</td>
                                    <td class="text-center">{{$order->created_at}}</td>
                                    <td class="text-center">{{$order->cart->total}}.00 €</td>
                                    <td class="text-center">
                                        @if($order->state->id === 3 ) {{-- Validée --}}
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800">
                                                {{$order->state->name}}
                                            </span>
                                        @else
                                            @if($order->state->id === 4 )  {{-- En preparation --}}
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-yellow-100 text-yellow-800">
                                                    {{$order->state->name}}
                                                </span>
                                            @else                          {{-- Expédiée --}}
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-purple-100 text-purple-800">
                                                    {{$order->state->name}}
                                                </span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button wire:click="changeState({{$order->id}},3)" class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800"> Validée </button>
                                        <button wire:click="changeState({{$order->id}},4)" class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-yellow-100 text-yellow-800"> En préparation </button>
                                        <button wire:click="changeState({{$order->id}},5)" class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-purple-100 text-purple-800"> Expédiée </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody> 
                    </table> 
                </div>
                {{$orders->links()}}
            </div>
        </div>
    </div>
</div>
