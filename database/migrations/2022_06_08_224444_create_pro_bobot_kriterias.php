<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProBobotKriterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_bobot_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beasiswas_id');
            $table->unsignedBigInteger('ref_kriterias_id');
            $table->float('bobot', 8, 2);

            $table->foreign('beasiswas_id')->references('id')->on('beasiswas');
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
        Schema::dropIfExists('pro_bobot_kriterias');
    }
}
