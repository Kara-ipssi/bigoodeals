<x-admin-layout>
    <x-slot name="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route("dashboard")}}">{{__("Dashboard")}}</a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <x-slot name="slot">
        <livewire:dash-stats/>
    </x-slot>

</x-admin-layout>
