<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilCongresistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_congresistas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_camara')->constrained('parametros');
            $table->string('nombre');
            $table->string('apellidos');
            $table->foreignId('id_territorio')->constrained('parametros');
            $table->integer('numTerritorio');
            $table->foreignId('id_partido')->constrained('parametros');
            $table->string('email');
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
        Schema::dropIfExists('perfil_congresistas');
    }
}
