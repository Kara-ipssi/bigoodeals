<?php

namespace App\Http\Livewire;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class DashStats extends Component
{
    public $usersList;
    public $CA = 0;
    public $todayCa = 0;
    public $todayOrdersList;
    public $ordersList;
    public $validatedOrderList;     // id 3
    public $validatedOrderPrice = 0;
    public $preparedOrderList; // id 4
    public $preparedOrderPrice = 0; 
    public $sendedOrderList;        // id 5
    public $sendedOrderPrice = 0;
    public $customer;


    public function mount()
    {
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
    
        $this->todayOrdersList = Order::whereBetween('created_at', [$from, $to])->get();

        $this->usersList = User::all();
        $this->ordersList = Order::all();
        $this->validatedOrderList = Order::where("state_id", "=", 3)->get();

        $this->preparedOrderList = Order::where("state_id","=", 4)->get();

        $this->sendedOrderList = Order::where("state_id","=", 5)->get();

        foreach($this->validatedOrderList as $validated){
            $this->validatedOrderPrice += $validated->cart->total;
        }

        foreach($this->preparedOrderList as $prepared){
            $this->preparedOrderPrice += $prepared->cart->total;
        }

        foreach($this->sendedOrderList as $sended){
            $this->sendedOrderPrice += $sended->cart->total;
        }

        foreach($this->todayOrdersList as $order){
            $this->todayCa += $order->cart->total;
        }
        
        $this->CA = $this->validatedOrderPrice + $this->preparedOrderPrice + $this->sendedOrderPrice;
    }

    public function render()
    {
        return view('livewire.dashboard.dash-stats');
    }
}
