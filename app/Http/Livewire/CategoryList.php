<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;


    public $search = '';
    public $modalVisibility;
    public $categoryToDelete;

    public function mount()
    {
        $this->modalVisibility = "hidden";
    }

    public function showModal(Category $category)
    {
        $this->modalVisibility = "fixed";
        $this->categoryToDelete = $category;
    }

    public function hideModal()
    {
        $this->modalVisibility = "hidden";
    }

    /**
     * @param Category $category
     * delete the param category
     */
    public function deleteCategory(Category $category)
    {
        $category->delete();
        $this->categoryToDelete = null;
        $this->modalVisibility = "hidden";
    }


    public function render()
    {
        return view('livewire.category.category-list', [
            'categories' => Category::where("name", "like", "%".$this->search."%")->paginate(10), //search by name
        ]);
    }
}
