<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhpNilaiKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahp_nilai_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ref_nilai_kriterias_id');
            $table->double('prioritas');

            $table->foreign('ref_nilai_kriterias_id')->references('id')->on('ref_nilai_kriterias');
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
        Schema::dropIfExists('ahp_nilai_kriterias');
    }
}
