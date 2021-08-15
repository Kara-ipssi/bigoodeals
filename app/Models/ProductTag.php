<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;
    /**
     * the table associate to the modal
     * @var string
     */
    protected $table = "product_tag";
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Get the tags of the current Product
     * One product can have many tags.
     */
    public function tags()
    {
        return $this->hasMany(Tag::class, "tag_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Get the Products of the current tag
     * One tag can have associate to many product.
     */
    public function products()
    {
        return $this->hasMany(Product::class, "product_id");
    }

}
