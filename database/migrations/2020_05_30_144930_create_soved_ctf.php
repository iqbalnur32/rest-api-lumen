<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSovedCtf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solved_ctf', function (Blueprint $table) {
            $table->increments('id_solved');
            $table->integer('id_users')->unsigned();
            $table->integer('id_task')->unsigned();
            $table->foreign('id_users')->references('id_users')->on('users_ctf');
            $table->foreign('id_task')->references('id_task')->on('task_ctf');
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
        Schema::dropIfExists('solved_ctf');
    }
}
