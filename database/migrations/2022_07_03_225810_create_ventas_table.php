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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            // fk clientes
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->string('tipo_comprobante',30)->nullable();
            $table->string('num_comprobante',20)->nullable();
            $table->dateTime('fh_crea')->nullable();
            // fk users
            $table->unsignedBigInteger('user_crea');
            $table->foreign('user_crea')->references('id')->on('users');

            $table->dateTime('fh_update')->nullable();
            // fk users
            $table->unsignedBigInteger('user_update')->nullable();
            $table->foreign('user_update')->references('id')->on('users');

            $table->decimal('descuento',10,2);
            $table->decimal('impuesto',10,2);
            $table->decimal('neto',20,2);
            $table->decimal('total',20,2);
            $table->string('metodo_pago',40);

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
        Schema::dropIfExists('ventas');
    }
};
