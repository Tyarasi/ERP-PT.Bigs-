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
        Schema::create('kontraks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenisproduk')->unsigned();
            $table->integer('id_cs')->unsigned(); 
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('status', 250);
            $table->timestamps();
 
            $table->foreign('id_jenisproduk')->on('jenis_produks')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_cs')->on('customers')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontraks');
    }
};