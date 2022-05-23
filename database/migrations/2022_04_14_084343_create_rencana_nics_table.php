<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencanaNicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_nics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('diagnosa_id')->unsigned();
            $table->string('identifikasi_nic');
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
        Schema::dropIfExists('rencana_nics');
    }
}
