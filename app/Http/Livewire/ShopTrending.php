<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShopTrending extends Component
{

    public $productsList = [];

    public function mount()
    {
        //isActivated pour les produit à ajouter en avant
        $this->productsList = Product::where('isActivated', "=", 1)->get();
    }

    public function render()
    {
        return view('livewire.shop.shop-trending');
    }
}
