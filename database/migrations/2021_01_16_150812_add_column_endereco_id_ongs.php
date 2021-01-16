<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEnderecoIdOngs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ongs', function (Blueprint $table) {
            $table->integer("endereco_id")->nullable();

            $table->foreign("endereco_id")
                ->references("id")
                ->on("enderecos")
                ->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ongs', function (Blueprint $table) {
            $table->dropColumn('endereco_id');
        });
    }
}
