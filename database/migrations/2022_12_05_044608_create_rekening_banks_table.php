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
        Schema::create('rekening_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_namabank')->unsigned();
            $table->integer('nomor_rekening');
            $table->string('nama_pemilik');
            $table->timestamps();
 
            $table->foreign('id_namabank')->on('jenis_banks')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekening_banks');
    }
};