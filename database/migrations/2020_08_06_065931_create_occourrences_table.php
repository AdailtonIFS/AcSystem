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
        Schema::create('occurrences', function (Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('user_registration')->unsigned();
			$table->integer('laboratory_id')->unsigned();
			$table->date('date');
			$table->time('hour');
            $table->string('occurrence', 200)->nullable();
            $table->foreign('user_registration')->references('registration')->on('users');
            $table->foreign('laboratory_id')->references('id')->on('laboratories');

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
