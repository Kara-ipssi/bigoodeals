<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShopOrders extends Component
{
    use WithPagination;
    public $address;

    public function mount()
    {
        $this->address = Address::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->first();
    }
    public function render()
    {
        return view('livewire.shop.shop-orders',[
            'ordersList'=>Order::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(1),
        ]);
    }
}
