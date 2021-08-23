<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{

    use WithPagination;
    public $search;
    public $productToDelete;

    public $modalVisibility;

    public function mount()
    {
        $this->modalVisibility = "hidden";
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * unset the productToDelete
     */
    public function setDeleteModalVisibilityToHidden()
    {
        $this->modalVisibility = "hidden";
    }

    /**
     * @param Product $product
     * select of the product to delete
     */
    public function setDeleteModalVisibilityToFixed(Product $product)
    {
        $this->modalVisibility = "fixed";
        $this->productToDelete = $product;
    }

    /**
     * @param Product $product
     * delete the param product
     */
    public function deleteProduct(Product $product)
    {
        try {
            $product->delete();
        }
        catch (\Exception $e){
            session()->flash('error', 'Erreur - Impossible de supprimer le produit '.$product->name);

            return redirect()->route('products.index');
            //dd($e->getMessage());
        }
        $this->productToDelete = null;
        $this->modalVisibility = "hidden";
    }

    public function render()
    {
        return view('livewire.product.product-list', [
            'products' => Product::where("name", "like", "%".$this->search."%") //recherche par nom
                ->orWhere("reference", "like", "%".$this->search."%") //recherche par reference
                ->orWhere("price", "like", "%".$this->search."%")->paginate(5), //par prix
        ]);
    }
}
