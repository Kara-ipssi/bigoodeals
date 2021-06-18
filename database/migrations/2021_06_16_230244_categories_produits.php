<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriesProduits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("categories_produits", function(Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("id_categorite")->constrained("categories");
            $table->foreignId("id_produit")->constrained("produits");
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
        Schema::dropIfExists("categories_produits");
    }
}
