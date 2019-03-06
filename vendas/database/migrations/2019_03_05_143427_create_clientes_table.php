<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf')->unsigned()->nullable(false)->change();  
            $table->string('rg')->unsigned()->nullable(false)->change();              
            $table->string('nome');
            $table->string('foto');
            $table->string('email')->nullable(false)->change();  
            $table->date('nascimento');
            $table->string('estado_civil');
            $table->string('sexo');
            $table->integer('dependentes');                  
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
        Schema::dropIfExists('clientes');
    }
}
