<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteressadoPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interessados_pets', function (Blueprint $table) {
            $table->id();
            $table->integer("interessado_id");
            $table->integer("pet_id");
            $table->timestamps();

            $table->foreign("interessado_id")->references("id")->on("interessados");
            $table->foreign("pet_id")->references("id")->on("pets");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interessados_pets');
    }
}
