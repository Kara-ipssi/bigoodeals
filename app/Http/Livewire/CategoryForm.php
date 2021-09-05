<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoryForm extends Component
{
    use WithFileUploads;
    public $name;
    public $description = "";
    public $image;


    /**
     * For edit
     */
    public $category;
    public $editMode = false;
    public $hiddenId;
    public $currentImageURL = null; 
    public $newImage = null;

    /**
     * The events listeners
     */
    protected $listeners = ['editRequest'];

    protected $rules = [
        'name' => 'required|unique:category|min:3|max:25',
        'description' => 'max:500',
        'image.*' => 'file|mimes:png,jpg,pdf|max:1024|required'
    ];

    protected $messages = [

        'description.max' => 'La description ne peux pas faire plus de 500 caractères',

        'name.required' => 'Le nom est requis.',
        'name.min' => 'Le nom doit faire au minimum 3 caratères.',
        'name.max' => 'Le nom doit faire au maximum 25 caratères.',
        'name.unique' => 'Cette catégorie existe déjà.',
    ];

    public function resetInputsFields()
    {
        $this->name = '';
        $this->description = '';
        $this->image = null;
        $this->newImage = null;
        $this->editMode = false;
    }

    public function editRequest(Category $category)
    {
        $this->category = $category;
        $this->editMode = true;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->currentImageURL = $category->image;
    }

    public function updateCategory()
    {
        $validate = $this->validate([
            'name' => 'required|min:3|max:25',
            'description' => 'max:700',
            'newImage.*' => 'file|mimes:png,jpg,pdf|max:1024'
        ]);

        if($this->editMode === true)
        {
            if(!empty($this->newImage)){
                $this->newImage->store('public/categories');
                $this->category->image = 'storage/categories/'.$this->newImage->hashName();
            }
            $this->category->name = $this->name;
            $this->category->description = $this->description;
        }
        $this->category->update();
        $this->emit('categoryUpdated');
        $this->resetInputsFields();
    }

    public function cancelEdit()
    {
        $this->editMode = false;
        $this->name = '';
        $this->description = '';
        $this->currentImageURL = null;
        $this->newImage = null;
        $this->category = null;
        $this->emit('cancelEdit');
    }



    public function saveCategory()
    {
        $this->validate();

        $category = new Category();
        if(!empty($this->image)){
            $this->image->store('public/categories');
            $category->image = 'storage/categories/'.$this->image->hashName();
        }
        $category->name = $this->name;
        $category->description = $this->description;
        
        $category->save();

        $this->resetInputsFields();
        $this->emit('categoryAdded', $category->id, $category);
    }


    public function render()
    {
        return view('livewire.category.category-form');
    }
}
