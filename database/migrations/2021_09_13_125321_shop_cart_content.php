<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShopCartContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_cart_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->foreignId('product_id')->constrained('product');
            $table->foreignId('size_id')->constrained('stock');
            $table->foreignId('shop_cart_id')->constrained('shop_cart');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_cart_content');
    }
}
