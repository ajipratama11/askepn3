<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengkajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengkajians', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('pasien_id')->unsigned();
            $table->bigInteger('perawat_id')->unsigned();
            $table->date('tanggal');
            $table->string('ruang');
            $table->string('keluhan');
            $table->string('nadi');
            $table->string('suhu');
            $table->string('tensi_darah');
            $table->string('riwayat_penyakit_sekarang');
            $table->string('riwayat_penyakit_terdahulu');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('perawat_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengkajians');
    }
}
