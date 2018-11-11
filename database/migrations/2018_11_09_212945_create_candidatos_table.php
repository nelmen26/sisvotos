<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fotografia');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('color');
            $table->integer('tipo_id')->unsigned();
            $table->enum('estado',['A','D'])->default('A');
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos');
    }
}
