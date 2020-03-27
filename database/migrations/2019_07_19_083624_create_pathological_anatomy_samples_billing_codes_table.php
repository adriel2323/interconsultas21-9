<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathologicalAnatomySamplesBillingCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathological_anatomy_samples_billing_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pa_sample_id');
            $table->foreign('pa_sample_id')->references('id')->on('pathological_anatomy_laboratory_samples');
            $table->unsignedInteger('nomenclator_practice_id');
            $table->foreign('nomenclator_practice_id')->references('id')->on('nomenclator');
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
        Schema::dropIfExists('pathological_anatomy_samples_billing_codes');
    }
}
