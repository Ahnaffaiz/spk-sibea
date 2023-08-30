<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSawAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saw_alternatives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendaftars_id');
            $table->unsignedBigInteger('beasiswas_id');
            $table->double('total')->nullable();
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
        Schema::dropIfExists('saw_alternatives');
    }
}
