<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRotasHasBairrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rotas_has_bairros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bairro_id')->unsigned();            
            $table->integer('rota_id')->unsigned();
            $table->foreign('bairro_id')->references('id')->on('bairros');
            $table->foreign('rota_id')->references('id')->on('rotas');           
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
        Schema::dropIfExists('rotas_has_bairros');
    }
}
