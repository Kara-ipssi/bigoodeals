<x-admin-layout>
    <x-slot name="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">
              <li class="breadcrumb-item">
                <a href="{{route("test")}}">{{__("Dashboard")}}</a>
              </li>
              <li class="breadcrumb-item">
                <a href="#">Data Tables</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Basic</li>
            </ol>
          </nav>
    </x-slot>

    <x-slot name="slot">
        <div class="row">
            {{-- <livewire:product-form/> --}}
            <livewire:product-list/>
        </div>
    </x-slot>

    <x-slot name="scripts">
        <script src="/assets/js/data-table.js"></script>
    </x-slot>

</x-admin-layout>
