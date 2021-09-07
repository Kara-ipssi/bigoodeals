<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\SizeType;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Stock;
use Exception;

class ProductForm extends Component
{
    use WithFileUploads;

    /**
     * The events listeners
     */
    protected $listeners = ['editProductRequest'];

    /**
     * Product reference
     */
    public $prefix = "REF";
    public $dataref = "";
    public $reference = "";


    public $name;
    public $description = "";
    public $price;
    public $stripe_price;

    /**
     * Product images
     */
    public $images = [];

    /**
     * Product Categories
     */
    public $categoriesList;
    public $categories = [];
    protected $cats;

    /**
     * Product tags
     */
    public $tags = [];

    /**
     * Product stocks and sizes
     */
    public $sizesTypesList;
    public $sizeType = 2;
    public $quantity;

    /**
     * For edit mode
     */
    public $productToEdit;
    public $editMode = false;
    public $currentsImages = [];
    public $newImages = [];

    

    public function mount()
    {
        /**
         * ORM Array
         */
        $this->categoriesList = Category::all();
        
        $this->sizesTypesList = SizeType::all();
    }

    protected $rules = [
        'reference' => 'required|unique:product|min:6|max:10',
        'name' => 'required|unique:product|min:3|max:25',
        'price' => 'required|numeric|between:0,999.99',
        'stripe_price' => 'required|unique:product|min:0',
        'images.*' => 'file|mimes:png,jpg,pdf|max:1024',
        'categories' => 'required',
        'dataref' => 'int',
        'description' => 'max:500',
        'quantity' => 'required|int|min:10|max:9999',
    ];

    protected $messages = [
        'reference.required' => 'La référence est requise.',
        'reference.min' => 'La référence doit faire au minimum 6 caractères (REF inclus).',
        'reference.max' => 'La référence doit faire au maximum 10 caractères (REF inclus).',
        'reference.unique' => 'Cette référence de produit existe déjà.',

        'price.required' => 'Le prix du produit est requis.',
        'price.numeric' => 'Le prix du produit doit être un nombre.',
        'price.between' => 'Le prix doit être compris entre 0 et 999.99 € .',

        'name.required' => 'Le nom est requis.',
        'name.min' => 'Le nom doit faire au minimum 3 caratères.',
        'name.max' => 'Le nom doit faire au maximum 25 caratères.',
        'name.unique' => 'Ce nom de produit existe déjà.',

        'stripe_price.unique' => 'Ce prix stripe est déjà affecté à un produit.',

        'quantity.required' => 'la quantité du produit est requise.',
        'quantity.min' => 'la quantité minimum requise est 10.',
        'quantity.max' => 'la quantité ne doit pas excéder 9999.',

        'categories.required' => 'Vous devez choisir au moins une catégorie.',

        'description.max' => 'La description ne peux pas faire plus de 500 caractères',
    ];

    public function addCategory(Category $category)
    {
        $this->categories [] = $category;
        for ($i=0; $i < count($this->categoriesList); $i++) { 
            if ($this->categoriesList[$i]->id === $category->id) {
                unset($this->categoriesList[$i]);
            }
        }
    }

    public function cancelAddCategory(Category $category)
    {

        foreach ($this->categories as $key => $item) {
            if ($item['id'] == $category->id) {
                unset($this->categories[$key]);
                $this->categoriesList [] = $category; 
            }
        }
    }



    public function editProductRequest(Product $product)
    {
        $this->productToEdit = $product;
        $this->categoriesList = Category::all();

        $quantity = 0;
        foreach($product->stocks as $stock){
            $quantity += $stock->quantity;
        }

        $categories = [];
        foreach($product->categories as $key => $cat){
            $categories[$key] = $cat;
            foreach ($this->categoriesList as $i => $value) {
                if($value->id === $categories[$key]->id){
                    unset($this->categoriesList[$i]);
                }
            }
        }

        $this->editMode = true;
        $this->name = $product->name;
        /** Don't take the REF chart thanks to the substr method*/
        $this->dataref = substr($product->reference, 3);
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stripe_price = $product->stripe_price;
        $this->quantity = $quantity;
        $this->categories = $product->categories;
        $this->sizeType = $this->productToEdit->stocks[0]->size->size_type->id;
        
        // $this->tags = [];
        $this->currentsImages = $this->productToEdit->images;
    }

