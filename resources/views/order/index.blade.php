<x-admin-layout>
    <x-slot name="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">
                <li class="breadcrumb-item">
                    <a href="{{route("dashboard")}}">{{__("Dashboard")}}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Orders list')}}</li>
            </ol>
        </nav>
    </x-slot>

    <x-slot name="slot">
        <div class="row">
            <livewire:order-list/>
        </div>
    </x-slot>

    <x-slot name="scripts">
        <script>

        </script>
    </x-slot>
</x-admin-layout>