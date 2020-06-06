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
        Schema::create("users_ctf", function (Blueprint $table) {
            $table->increments("id_users");
            $table->string("username");
            $table->string("email");
            $table->string("password");
            $table->string("login");
            $table->date("last_login");
            $table->integer("level_id")->unsigned();
            // $table->foreign("level_id")->reference("id_level")->on("users_level");
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
        Schema::dropIfExists("users");
    }
}
