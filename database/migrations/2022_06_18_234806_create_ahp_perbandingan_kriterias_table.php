<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhpPerbandinganKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahp_perbandingan_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beasiswas_id');
            $table->unsignedBigInteger('first_ref_kriterias_id');
            $table->unsignedBigInteger('last_ref_kriterias_id');
            $table->double('bobot');
            $table->double('nilai')->nullable();

            $table->foreign('beasiswas_id')->references('id')->on('beasiswas');
            $table->foreign('first_ref_kriterias_id')->references('id')->on('ref_kriterias');
            $table->foreign('last_ref_kriterias_id')->references('id')->on('ref_kriterias');
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
        Schema::dropIfExists('ahp_perbandingan_kriterias');
    }
}
