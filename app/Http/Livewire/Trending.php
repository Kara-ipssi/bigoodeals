<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Trending extends Component
{
    public $productsList = [];
    public $trendingProducts = [];

    public function mount()
    {
        //isActivated pour les produit à ajouter en avant
        $this->productsList = Product::all();
        $this->trendingProducts = Product::where('isActivated', "=", 1)->get();
    }

    public function removeFromTrending(Product $product)
    {
        $product->isActivated = false;
        $product->save();
        $this->emit('removeTrending', $product->name);
        $this->mount();
    }

    public function addToTrending(Product $product)
    {
        $product->isActivated = true;
        $product->save();
        $this->emit('addTrending', $product->name);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.product.product-trending');
    }
}
