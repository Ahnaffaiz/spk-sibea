<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beasiswas_id');
            $table->string('nama');
            $table->unsignedBigInteger('penghasilan');
            $table->unsignedBigInteger('status_ayah');
            $table->unsignedBigInteger('status_ibu');
            $table->unsignedBigInteger('status_rumah');
            $table->unsignedBigInteger('pend_ayah');            
            $table->unsignedBigInteger('pend_ibu');            
            $table->unsignedBigInteger('kerja_ayah');
            $table->unsignedBigInteger('kerja_ibu');
            $table->unsignedBigInteger('hasil_ayah');
            $table->unsignedBigInteger('hasil_ibu');
            $table->unsignedBigInteger('tanggungan');
            $table->unsignedBigInteger('skor_jiwa');
            $table->boolean('is_accepted_ahp');
            $table->boolean('is_accepted_promethe');
            $table->boolean('is_accepted_actual');
            $table->integer('ranking_ahp');
            $table->integer('ranking_promethe');
            $table->integer('ranking_actual');

            $table->foreign('beasiswas_id')->references('id')->on('beasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('penghasilan')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_ayah')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_ibu')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_rumah')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pend_ayah')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('pend_ibu')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('kerja_ayah')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kerja_ibu')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hasil_ayah')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hasil_ibu')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tanggungan')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('skor_jiwa')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pendaftar');
    }
}
