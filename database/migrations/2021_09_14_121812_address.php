<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Address extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->string('street',50);
            $table->string('postal_code',10)->nullable();
            $table->string('city',50)->nullable();
            $table->string('country',50)->nullable();
            $table->text('more_info')->nullable();
            $table->text('phone')->nullable();
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('address');
    }
}
