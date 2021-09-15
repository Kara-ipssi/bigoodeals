<?php

namespace App\Http\Livewire;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class DashStats extends Component
{
    public $nbUser;
    public $CA;
    public $validatedOrder;     // id 3
    public $validatedOrderPrice;
    public $InPreparationOrder; // id 4
    public $InPreparationOrderPrice; 
    public $sendedOrder;        // id 5
    public $sendedOrderPrice;

    public function mount()
    {
        $this->nbUser = User::count();
        $this->validatedOrder = Order::where('id', 3)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.dash-stats');
    }
}
