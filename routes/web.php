<?php
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('product.test');
});


//dashboard routes
Route::get('/dashboard', ['uses'=>'App\Http\Controllers\HomeController@index', 'as'=>'dashboard'])->middleware(['auth:sanctum', 'verified']);


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
            return Redirect::route('product.index');
        });
});


