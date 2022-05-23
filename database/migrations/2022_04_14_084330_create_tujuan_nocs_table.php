<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTujuanNocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuan_nocs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('diagnosa_id')->unsigned();
            $table->string('identifikasi_noc');
            $table->string('target_selesai');
            $table->timestamps();

            $table->foreign('diagnosa_id')->references('id')->on('diagnosas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tujuan_nocs');
    }
}
