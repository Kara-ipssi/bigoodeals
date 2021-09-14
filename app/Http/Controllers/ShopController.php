<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShopCart as Cart;
use Illuminate\Support\Facades\Auth;

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

    public function checkoutPage()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        if($cart === null || $cart->state->name === "checkout")
        {
            session()->flash('error', 'Error - Votre panier est vide');
            return redirect()->route('shop.products');
        }
        else{
            return view('shop.checkout');
        }
    }
}