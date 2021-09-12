<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Product;
use Livewire\Component;

class ShopProduct extends Component
{
    public $product;
    public $productSelectedImage;

    public function mount($productId)
    {
        $this->product = Product::find($productId);
    }

    public function setSelected($imageId)
    {
        $this->productSelectedImage = Image::find($imageId);
    }

    public function render()
    {
        return view('livewire.shop.shop-product');
    }
}
