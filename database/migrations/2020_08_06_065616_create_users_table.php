<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {

			$table->integer('Matricula')->unsigned()->primary();
			$table->integer('Categoria_Cod_Categoria')->unsigned();
			$table->string('Nome', 40);
			$table->string('Senha', 20);
            $table->char('Status_Usuario', 1);
            $table->timestamps();

            $table->foreign('Categoria_Cod_Categoria')->references('Cod_Categoria')->on('categoria');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
