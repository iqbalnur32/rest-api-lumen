<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toko_petani', function (Blueprint $table) {
            $table->bigIncrements('id_toko');
            $table->unsignedBigInteger('id_users');
            $table->string('email');
            $table->string('nama_toko');
            $table->string('alamat_toko');
            $table->integer('no_telp');
            $table->enum('status', ['waiting', 'verifed', 'rejected']);
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
        Schema::dropIfExists('toko_petani');
    }
}
