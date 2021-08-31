<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">{{__('Products list')}}</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="table-responsive">
                    <div class="pt-2 relative mx-auto text-gray-600 flex flex-row-reverse mr-6 mb-2">
                        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                            type="search"
                            name="search"
                            placeholder="Recherche"
                            wire:model="search">
                    </div>
                    <table class="table info-table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Reference') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Stripe price') }}</th>
                                <th>{{ __('Add date') }}</th>
                                <th class="text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->reference}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->stripe_price}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td class="text-center">
                                        <a href="{{route('products.show', $product->id)}}" class="text-indigo-600 hover:text-indigo-900"><i class="fa fa-eye"></i> {{ __('Show') }} </a>
                                        <a href="{{route('products.edit', $product->id)}}" class="text-yellow-600 hover:text-yellow-900"><i class="fas fa-pencil"></i> {{ __('Edit') }}</a>
                                        <button type="button" data-toggle="modal" data-target="#productDeleteModal{{$product->id}}" class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> {{ __('Delete') }}</button>
                                    </td>
                                </tr>
                                <div class="modal fade" tabindex="-1" role="dialog" id="productDeleteModal{{$product->id}}">
                                    <div class="modal-dialog modal-md modal-dialog-top" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title bg-red"> Suppression du {{__('Product')}} : <b>{{$product->name}}</b> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Voulez vous vraiment supprimer ce produit? Toutes les données associées seront perdues. Cette action est irréversible.</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">{{__('Cancel')}}</button>
                                        <button type="button" wire:click="deleteProduct({{$product->id}})" class="btn btn-danger btn-sm">{{__('Delete')}}</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        
    </div>

</div>
