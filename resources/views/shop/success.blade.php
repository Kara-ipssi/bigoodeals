<x-guest-layout>
    <x-slot name="slot">
        <div class="bg-gray-50">
            <div class="max-w-2xl mx-auto pt-16 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                
            
                <!-- Mes commandes Composant ShopOrders -->
                @auth
                    <livewire:shop-orders/>
                @endauth
            
                
            </div>
        </div>
    </x-slot>
</x-guest-layout>