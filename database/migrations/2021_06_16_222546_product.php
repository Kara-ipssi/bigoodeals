<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("product", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('reference', 20)->unique();
            $table->string("name", 50);
            $table->text("description")->nullable();
            $table->double("price");
            $table->string("stripe_price")->unique();
            $table->boolean("isActivated")->default(false);
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
        Schema::dropIfExists("product");
    }
}
