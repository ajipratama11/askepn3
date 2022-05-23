<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImplementasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('implementasis', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('pengkajian_id')->unsigned();
            $table->string('nic');
            $table->string('tanggal');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('pengkajian_id')->references('id')->on('pengkajians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('implementasis');
    }
}
