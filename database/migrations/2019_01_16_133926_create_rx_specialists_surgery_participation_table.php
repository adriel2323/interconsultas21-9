<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRxSpecialistsSurgeryParticipationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rx_specialists_surgery_participation', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('surgery_event_id')->unsigned()->nullable();
            $table->foreign('surgery_event_id')->references('id')->on('surgery_events');

            $table->integer('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rx_specialists_surgery_participation');
    }
}
