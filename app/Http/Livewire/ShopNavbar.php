<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\ShopCart as Cart;
use Illuminate\Support\Facades\Auth;


class ShopNavbar extends Component
{
    public $cart;
    public $cartCount = 0;
    public $menCats = [];
    public $womenCats = [];

    public $listeners = ['cartItemUpdated'=> 'mount'];

    public function mount()
    {
        $this->menCats = Category::where('id', '>', '0')->orderBy('id', 'desc')->get();
        $this->womenCats = Category::where('id', '>', '0')->orderBy('id', 'asc')->get();
        $this->cartCount = 0;
        if(Auth::user()){
            $this->cart = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            if($this->cart === null || $this->cart->state->name === "checkout")
            {
                $cart = new Cart();
                $cart->user_id = Auth::user()->id;
                $cart->state_id = 1; // 1 fort create, 2 for checkout 
                $cart->total = 0;

                $cart->save();
                $this->cart = $cart;
            }
            foreach($this->cart->items as $item){
                $this->cartCount += $item->quantity;
            }
        }
    }

    public function render()
    {
        return view('livewire.shop.shop-navbar');
    }
}
