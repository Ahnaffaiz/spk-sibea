<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhpAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahp_alternatives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendaftars_id');
            $table->unsignedBigInteger('beasiswas_id');
            $table->double('sta')->nullable();
            $table->double('sti')->nullable();
            $table->double('spa')->nullable();            
            $table->double('spi')->nullable();            
            $table->double('ska')->nullable();
            $table->double('ski')->nullable();
            $table->double('sha')->nullable();
            $table->double('shi')->nullable();
            $table->double('sho')->nullable();
            $table->double('skr')->nullable();
            $table->double('sjt')->nullable();
            $table->double('skj')->nullable();
            $table->double('total')->nullable();
            $table->double('ranking')->nullable();

            $table->foreign('beasiswas_id')->references('id')->on('beasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pendaftars_id')->references('id')->on('pendaftars')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ahp_alternatives');
    }
}
