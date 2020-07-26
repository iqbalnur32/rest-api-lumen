<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_petani', function (Blueprint $table) {
            $table->BigIncrements('id_topic');
            $table->unsignedBigInteger('id_users');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
            $table->foreign('id_users')->references('id_users')->on('users_petani')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_petani');
    }
}
