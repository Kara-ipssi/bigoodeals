<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCartContent extends Model
{
    use HasFactory;

    /**
     * the table associate to the model
     * @var string
     */
    protected $table = "shop_cart_content";

    /**
     * Return the cart who content this product
     */
    public function cart()
    {
        return $this->belongsTo(ShopCart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
