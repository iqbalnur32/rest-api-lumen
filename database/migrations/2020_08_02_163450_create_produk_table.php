<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_petani', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->unsignedBigInteger('id_grade_sayuran');
            $table->unsignedBigInteger('id_toko');
            $table->string('product_name');
            $table->string('stock');
            $table->string('price');
            $table->timestamps();
            $table->foreign('id_grade_sayuran')->references('id_grade_sayuran')->on('grade_jenis_sayuran')->onDelete('cascade');
            $table->foreign('id_toko')->references('id_toko')->on('toko_petani')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_petani');
    }
}
