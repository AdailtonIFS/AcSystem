<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccourrencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_ocorrencia', function (Blueprint $table) {
			$table->increments('Cod_Registro');
			$table->integer('Usuario_Matricula')->unsigned();
			$table->integer('Laboratorio_Num_Laboratorio')->unsigned();
			$table->date('Data_registro');
			$table->time('Horario_registro');
			$table->integer('ocorrencia')->unsigned();
            $table->string('observacao', 200)->nullable();
            $table->timestamps();
            $table->foreign('Usuario_Matricula')->references('Matricula')->on('usuario');
            $table->foreign('Laboratorio_Num_Laboratorio')->references('Num_Laboratorio')->on('laboratorio');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrecia_sugestao');
    }
}
