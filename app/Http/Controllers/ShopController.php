<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ShopCart as Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function success(){
        if(Auth::user()){
            $cart = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            if($cart === null || $cart->state->name === "checkout"){
                return redirect()->route('shop.products');
            }
            $startNumber = 1000;
            $data = 0;
            
            $lastOrder = DB::table('order')->orderBy('id', 'desc')->first();
            if($lastOrder === null){
                $data = $startNumber;
            }
            else{
                $data = (int)substr($lastOrder->number, 3) + 1;
            }
            /**
             * Setting of the Order number
             */
            $total_price = 0;

            foreach($cart->items as $item){
                $total_price += $item->quantity * (int)$item->product->price;
            }
            $total_price += 5; //for the delivery price
            
            $orderNumber = 'CMD'.$data;
            $order = new Order();
            $order->number = $orderNumber;
            $order->user_id = $cart->user_id;
            $order->state_id = 3; // 3 => Validée
            $order->cart_id = $cart->id;

            $cart->state_id = 2;
            $cart->purchase_at = now();
            $cart->save();
            $order->save();
            return redirect()->route('shop.success');
        }
    }

    public function successPage(){
        return view('shop.success');
    }

}