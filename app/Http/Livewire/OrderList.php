<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class OrderList extends Component
{

    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.order.order-list',[
            'orders'=>Order::where("number", "like", "%".$this->search."%")->paginate(10),
        ]);
    }
}
