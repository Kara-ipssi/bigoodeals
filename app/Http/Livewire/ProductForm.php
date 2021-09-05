<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public $prefix = "REF";
    public $dataref = "";

    public $reference = "";
    public $name;
    public $description = "";
    public $price;
    public $stripe_price;
    public $images = [];

    public $categoriesList;


    public $stocks = [];
    public $tags = [];
    public $categories = [];

    protected $cats;

    // public $categoryModalVisibility = "hidden";

    public function mount()
    {
        /**
         * ORM Array
         */
        $this->categoriesList = Category::all();
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

    public function saveProduct()
    {
        $this->reference = $this->prefix . $this->dataref;
        $validate = $this->validate();

        /* foreach ($this->images as $key => $image) {
            $image->store('public/products');
        } */
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
        foreach ($this->categories as $key => $value) {
            # code...
            $this->cats [] = $value['id']; 
        }
        if (!empty($this->cats)) {
            $product->categories()->sync($this->cats);
        }
        
        session()->flash('message', 'Le produit à bien été ajouté');

        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.product.product-form');
    }
}
