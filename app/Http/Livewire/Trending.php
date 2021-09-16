<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Trending extends Component
{
    use WithPagination;
    public $trendingProducts = [];

    public function mount()
    {
        //isActivated pour les produit à ajouter en avant
        $this->trendingProducts = Product::where('isActivated', "=", 1)->orderBy('updated_at','asc')->get();
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
        return view('livewire.product.product-trending', [
            "productsList"=>Product::where('isActivated', '=', false)->paginate(5)
        ]);
    }
}
