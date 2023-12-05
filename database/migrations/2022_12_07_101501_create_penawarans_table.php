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
        Schema::create('penawarans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->unsigned();
            $table->string('jenisprioritas', 250);
            $table->integer('id_jenisproduk')->unsigned();
            $table->string('statuspenawaran', 250);
            $table->string('nama_penawaran', 250);
            $table->integer('deal_value');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('id_customer')->on('customers')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('penawarans');
    }
};