<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugestoes_ocorrencias', function (Blueprint $table) {
            $table->increments('cod_Sugestao');
			$table->integer('Usuario_Matricula')->unsigned();
			$table->string('Descricao', 400);
            $table->timestamps();

            $table->foreign('Usuario_Matricula')->references('Matricula')->on('usuario');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suggestions');
    }
}
