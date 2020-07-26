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
        Schema::create('users_petani', function (Blueprint $table) {
            $table->BigIncrements('id_users');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('status');
            $table->string('token')->nullable();
            $table->integer('level_id');
            $table->timestamps();
            // $table->foreign('level_id')->references('id_level')->on('petani_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_petani');
    }
}
