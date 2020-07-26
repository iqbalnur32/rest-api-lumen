<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_topic_petani', function (Blueprint $table) {
            $table->increments('id_reply');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_topic');
            $table->text('content');
            $table->timestamps();
            $table->foreign('id_users')->references('id_users')->on('users_petani')->onDelete('cascade');
            $table->foreign('id_topic')->references('id_topic')->on('topic_petani')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply_topic_petani');
    }
}
