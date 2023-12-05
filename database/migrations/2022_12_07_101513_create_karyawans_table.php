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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenisjabatan')->unsigned();
            $table->integer('nik_karyawan');
            $table->string('nama_karyawan');
            
            $table->string('no_hp', 20);
            $table->string('email', 250);
            $table->string('alamat', 250);
            $table->string('foto_karyawan');
            $table->timestamps();
 
            $table->foreign('id_jenisjabatan')->on('jenis_jabatans')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
};