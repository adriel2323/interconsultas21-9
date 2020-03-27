<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathologicalAnatomyLaboratorySampleBilingCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathological_anatomy_laboratory_sample_biling_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pathological_anatomy_laboratory_sample_id');
            $table->foreign('pathological_anatomy_laboratory_sample_id','pa_sample_id')->references('id')->on('pathological_anatomy_laboratory_samples');
            $table->bigInteger('billing_code');
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
        Schema::dropIfExists('pathological_anatomy_laboratory_sample_biling_codes');
    }
}
