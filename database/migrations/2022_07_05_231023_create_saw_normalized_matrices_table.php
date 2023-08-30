<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSawNormalizedMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saw_normalized_matrices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saw_alternatives_id');
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

            $table->foreign('saw_alternatives_id')->references('id')->on('saw_alternatives')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('saw_normalized_matrices');
    }
}
