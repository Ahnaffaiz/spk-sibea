<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhpJumlahKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahp_jumlah_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beasiswas_id');
            $table->unsignedBigInteger('ref_kriterias_id');
            $table->double('jumlah')->nullable();
            $table->double('prioritas')->nullable();
            $table->double('eigen')->nullable();

            $table->foreign('beasiswas_id')->references('id')->on('beasiswas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ahp_jumlah_kriterias');
    }
}
