<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Livewire\Component;
use App\Models\ShopCart as Cart;
use App\Models\ShopCartContent as CartContent;
use Illuminate\Support\Facades\Auth;

class ShopCheckoutForm extends Component
{
    public $cart;
    public $cartCount;

    public $email;
    public $firstname;
    public $lastname;

    
    public $name;
    //Adresse street
    public $street;
    public $more_info;
    public $postal_code;
    public $city;
    public $country;
    public $phone;

    public $delivery;

    public $subtotal = 0;
    public $total = 0;

    public $itemLines = [];

    public $addressList = [];

    public function mount()
    {
        if(Auth::user()){
            $this->cart = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            if($this->cart === null || $this->cart->state->name === "checkout")
            {
                $cart = new Cart();
                $cart->user_id = Auth::user()->id;
                $cart->state_id = 1; // 1 fort create, 2 for checkout 
                $cart->total = 0;

                $cart->save();
                $this->cart = $cart;
            }

            $this->email = Auth::user()->email;
            $this->delivery = "5";

            foreach($this->cart->items as $item){
                $this->total += (int)($item->quantity) * (int)($item->product->price) + (int)$this->delivery;
            }

            $this->cart->total = $this->total;
            $this->cart->save();

            $this->subtotal = $this->total - (int)$this->delivery;

            $this->addressList = Address::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            // if(count($this->addressList) > 0){

            // }
        }
    }

    protected $rules = [
        'firstname' => 'required|max:50',
        'lastname' => 'required|max:50',
        'email' => 'required|max:50',
        'street' => 'required|max:50',
        'more_info' => 'max:100',
        'country'=> 'required',
        'city'=> 'required',
        'phone' => 'min:10|max:13',
        'delivery' => 'required'
    ];

    protected $messages = [
        //
    ];

    public function saveInfos()
    {
        $this->validate();
        
        $address = new Address();
        $address->name = $this->firstname.' '.$this->lastname;
        $address->firstname = $this->firstname;
        $address->lastname = $this->lastname;
        $address->street = $this->street;
        $address->postal_code = $this->postal_code;
        $address->more_info = $this->more_info;
        $address->phone = $this->phone;
        $address->user_id = Auth::user()->id;
        $address->country = $this->country;
        $address->city = $this->city;
        $address->save();
        
        foreach($this->cart->items as $item){
            $newItemLine = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'T-shirt',
                    ],
                    'unit_amount' => 2000,
                ],
                'quantity' => 0,
            ];
            $newItemLine['price_data']['product_data']['name'] = $item->product->name;
            $newItemLine['price_data']['unit_amount'] = (int)$item->product->price * 100;
            $newItemLine['quantity'] = $item->quantity;

            $this->itemLines[] = $newItemLine;
        }

        $shippingItemLine = [
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => 'Livraison standard',
                ],
                'unit_amount' => 500,
            ],
            'quantity' => 1,
        ];

        $this->itemLines[] = $shippingItemLine;

        $this->stripeCheckoutSession();
    }

    public function stripeCheckoutSession()
    {
        $stripe = \Stripe\Stripe::setApiKey(env('STRIP_KEY'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => $this->email,
            'line_items' => $this->itemLines,
            'mode' => 'payment',
            'success_url' => env('APP_URL').'/shop/checkout/success',
            'cancel_url' => env('APP_URL').'/shop/checkout/cancel',
        ]);
        return redirect($session->url);
    }









    public function render()
    {
        return view('livewire.shop.shop-checkout-form');
    }
}
