<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('slug');
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->integer('ativo')->default(true);
            $table->double('preco');
            $table->string('sabor')->nullable();
            $table->integer('estoque')->nullable();
            $table->integer('prazo_confeccao')->default(0);
            $table->timestamps();
            
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
