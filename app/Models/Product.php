<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * the table associate to the modal
     * @var string
     */
    protected $table = "product";
    protected $fillable = [
        'reference',
        'name',
        'description',
        'price',
        'stripe_price',
    ];

    public $timestamps = true;



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Get the stock of the current Product
     * One product can have many stock.
     */
    public function stocks(){
        return $this->hasMany(Stock::class, "product_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Get the carts of the current product
     */
    public function cartContent(){
        return $this->hasMany(ShopCartContent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Get the images of this product
     * One product can got a lot of images.
     */
    public function images(){
        return $this->hasMany(Image::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * The categories that belong to the Product.
     */
    public function categories(){
        return $this->belongsToMany(Category::class, 'product_category');
    }

}
