<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaplaboratoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uso_labs', function (Blueprint $table) {
            $table->integer('Ano')->unsigned();
			$table->integer('Semestre')->unsigned();
			$table->integer('Dia_Semana')->unsigned();
			$table->integer('Horarios_idHorario')->unsigned();
			$table->integer('Laboratorio_Num_Laboratorio')->unsigned();
			$table->integer('Usuario_Matricula')->unsigned();
            $table->primary(['Ano','Semestre','Dia_Semana','Horarios_idHorario','Laboratorio_Num_Laboratorio']);
            $table->timestamps();

            $table->foreign('Laboratorio_Num_Laboratorio')->references('Num_Laboratorio')->on('laboratorio');
            $table->foreign('Usuario_Matricula')->references('Matricula')->on('usuario');
            $table->foreign('Horarios_idHorario')->references('idHorario')->on('horarios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapa_utilizacao_laboratorio');
    }
}
