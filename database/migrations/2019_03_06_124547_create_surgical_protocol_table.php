<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgicalProtocolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgical_protocol', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('surgery_event_id');
            $table->foreign('surgery_event_id')->references('id')->on('surgery_events');
            $table->unsignedInteger('perfusion_doctor_id')->nullable();
            $table->foreign('perfusion_doctor_id')->references('id')->on('doctors');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->string('pre_operatory_diagnostic');
            $table->string('surgical_procedure');
            $table->string('surgery_schema_description');

            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->foreign('updated_by')->references('id')->on('users');
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('surgical_procotol');
    }
}
