<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Egulias\EmailValidator\Warning\Warning;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{

    use WithPagination;
    public $search;

    protected $listeners = ['productUpdated', 'productAdded'];
    public $productCount;

    public function productUpdated()
    {
        $this->productCount = Product::count();
    }

    public function productAdded()
    {
        $this->productCount = Product::count();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * @param Product $product
     * select of the product to delete
     */
/*     public function setDeleteModalVisibilityToFixed(Product $product)
    {
        $this->modalVisibility = "fixed";
        $this->productToDelete = $product;
    } */

    /**
     * @param Product $product
     * delete the param product
     */
    public function deleteProduct(Product $product)
    {
        // dd($product->stocks);
        $name = $product->name;
        if(count($product->cartContent) > 1){
            session()->flash('error', 'Erreur - Impossible de supprimer le produit '.$name.' il est dans une transaction.');
            return redirect()->route('products.index');
        }
        try {
            // Category delete
            if($product->categories !== null){
                $product->categories()->detach();
            }

            // Stock delete
            if($product->stocks !== null){
                foreach($product->stocks as $stock){
                    $stock->delete();
                }
            }

            // Image delete 
            if($product->images !== null){
                foreach($product->images as $image){
                    $image->delete();
                }
            }
            $product->delete();
            session()->flash('message','Success - Le produit '.$name.' à bien été supprimé.');
            return redirect()->route('products.index');
        }
        catch (\Exception $e){
            session()->flash('error', 'Erreur - Impossible de supprimer le produit '.$name);

            return redirect()->route('products.index');
            //dd($e->getMessage());
        }
        /* $this->productToDelete = null;
        $this->modalVisibility = "hidden"; */
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
