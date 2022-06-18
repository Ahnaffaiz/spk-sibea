<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_alternatives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendaftars_id');
            $table->unsignedBigInteger('beasiswas_id');
            $table->double('leaving_flow')->nullable();
            $table->double('entering_flow')->nullable();
            $table->double('outranking_flow')->nullable();
            $table->integer('ranking')->nullable();

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
        Schema::dropIfExists('pro_alternatives');
    }
}
