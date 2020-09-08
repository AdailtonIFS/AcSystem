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
        Schema::create('users', function (Blueprint $table) {
			$table->bigInteger('registration')->unsigned()->primary();
			$table->integer('category_id')->unsigned();
			$table->string('name', 40);
			$table->string('email', 40);
            $table->string('password', 255);
            $table->string('token',255)->nullable();
            $table->char('status', 1);
            $table->rememberToken();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
