<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/test', function () {
    return view('product.test');
})->name('test');

Route::get('/404', function () {
    return view('error.page404');
})->name('test');



//dashboard routes
Route::get('/dashboard/index', ['uses'=>'App\Http\Controllers\HomeController@index', 'as'=>'dashboard'])->middleware(['auth:sanctum', 'verified']);


/**
 * contain the CRUD for the tags routes (create, Read, Update, Delete)
 * Can also write:
 * Route:get('/tags', ['uses'=>'TagController@create', 'as'=> 'tags.create'])->middleware(['auth:sanctum', 'verified']);
 * for the create route, we can do the same for all actions.
 */

Route::group(['middleware'=>'auth:sanctum'], function(){
    /**
     * Tags Routes
     */
    Route::resource('/dashboard/tags', TagController::class)
        ->missing(function (Request $request) {
            return Redirect::route('tags.index');
        });

    /**
     * Products Routes
     */
    Route::resource('/dashboard/products', ProductController::class)
        ->missing(function (Request $request) {
            return Redirect::route('products.index');
        });

    /**
     * Categories routes
     * CRUD
     */
    Route::resource('/dashboard/categories', CategoryController::class)
        ->missing(function (Request $request){
            return Redirect::route('categories.index');
        });
});

/**
 * Shop routes
 */
Route::name('shop.')->group(function () {

    Route::get('/', function () {
        return Redirect::route('shop.index');
    });

    // Route name "shop.index"
    Route::get('/shop', function () {
        return view('shop.index'); 
    })->name('index');

    // Route name "shop.products"
    Route::get('/shop/products', function () {
        return view('shop.products');
    })->name('products');

    // Route::get('/shop/products/{id}', function(){
        
    // })->name('product');
    Route::get('/shop/products/{id}', [ShopController::class ,'showProduct'])->name('product.show');
});


