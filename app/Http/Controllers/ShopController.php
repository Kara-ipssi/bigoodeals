<?php
namespace App\Http\Controllers;

use App\Models\Product;

/**
 * BiGoodeals shop controller
 */
class ShopController extends Controller
{
    /**
     * Display product in the shop.
     *
     */
    public function showProduct($id)
    {   
        $product = Product::find($id);
        if($product){
            return view('shop.product-page')->with(['product'=>$product]);
        }
        return view('error.page404');
    }
}