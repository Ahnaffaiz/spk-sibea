<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProDiffMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_diff_matrices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beasiswas_id');
            $table->unsignedBigInteger('first_alternatives_id');
            $table->unsignedBigInteger('second_alternatives_id');
            $table->double('sta');
            $table->double('sti');
            $table->double('spa');            
            $table->double('spi');            
            $table->double('ska');
            $table->double('ski');
            $table->double('sha');
            $table->double('shi');
            $table->double('sho');
            $table->double('skr');
            $table->double('sjt');
            $table->double('skj');
            $table->double('agregate_function')->nullable();

            $table->foreign('beasiswas_id')->references('id')->on('beasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('first_alternatives_id')->references('id')->on('pro_alternatives')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('second_alternatives_id')->references('id')->on('pro_alternatives')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pro_diff_matrices');
    }
}
