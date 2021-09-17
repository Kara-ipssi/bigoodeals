<div class="col-md-12 equel-grid order-md-2">
    <div class="grid">
        <p class="grid-header">Liste des utilisateur</p>
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
                                <th class="text-center">Nom</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Date d'inscription</th>
                                <th class="text-center">Nombre de commande</th>
                                <th class="text-center">Est un Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->email}}</td>
                                    <td class="text-center">{{$user->created_at}}</td>
                                    <td class="text-center">{{count($user->orders)}}</td>
                                    <td class="text-center">{{$user->is_admin == 1 ? "Oui" : "Non"}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        
    </div>
</div>
