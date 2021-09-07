<x-admin-layout>
    <x-slot name="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">
              <li class="breadcrumb-item">
                <a href="{{route("test")}}">{{__("Dashboard")}}</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Products list')}}</li>
            </ol>
          </nav>
    </x-slot>

    <x-slot name="slot">
        <div class="row">
            {{-- <livewire:product-list/> --}}
            <iframe
              src="https://iframe.videodelivery.net/5d5bc37ffcf54c9b82e996823bffbb81?poster=https%3A%2F%2Fvideodelivery.net%2F5d5bc37ffcf54c9b82e996823bffbb81%2Fthumbnails%2Fthumbnail.jpg%3Ftime%3D68s%26height%3D270"
              style="border: none;"
              height="720"
              width="1280"
              allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;"
              allowfullscreen="true"
            >
          </iframe>
        </div>
    </x-slot>

</x-admin-layout>
