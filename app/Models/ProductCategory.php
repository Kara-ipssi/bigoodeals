<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    /**
     * the table associate to the modal
     * @var string
     */
    protected $table = "product_category";
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Get the Products of the current Category
     * One Product can associate to many categories.
     */
    public function products()
    {
        return $this->hasMany(Product::class, "product_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Get the categories of current product
     * One Categories can have many products.
     */
    public function categories()
    {
        return $this->hasMany(Category::class, "category_id");
    }
}
