<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeryEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgery_events', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->dateTime('start_date');

            $table->dateTime('end_date');

            $table->integer('resource_id')->unsigned();
            $table->foreign('resource_id')->references('id')->on('surgery_rooms');

            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('event_status');

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
        Schema::dropIfExists('surgery_events');
    }
}
