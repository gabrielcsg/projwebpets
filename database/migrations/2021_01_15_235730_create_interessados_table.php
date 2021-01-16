<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteressadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interessados', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('data_nascimento');
            $table->string('telefone');
            $table->integer('endereco_id')->nullable();
            $table->timestamps();

            $table->foreign('endereco_id')->references('id')->on('enderecos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interessados');
    }
}