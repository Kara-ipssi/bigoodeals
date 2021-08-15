<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductTag;
use Livewire\Component;

class ProductForm extends Component
{
    public $prefix = "REF";
    public $dataref = "";

    public $reference = "";
    public $name;
    public $description = "";
    public $price;
    public $stripe_price;


    public $stocks = [];
    public $tags = [];
    public $categories = [];

    protected $rules = [
        'reference' => 'required|unique:product|min:3|max:10',
        'name' => 'required|unique:product|min:3|max:25',
        'price' => 'required|int|min:0',
        'stripe_price' => 'required|unique:product|min:0',
    ];

    protected $messages = [
        'reference.required' => 'La référence est requise.',
        'reference.min' => 'La référence doit faire au minimum 3 caractères',
        'reference.unique' => 'Cette référence de produit existe déjà.',

        'price.required' => 'Le Prix du produit est requis',
        'price.min' => 'Le prix doit être supérieur ou égale à 0.',
        'price.int' => 'Le prix doit être un nombre.',

        'name.required' => 'Le nom est requis.',
        'name.min' => 'Le nom doit faire au minimum 3 caratères.',
        'name.max' => 'Le nom doit faire au maximum 25 caratères.',
        'name.unique' => 'Ce nom de produit existe déjà.',

        'stripe_price.unique' => 'Ce prix stripe est déjà affecté à un produit.',

    ];

    public function mount()
    {
        //
    }

    public function saveProduct()
    {
        $this->reference = $this->prefix . $this->dataref;
        $validate = $this->validate();
        Product::create($validate);

        session()->flash('message', 'Le produit à bien été ajouté');

        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.product.product-form');
    }
}
