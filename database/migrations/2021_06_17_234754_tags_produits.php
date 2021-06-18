<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TagsProduits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tags_produits", function(Blueprint $table){
            $table->bigIncrements("id");
            $table->foreignId("id_tag")->constrained("tags");
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
        Schema::dropIfExists("tags_produits");
    }
}
