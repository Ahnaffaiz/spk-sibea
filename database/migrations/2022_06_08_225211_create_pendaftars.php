<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beasiswas_id');
            $table->string('nama');
            $table->unsignedBigInteger('sta')->nullable();
            $table->unsignedBigInteger('sti')->nullable();
            $table->unsignedBigInteger('spa')->nullable();            
            $table->unsignedBigInteger('spi')->nullable();            
            $table->unsignedBigInteger('ska')->nullable();
            $table->unsignedBigInteger('ski')->nullable();
            $table->unsignedBigInteger('sha')->nullable();
            $table->unsignedBigInteger('shi')->nullable();
            $table->unsignedBigInteger('sho')->nullable();
            $table->unsignedBigInteger('skr')->nullable();
            $table->unsignedBigInteger('sjt')->nullable();
            $table->unsignedBigInteger('skj')->nullable();
            $table->boolean('is_accepted_ahp')->nullable();
            $table->boolean('is_accepted_promethee')->nullable();
            $table->boolean('is_accepted_actual')->nullable();
            $table->integer('ranking_ahp')->nullable();
            $table->integer('ranking_promethee')->nullable();
            $table->integer('ranking_actual')->nullable();

            $table->foreign('beasiswas_id')->references('id')->on('beasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sta')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sti')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('spa')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('spi')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('ska')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ski')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sha')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shi')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sho')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('skr')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sjt')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('skj')->references('id')->on('ref_nilai_kriterias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pendaftars');
    }
}
