<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterconsultingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interconsulting', function (Blueprint $table) {
            $table->increments('id');

            $table->string('patient_name')->nullable();

            $table->integer('requester_id')->unsigned()->nullable();
            $table->foreign('requester_id')->references('id')->on('users');

            $table->integer('requested_service_id')->unsigned()->nullable();
            $table->foreign('requested_service_id')->references('id')->on('services');

            $table->integer('requested_doctor_id')->unsigned()->nullable();
            $table->foreign('requested_doctor_id')->references('id')->on('doctors');

            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('interconsulting_statuses');

            $table->integer('room_id')->unsigned()->nullable();
            $table->foreign('room_id')->references('id')->on('rooms');

            $table->text('observations');

            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->foreign('created_by')->references('id')->on('users');

            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->foreign('updated_by')->references('id')->on('users');

            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->foreign('deleted_by')->references('id')->on('users');

            $table->timestamp('deleted_at')->nullable();

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
        Schema::dropIfExists('interconsulting');
    }
}
