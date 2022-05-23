<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienNicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien_nics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pengkajian_id')->unsigned();
            $table->bigInteger('diagnosa_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('pengkajian_id')->references('id')->on('pengkajians')->onDelete('cascade');
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
        Schema::dropIfExists('pasien_nics');
    }
}
