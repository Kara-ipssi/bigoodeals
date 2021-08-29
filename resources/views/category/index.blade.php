<x-admin-layout>

    <x-slot name="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">
                <li class="breadcrumb-item">
                    <a href="{{route("dashboard")}}">{{__("Dashboard")}}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Categories list')}}</li>
            </ol>
        </nav>
    </x-slot>

    <x-slot name="slot">
        <div class="row">
            <livewire:category-form/>
            <livewire:category-list/>
        </div>
    </x-slot>

    <x-slot name="scripts">
        <script>
            Livewire.on('categoryAdded', ()=>{
                showSuccessCategoryAdd("La catégorie à bien été ajouté");
            });

            Livewire.on('categoryDeleted' () =>{
                showCategoryDelete("La catégorie à bien été supprimé")
            })
        </script>
    </x-slot>

</x-admin-layout>
