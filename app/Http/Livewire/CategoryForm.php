<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryForm extends Component
{

    public $name;
    public $description = "";

    protected $rules = [
        'name' => 'required|unique:category|min:3|max:25',
        'description' => 'max:700'
    ];

    protected $messages = [

        'description.max' => 'La description doit faire au maximum 700 caractères',

        'name.required' => 'Le nom est requis.',
        'name.min' => 'Le nom doit faire au minimum 3 caratères.',
        'name.max' => 'Le nom doit faire au maximum 25 caratères.',
        'name.unique' => 'Cette catégorie existe déjà.',
    ];

    public function saveCategory()
    {
        $validate = $this->validate();

        Category::create($validate);

        session()->flash('message', 'La catégorie à bien été ajouté');

        return redirect()->route('categories.index');
    }


    public function render()
    {
        return view('livewire.category.category-form');
    }
}
