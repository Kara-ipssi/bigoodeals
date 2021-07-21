<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Utilisateurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("utilisateurs",function(Blueprint $table){
            $table->bigIncrements("id");
            $table->string("nom", 50);
            $table->string("prenom", 50);
            $table->string("adresse_email", 50);
            $table->string("password");
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
        Schema::dropIfExists("utilisateurs");
    }
}
