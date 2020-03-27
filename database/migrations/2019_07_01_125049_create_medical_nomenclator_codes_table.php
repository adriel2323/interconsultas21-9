<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalNomenclatorCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_nomenclator_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medical_nomenclator_id');
            $table->foreign('medical_nomenclator_id')->references('id')->on('medical_nomenclator');
            $table->string('code');
            $table->string('description');
            $table->float('spending_unit');
            $table->float('specialist_fee_unit');
            $table->float('specialist_helper_fee_unit');
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
        Schema::dropIfExists('medical_nomenclator_codes');
    }
}
