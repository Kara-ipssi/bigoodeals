<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * the table associate to the modal
     * @var string
     */
    protected $table = "category";
    protected $fillable = [
        'name',
        'description',
    ];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Get the stock of the current Product
     * Get the products for the category
     */
    public function products(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
