<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\ShopCart as Cart;
use App\Models\ShopCartContent as CartContent;

class ShopCart extends Component
{

    public $cart;
    public $total;
    public $listeners = ['cartItemUpdated'=>'mount'];

    /**
     * Get or Set the user Cart if he doesn't have one.
     */
    public function mount()
    {
        if(Auth::user())
        {
            // $this->cart = DB::table('shop_cart')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
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
                $this->total += (int)($item->quantity) * (int)($item->product->price);
            }
        }
    }

    public function removeItem(CartContent $item)
    {
        $item->delete();
        $this->emit('cartItemUpdated');
    }

    public function render()
    {
        return view('livewire.shop.shop-cart');
    }
}
