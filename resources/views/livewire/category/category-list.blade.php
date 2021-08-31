<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">{{__('Categories list')}}</p>
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
                                <th>ID</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Images')}}</th>
                                <th class="text-center">{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($recentlyAddedCategory) && $cNumber > 5)
                                <tr>
                                    <td>{{$recentlyAddedCategory->id}}</td>
                                    <td>{{$recentlyAddedCategory->name}}</td>
                                    <td><img src="/{{$recentlyAddedCategory->image}}" width="50" alt="Image categories {{$recentlyAddedCategory->name}}"></td>
                                    <td class="text-center">
                                        <a href="{{route('categories.show', $recentlyAddedCategory->id)}}" class="text-indigo-600 hover:text-indigo-900"><i class="fa fa-eye"></i> {{ __('Show') }} </a>
                                        <a href="{{route('categories.edit', $recentlyAddedCategory->id)}}" class="text-yellow-600 hover:text-yellow-900"><i class="fas fa-pencil"></i> {{ __('Edit') }}</a>
                                        <button type="button" data-toggle="modal" data-target="#categoryDeleteModal{{$recentlyAddedCategory->id}}" class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> {{ __('Delete') }}</button>
                                    </td>
                                </tr>
                                <div class="modal fade" tabindex="-1" role="dialog" id="categoryDeleteModal{{$recentlyAddedCategory->id}}">
                                    <div class="modal-dialog modal-md modal-dialog-top" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title bg-red"> Suppression de la categorie : <b>{{$recentlyAddedCategory->name}}</b> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Voulez vous vraiment supprimer cette categorie? Toutes les données associées seront perdues. Cette action est irréversible.</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">{{__('Cancel')}}</button>
                                        <button type="button" wire:click="deleteCategory({{$recentlyAddedCategory->id}})" class="btn btn-danger btn-sm">{{__('Delete')}}</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endif
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td><img src="/{{$category->image}}" width="50" alt="Image categories {{$category->name}}"></td>
                                    <td class="text-center">
                                        <a href="{{route('categories.show', $category->id)}}" class="text-indigo-600 hover:text-indigo-900"><i class="fa fa-eye"></i> {{ __('Show') }} </a>
                                        {{-- <a href="{{route('categories.edit', $category->id)}}" class="text-yellow-600 hover:text-yellow-900"><i class="fas fa-pencil"></i> {{ __('Edit') }}</a> --}}
                                        <button wire:click="$emit('editRequest', '{{$category->id}}')" class="text-yellow-600 hover:text-yellow-900"><i class="fas fa-pencil"></i> {{ __('Edit') }}</button>
                                        <button type="button" data-toggle="modal" data-target="#categoryDeleteModal{{$category->id}}" class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i> {{ __('Delete') }}</button>
                                    </td>
                                </tr>
                                <div class="modal fade" tabindex="-1" role="dialog" id="categoryDeleteModal{{$category->id}}">
                                    <div class="modal-dialog modal-md modal-dialog-top" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title bg-red"> Suppression de la categorie : <b>{{$category->name}}</b> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Voulez vous vraiment supprimer cette categorie? Toutes les données associées seront perdues. Cette action est irréversible.</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">{{__('Cancel')}}</button>
                                        <button type="button" wire:click="deleteCategory({{$category->id}})" class="btn btn-danger btn-sm">{{__('Delete')}}</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>