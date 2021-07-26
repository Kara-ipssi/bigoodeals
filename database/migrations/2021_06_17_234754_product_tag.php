<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("product_tag", function(Blueprint $table){
            $table->bigIncrements("id");
            $table->foreignId("tag_id")->constrained("tag");
            $table->foreignId("product_id")->constrained("product");
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
        Schema::dropIfExists("product_tag");
    }
}
