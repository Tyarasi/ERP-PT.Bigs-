<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukkans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenisproduk')->unsigned();
            $table->date('tgl_pemasukan');
            $table->integer('biaya');
            $table->timestamps();


            $table->foreign('id_jenisproduk')->on('jenis_produks')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemasukkans');
    }
};