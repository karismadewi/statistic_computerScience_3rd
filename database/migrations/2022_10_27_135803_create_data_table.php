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
        Schema::create('data', function (Blueprint $table) {
            $table->integer('id')->unsigned(); 
            $table->string('nama')->nullable();
            $table->integer('tugas1')->nullable();
            
            $table->integer('uts')->nullable();
            $table->integer('tugas2')->nullable();
            $table->integer('kuis')->nullable();
            $table->integer('uas')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
};
