<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->dateTime('fh_crea')->nullable();
            $table->dateTime('fh_update')->nullable();
            // fk users
            $table->unsignedBigInteger('user_crea');
            $table->foreign('user_crea')->references('id')->on('users');

            // fk users
            $table->unsignedBigInteger('user_update')->nullable();
            $table->foreign('user_update')->references('id')->on('users');

            $table->boolean('in_estado')->default(1);        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
