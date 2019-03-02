<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendedoresHasProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedores_has_produtos', function (Blueprint $table) {
            $table->integer('vendedor_id')->unsigned();
            $table->foreign('vendedor_id')->references('id')->on('vendedors');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
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
        Schema::dropIfExists('vendedores_has_produtos');
    }
}
