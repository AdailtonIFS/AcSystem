<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapaUtilizacaoLaboratorioTable extends Migration
{
    public function up()
    {
        Schema::create('mapa_utilizacao_laboratorio', function (Blueprint $table) {

		$table->integer('Ano',10)->unsigned();
		$table->integer('Semestre',10)->unsigned();
		$table->integer('Dia_Semana',10)->unsigned();
		$table->integer('Horarios_idHorario',10)->unsigned();
		$table->integer('Laboratorio_Num_Laboratorio',10)->unsigned();
		$table->integer('Usuario_Matricula',10)->unsigned();
        $table->primary(['Ano','Semestre','Dia_Semana','Horarios_idHorario','Laboratorio_Num_Laboratorio']);
        
        $table->foreign('Horarios_idHorario')->references('idHorario')->on('horarios');
        $table->foreign('Usuario_Matricula')->references('Matricula')->on('usuarios');
        $table->foreign('Laboratorio_Num_Laboratorio')->references('Num_Laboratorio')->on('laboratorio');

        });
    }

    public function down()
    {
        Schema::dropIfExists('mapa_utilizacao_laboratorio');
    }
}