    public function cancelEdit()
    {
        $this->editMode = false;
        $this->resetInputsFileds();
    }

    public function updateProduct()
    {
        $validate = $this->validate([
            'name' => 'required|min:3|max:25',
            'price' => 'required|numeric|between:0,999.99',
            'stripe_price' => 'required|min:0',
            'newImages.*' => 'file|mimes:png,jpg,pdf|max:1024',
            'categories' => 'required',
            'description' => 'max:500',
            'quantity' => 'required|int|min:0|max:9999',
        ]);
        
        if ($this->editMode === true) {
            foreach ($this->categories as $value) {
                $this->cats [] = $value['id']; 
            }
            if (!empty($this->cats)) {
                $this->productToEdit->categories()->sync($this->cats);
            }
            
            // update of the quantity only if value is more than 10
            if($this->quantity > 10){
                $listOfSize = [];
                $sizeType = SizeType::find($this->sizeType);
                foreach($sizeType->sizes as $size){
                    $listOfSize [] = $size;
                }
                $nb = count($listOfSize);
                
                /**
                 * Saving of the stock
                 */
                foreach($this->productToEdit->stocks as $stock){
                    $stock->delete();
                }
                foreach($listOfSize as $size){
                    $stock = new Stock();
                    $stock->quantity = ($this->quantity / $nb);
                    $stock->description = 'description';
                    $stock->product_id = $this->productToEdit->id;
                    $stock->size_id = $size->id;
                    $stock->save();
                }
            }
             
            if (!empty($this->newImages)) {
                if(count($this->productToEdit->images)>=1){
                    // deleting olds images
                    foreach($this->productToEdit->images as $img){
                        try {
                            $img->delete();
                        } catch (Exception $e) {
                            dd($e->getMessage());
                        }
                    }
                }
                // seting of the news images
                foreach ($this->newImages as $image) {
                    $image->store('public/products');
                    Image::create([
                        'name'=>$image->hashName(),
                        'image_url'=>'storage/products/'.$image->hashName(),
                        'product_id'=>$this->productToEdit->id
                    ]);
                }
            }
            try {
                $this->productToEdit->update($validate);
                $this->emit('productUpdated', $this->productToEdit->name);
                $this->resetInputsFileds();
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }
        else{
            return redirect()->route('products.index');
        }
    }

    public function saveProduct()
    {
        $this->reference = $this->prefix . $this->dataref;
        $validate = $this->validate();
        
        $product = Product::create($validate);
        if(!empty($this->images)){
            foreach ($this->images as $image) {
                $image->store('public/products');
                Image::create([
                    'name'=>$image->hashName(),
                    'image_url'=>'storage/products/'.$image->hashName(),
                    'product_id'=>$product->id
                ]);
            }
        }
        /**
         * Add of the product category after the storing product
         */
        foreach ($this->categories as $value) {
            $this->cats [] = $value['id']; 
        }
        if (!empty($this->cats)) {
            $product->categories()->sync($this->cats);
        }

        $listOfSize = [];
        $sizeType = SizeType::find($this->sizeType);
        foreach($sizeType->sizes as $size){
            $listOfSize [] = $size;
        }
        $nb = count($listOfSize);
        
        /**
         * Saving of the stock
         */
        foreach($listOfSize as $size){
            $stock = new Stock();
            $stock->quantity = ($this->quantity / $nb);
            $stock->description = 'description';
            $stock->product_id = $product->id;
            $stock->size_id = $size->id;
            $stock->save();
        }
        
        session()->flash('message', 'Le produit à bien été ajouté');
        $this->emit('productAdded');
        $this->resetInputsFileds();
        // return redirect()->route('products.index');
    }

    public function resetInputsFileds()
    {
        $this->editMode = false;
        $this->productToEdit = '';
        $this->name = '';
        $this->dataref = '';
        $this->reference = '';
    
        $this->description = '';
        $this->price = '';
        $this->stripe_price = '';
        $this->quantity = '';
        $this->categories = [];
        $this->categoriesList = Category::all();
        $this->tags = [];
        $this->images = [];
        $this->newImages = [];
        $this->currentsImages = [];
        $this->cats = [];
    }

    public function render()
    {
        return view('livewire.product.product-form');
    }
}
