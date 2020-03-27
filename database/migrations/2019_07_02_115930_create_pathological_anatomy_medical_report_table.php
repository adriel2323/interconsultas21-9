<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathologicalAnatomyMedicalReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathological_anatomy_medical_report', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pathological_anatomy_laboratory_sample_id');
            $table->foreign('pathological_anatomy_laboratory_sample_id')->references('id')->on('pathological_anatomy_laboratory_samples');
            $table->text('medical_report');
            $table->softDeletes();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('pathological_anatomy_medical_report');
    }
}
