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
        Schema::create('stak_tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('id_stakeholder');
            $table->integer('id_project');
            $table->timestamps();

            $table->foreign('id_stakeholder')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_project')->on('projects')->references('id')->onUpdate('cascade')->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stak_tasks');
    }
};