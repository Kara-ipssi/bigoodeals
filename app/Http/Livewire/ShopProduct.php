<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use App\Models\ShopCart as Cart;
use App\Models\ShopCartContent as CartContent;
use Illuminate\Support\Facades\Auth;

class ShopProduct extends Component
{
    public $product;
    public $productSelectedImage;
    public $cart;
    public $size = '';

    public $count = 1;

    protected $listeners = [''];

    public function mount($productId)
    {
        $this->product = Product::find($productId);
        if(Auth::user()){
            $this->cart = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        }
    }

    protected $rules = [
        'size' => 'required',
    ];

    protected $messages = [
        'size.required'=>'Vous devez choisir une taille.'
    ];

    public function setSize()
    {
        //
    }

    public function addToCart()
    {
        $validate = $this->validate();
        
        // $items represent the contents of this cart
        if(count($this->cart->items) > 0){
            $ifProduct = false;
            foreach($this->cart->items as $key => $item){
                if ($item->product_id === $this->product->id) {
                    $item->quantity += 1;
                    $item->save();
                    $this->size = '';
                    $this->emit('cartItemUpdated');
                    $ifProduct = true;
                    return;
                }
            }
            if($ifProduct === false){
                $newItem = new CartContent();
                $newItem->quantity = 1;
                $newItem->product_id = $this->product->id;
                $newItem->size_id = $validate['size'];
                $newItem->shop_cart_id = $this->cart->id;
                $newItem->save();
                $this->size='';
                $this->emit('cartItemUpdated');
            }
        }
        else{
            $newItem = new CartContent();
            $newItem->quantity = 1;
            $newItem->product_id = $this->product->id;
            $newItem->size_id = $validate['size'];
            $newItem->shop_cart_id = $this->cart->id;
            $newItem->save();
            $this->size='';
            $this->emit('cartItemUpdated');
            return;
        }
    }

    public function setSelected($url)
    {
        $this->productSelectedImage = $url;
    }
    

    public function render()
    {
        return view('livewire.shop.shop-product');
    }
}
