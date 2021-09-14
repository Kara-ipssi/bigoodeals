<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCart extends Model
{
    use HasFactory;

    /**
     * the table associate to the model
     * @var string
     */
    protected $table = "shop_cart";

    /**
     * Return items of the Shoping cart
     */
    public function items()
    {
        return $this->hasMany(ShopCartContent::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
