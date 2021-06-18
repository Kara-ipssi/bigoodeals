<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("produits", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('reference_produit', 20);
            $table->text("description")->nullable();
            $table->double("prix");
            $table->string("nom", 50);
            $table->foreignId("id_stock")->constrained("stocks");
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
        Schema::dropIfExists("produits");
    }
}
