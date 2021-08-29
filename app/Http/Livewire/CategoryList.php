<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Stmt\TryCatch;

class CategoryList extends Component
{
    use WithPagination;

    public $categoryCount;
    public $recentlyAddedCategory;

    protected $listeners = ['categoryAdded'];

    public $search = '';

    public function mount()
    {
        // 
    }

    public function categoryAdded(Category $category)
    {
        $this->categoryCount = Category::count();
        $this->recentlyAddedCategory = $category;
    }

    /**
     * @param Category $category
     * delete the param category
     */
    public function deleteCategory(Category $category)
    {
        try {
            $category->delete();
            session()->flash('success', 'La catégorie à bien été supprimé');
            $this->emit('categoryDeleted');
            return redirect()->route('categories.index');
        } catch (Exception $e) {
            session()->flash('error', 'Erreur - Impossible de supprimer la catégorie '.$category->name);

            return redirect()->route('categories.index');
        }
    }

    public function render()
    {
        return view('livewire.category.category-list', [
            'categories' => Category::where("name", "like", "%".$this->search."%")->paginate(5), //search by name
        ]);
    }
}
