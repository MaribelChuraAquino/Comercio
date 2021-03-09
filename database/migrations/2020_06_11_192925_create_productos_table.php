<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->integer('marca_id')->unsigned();
            $table->integer('oferta_id')->unsigned()->default(1);

            $table->string('cod')->unique();
            $table->string('nombre')->nullable();
            $table->text('descripcion');
            $table->double('precio_venta', 11,2)->nullable();
            $table->string('imagen')->nullable();
            $table->json('imagenes')->nullable();
            $table->boolean('condicion')->default(1);
            $table->integer('stock')->default(0);
            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('oferta_id')->references('id')->on('ofertas');
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
}
