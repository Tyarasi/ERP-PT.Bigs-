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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_task',200);
            $table->string('type', 100);
            $table->string('for', 100);
            $table->string('priority', 200);
            $table->string('task', 200);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('id_stakeholder');
            $table->integer('id_modul');
            $table->string('status', null);
            $table->timestamps();

            $table->foreign('id_stakeholder')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_modul')->on('moduls')->references('id')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};