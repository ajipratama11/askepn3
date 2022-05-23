<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKajianPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajian_pasiens', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pengkajian');
            $table->string('keluhan');
            $table->bigInteger('perawat_id')->unsigned();
            $table->bigInteger('pasien_id')->unsigned();
            $table->timestamps();

            $table->foreign('perawat_id')->references('id')->on('perawats')->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kajian_pasiens');
    }
}
