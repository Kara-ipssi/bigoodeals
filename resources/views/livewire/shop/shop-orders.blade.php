
<div class="mt-6">
    {{$ordersList->links()}}
        @foreach ($ordersList as $order)
            <div class="px-4 space-y-2 sm:px-0 sm:flex sm:items-baseline sm:justify-between sm:space-y-0">
                <div class="flex sm:items-baseline sm:space-x-4">
                    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Commande #{{$order->number}}</h1>
                </div>
                <p class="text-sm text-gray-600">Date de la commande : <time datetime="2021-03-22" class="font-medium text-gray-900">{{$order->created_at}}</time></p>
                {{-- <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:hidden">View invoice<span aria-hidden="true"> &rarr;</span></a> --}}
            </div>
            <h2 class="sr-only">{{__('Orders list')}}</h2>
            <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
                <div class="py-6 px-4 sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">
                    <div class="sm:flex lg:col-span-7">

                        @foreach ($order->cart->items as $item)
                            <div class="ml-1 flex-shrink-0 w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden sm:aspect-none sm:w-40 sm:h-40">
                                <a href="{{route('shop.product.show', $item->product->id)}}" target="_blank" title="Aller au produit">
                                    <img src="{{$item->product->images[0]->image_url}}" alt="Insulated bottle with white base and black snap lid." class="w-full h-full object-center object-cover sm:w-full sm:h-full">
                                </a>
                            </div>
                        @endforeach
                    </div>
        
                    <div class="mt-6 lg:mt-0 lg:col-span-5">
                        <div class="mt-6 sm:mt-0 sm:ml-6">
                            <h2>Liste des produit :</h2>
                            <h3 class="text-base font-medium text-gray-900">
                                @foreach ($order->cart->items as $item)
                                    <a href="{{route('shop.product.show', $item->product->id)}}" target="_blank">{{$item->product->name}}</a>
                                @endforeach
                            </h3>
                            <p class="mt-2 text-sm font-medium text-gray-900">
                                Prix de la commande : {{$order->cart->total}}.00 €
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 py-6 px-4 sm:px-6 lg:p-8">
                    <h4 class="sr-only">{{__('State')}}</h4>
                    <p class="text-sm font-medium text-gray-900">Dernière mise à jour <time datetime="{{$order->updated_at}}">{{$order->updated_at}}</time></p>
                    <div class="mt-6" aria-hidden="true">
                        
                        @switch($order->state->id)
                            @case(3)
                                <div class="bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-2 bg-indigo-600 rounded-full" style="width: calc((1) / 8 * 100%);"></div>
                                </div>
                                <div class="hidden sm:grid grid-cols-4 text-sm font-medium text-gray-600 mt-6">
                                    <div class="text-indigo-600">Validée</div>
                                    <div class="text-center">En préparation</div>
                                    <div class="text-center">Expédiée</div>
                                    <div class="text-right">Livrée</div>
                                </div>
                                @break
                            @case(4)
                                <div class="bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-2 bg-indigo-600 rounded-full" style="width: calc((1 * 2 + 1) / 8 * 100%);"></div>
                                </div>
                                <div class="hidden sm:grid grid-cols-4 text-sm font-medium text-gray-600 mt-6">
                                    <div class="text-indigo-600">Validée</div>
                                    <div class="text-indigo-600 text-center">En préparation</div>
                                    <div class="text-center">Expédiée</div>
                                    <div class="text-right">Livrée</div>
                                </div>
                                @break
                            @case(5)
                                <div class="bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-2 bg-indigo-600 rounded-full" style="width: calc((1 * 4 + 1) / 8 * 100%);"></div>
                                </div>
                                <div class="hidden sm:grid grid-cols-4 text-sm font-medium text-gray-600 mt-6">
                                    <div class="text-indigo-600">Validée</div>
                                    <div class="text-indigo-600 text-center">En préparation</div>
                                    <div class="text-indigo-600 text-center">Expédiée</div>
                                    <div class="text-right">Livrée</div>
                                </div>
                                @break
                            @default
                                <div class="bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-2 bg-indigo-600 rounded-full" style="width: calc((1 * 7 + 1) / 8 * 100%);"></div>
                                </div>
                                <div class="hidden sm:grid grid-cols-4 text-sm font-medium text-gray-600 mt-6">
                                    <div class="text-indigo-600">Validée</div>
                                    <div class="text-indigo-600 text-center">En préparation</div>
                                    <div class="text-indigo-600 text-center">Expédiée</div>
                                    <div class="text-indigo-600 text-right">Livrée</div>
                                </div>
                        @endswitch
                    </div>
                </div>
            </div>
        @endforeach
    <!-- Billing -->
    @if(count($ordersList) > 0)
        <div class="mt-16">
            <h2 class="sr-only">Résumé de la facture</h2>
        
            <div class="bg-gray-100 py-6 px-4 sm:px-6 sm:rounded-lg lg:px-8 lg:py-8 lg:grid lg:grid-cols-12 lg:gap-x-8">
                <dl class="grid grid-cols-2 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-7">
                <div>
                    <dt class="font-medium text-gray-900">Adresse de Facturation</dt>
                    <dd class="mt-3 text-gray-500">
                        <span class="block">{{$address->name}}</span>
                        <span class="block">{{$address->street}}</span>
                        <span class="block">{{ $address->country == '' ? 'France': $address->country}}, {{$address->city =='' ? "Paris" : $address->city }}, {{$address->postal_code == "" ? "75001" : $address->postal_code}}</span>
                    </dd>
                </div>
                <div>
                    <dt class="font-medium text-gray-900">Informations de paiements</dt>
                    <div class="mt-3">
                    <dd class="-ml-4 -mt-4 flex flex-wrap">
                        <div class="ml-4 mt-4 flex-shrink-0">
                        <svg aria-hidden="true" width="36" height="24" viewBox="0 0 36 24" xmlns="http://www.w3.org/2000/svg" class="h-6 w-auto">
                            <rect width="36" height="24" rx="4" fill="#224DBA" />
                            <path d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z" fill="#fff" />
                        </svg>
                        <p class="sr-only">Visa</p>
                        </div>
                        <div class="ml-4 mt-4">
                        <p class="text-gray-900">
                            Fin 4242
                        </p>
                        <p class="text-gray-600">
                            Expire 02 / 24
                        </p>
                        </div>
                    </dd>
                    </div>
                </div>
                </dl>
        
                <dl class="mt-8 divide-y divide-gray-200 text-sm lg:mt-0 lg:col-span-5">
                    Les prix inclus la TVA de 20%.
                <div class="pb-4 flex items-center justify-between">
                    <dt class="text-gray-600">{{__('Subtotal')}}</dt>
                    <dd class="font-medium text-gray-900">{{($order->cart->total)-5}}.00 €</dd>
                </div>
                <div class="py-4 flex items-center justify-between">
                    <dt class="text-gray-600">Livraison</dt>
                    <dd class="font-medium text-gray-900">5.OO €</dd>
                </div>
                <div class="pt-4 flex items-center justify-between">
                    <dt class="font-medium text-gray-900">Total de la commande</dt>
                    <dd class="font-medium text-indigo-600">{{$order->cart->total}}.00 €</dd>
                </div>
                </dl>
            </div>
        </div>

    @else 
        <div class="grid">
            <p>
                Vous n'avez pas encore de commande ...
                
            </p>
            <p>
                On vous attend <a class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{route('shop.products')}}">ICI</a>
            </p>
        </div>
    @endif
    {{$ordersList->links()}}
</div>