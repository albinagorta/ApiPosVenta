<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            
            // fk users
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias');

            $table->string('nombre');
            $table->string('codigo')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('imagen')->nullable();
            $table->integer('stock')->nullable();
            $table->decimal('precio',20,2)->nullable();
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
        Schema::dropIfExists('productos');
    }
};
