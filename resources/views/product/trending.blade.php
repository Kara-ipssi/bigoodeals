<x-admin-layout>
    <x-slot name="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">
                <li class="breadcrumb-item">
                    <a href="{{route("dashboard")}}">{{__("Dashboard")}}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route("products.index")}}">{{__("Products list")}}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Produits en avant</li>
            </ol>
        </nav>
    </x-slot>
    <x-slot name="slot">
        <div class="row">
            <livewire:trending/>
        </div>
    </x-slot>
</x-admin-layout>