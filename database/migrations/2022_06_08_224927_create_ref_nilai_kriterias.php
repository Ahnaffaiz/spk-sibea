<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefNilaiKriterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_nilai_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ref_kriterias_id');
            $table->string('nama_awal');
            $table->string('nama_akhir')->nullable();
            $table->float('nilai', 8, 2);

            $table->foreign('ref_kriterias_id')->references('id')->on('ref_kriterias');
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
        Schema::dropIfExists('ref_nilai_kriterias');
    }
}
