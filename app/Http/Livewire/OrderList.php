<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use App\Models\State;

class OrderList extends Component
{

    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function changeState(Order $order, State $state)
    {
        $order->state_id = $state->id;
        $order->save();
        $this->render();
    }

    public function render()
    {
        return view('livewire.order.order-list',[
            'orders'=>Order::where("number", "like", "%".$this->search."%")->paginate(10),
        ]);
    }
}
