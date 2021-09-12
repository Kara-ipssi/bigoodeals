<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Models\Size;
use Illuminate\Support\Facades\Cookie;
use Livewire\WithPagination;

class ShopProductList extends Component
{
    use WithPagination;
    public $productToDisplay;

    public function mount()
    {
        $this->productToDisplay = Product::all();
    }

    public function addToCart($productId)
    {
        if(cookie('test')){
            dd(cookie('test'));
        }
        Cookie::make("test", $productId, 20 );
    }

    public function render()
    {
        return view('livewire.shop.shop-product-list', [
            'sizes'=>Size::All(),
            'categories'=>Category::all(),
        ]);
    }
}
