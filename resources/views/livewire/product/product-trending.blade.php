<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Liste des produits en tendances</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table class="table info-table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('Reference') }}</th>
                                <th class="text-center">{{ __('Name') }}</th>
                                <th class="text-center">{{__('Image')}}</th>
                                <th class="text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trendingProducts as $product)
                                <tr>
                                    <td class="text-center">{{$product->reference}}</td>
                                    <td class="text-center">{{$product->name}}</td>
                                    <td class="text-center"><img src="{{isset($product->images[0]) ? $product->images[0]->image_url : ""}}" width="50" alt="Image produit {{$product->namme}}"></td>
                                    <td class="text-center">
                                        <a href="{{route('shop.index')}}" target="_blank" class="text-indigo-600 hover:text-indigo-900"><i class="fa fa-eye"></i> {{ __('Show') }} </a>
                                        {{-- <button type="button" data-toggle="modal" data-target="#productDeleteModal{{$product->id}}" class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> {{ __('Delete') }}</button> --}}
                                        <button type="button" wire:click='removeFromTrending({{$product->id}})' class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> Retirer des tendances</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="grid">
        <p class="grid-header">Liste des produits en tendances</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table class="table info-table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('Reference') }}</th>
                                <th class="text-center">{{ __('Name') }}</th>
                                <th class="text-center">{{__('Image')}}</th>
                                <th class="text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productsList as $product)
                                <tr>
                                    <td class="text-center">{{$product->reference}}</td>
                                    <td class="text-center">{{$product->name}}</td>
                                    <td class="text-center"><img src="{{isset($product->images[0]) ? $product->images[0]->image_url : ""}}" width="50" alt="Image produit {{$product->namme}}"></td>
                                    <td class="text-center">
                                        <a href="{{route('shop.product.show', $product->id)}}" target="_blank" class="text-indigo-600 hover:text-indigo-900"><i class="fa fa-eye"></i> {{ __('Show') }} </a>
                                        <button type="button" wire:click="addToTrending({{$product->id}})" class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> Mettre en Avant</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>