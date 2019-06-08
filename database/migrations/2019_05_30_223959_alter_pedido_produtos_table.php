<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPedidoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedido_produtos', function (Blueprint $table) {
            $table->unsignedInteger('flavor_id')->after('product_id');

            $table->foreign('flavor_id')->references('id')->on('flavors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido_produtos', function (Blueprint $table) {
            $table->dropForeign(['flavor_id']);
            $table->dropColumn('flavor_id');
        });
    }
}
