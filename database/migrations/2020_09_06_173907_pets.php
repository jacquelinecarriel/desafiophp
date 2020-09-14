<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('Pets', function(Blueprint $table){
           $table->bigIncrements('id');
           $table->string('nome',100);
           $table->string('especie',100);
           $table->string('genero',100);
           $table->string('nascimento',20);
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
        Schema::drop('Pets');
    }
}