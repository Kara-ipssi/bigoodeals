<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with(["products"=>$products]);

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $tags = Tag::All();
        return view("product.create")->with(['tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->reference = $request->reference;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stripe_price = $request->stripe_price;

        $product->save();

        return redirect()->route('products.index')->with("success", "produit ajouté !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function edit(Product $product)
    {
        return view("product.edit")->with(["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Product $product
     */
    public function update(Request $request, Product $product)
    {

        $product->reference = $request->reference != null ? $request->reference : $product->reference ;
        $product->name = $request->name != null ? $request->name : $product->name;
        $product->description = $request->description != null ? $request->description : $product->description;
        $product->price = $request->price != null ? $request->price : $product->price;
        $product->stripe_price = $request->stripe_price != null ? $request->stripe_price : $product->stripe_price;

        $product->save();

        return redirect()->route('products.index')->with("success", "produit modifié !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
