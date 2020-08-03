<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeJenisSayuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_jenis_sayuran', function (Blueprint $table) {
            $table->bigIncrements('id_grade_sayuran');
            $table->unsignedBigInteger('id_jenis_sayuran');
            $table->string('name_grade');
            $table->string('description');
            $table->integer('berat_min');
            $table->integer('berat_max');
            $table->timestamps();
            $table->foreign('id_jenis_sayuran')->references('id_jenis_sayuran')->on('master_jenis_sayuran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_jenis_sayuran');
    }
}
