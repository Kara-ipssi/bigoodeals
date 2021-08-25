<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEditForm extends Component
{
    use WithFileUploads;
    public $product;

    public $reference = "";
    public $name;
    public $description = "";
    public $price;
    public $stripe_price;


    public $stocks = [];
    public $tags = [];
    public $categories = [];

    protected $rules = [
        'name' => 'required|min:3|max:25',
        'price' => 'required|int|min:0',
        'stripe_price' => 'required|min:0',
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


    public function mount(Product $product)
    {
        $this->product = $product;
        $this->reference = $this->product->reference;
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->stripe_price = $this->product->stripe_price;
    }

    public function updateProduct()
    {
        $validate = $this->validate();
        $this->product->update($validate);

        session()->flash('message', 'Le produit à bien été Mis à jour');

        return redirect()->route('products.index');
    }


    public function render()
    {
        return view('livewire.product.product-edit-form', [
            'categoriesList' => Category::all(),
        ]);
    }
}
