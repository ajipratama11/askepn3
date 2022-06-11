<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasis', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('pengkajian_id')->unsigned();
            $table->string('data_objektif');
            $table->string('data_subjektif');
            $table->string('analisis');
            $table->string('planing');
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
        Schema::dropIfExists('evaluasis');
    }
}
