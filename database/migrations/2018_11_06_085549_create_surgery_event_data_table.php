<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeryEventDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgery_event_data', function (Blueprint $table) {

            $table->integer('surgery_event_id')->unsigned()->nullable();
            $table->foreign('surgery_event_id')->references('id')->on('surgery_events');

            $table->integer('room_id')->unsigned()->nullable();
            $table->foreign('room_id')->references('id')->on('rooms');

            $table->integer('os')->unsigned()->nullable();
            $table->foreign('os')->references('id')->on('os')->onDelete('set null');

            $table->string("patient_document");

            $table->string("patient_name");

            $table->integer('surgery_type_id')->unsigned()->nullable();
            $table->foreign('surgery_type_id')->references('id')->on('surgery_types');

            $table->integer('surgeon_id')->unsigned()->nullable();
            $table->foreign('surgeon_id')->references('id')->on('doctors');

            $table->integer('origin_room_id')->unsigned()->nullable();
            $table->foreign('origin_room_id')->references('id')->on('rooms');

            $table->string("comments")->nullable();

            $table->boolean("biopsy");

            $table->boolean('transitory_check_in');

            $table->boolean('local_anesthesia');

            $table->boolean('sedation');

            $table->boolean('x_ray_specialist_needed');

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
        Schema::dropIfExists('surgery_event_data');
    }
}
