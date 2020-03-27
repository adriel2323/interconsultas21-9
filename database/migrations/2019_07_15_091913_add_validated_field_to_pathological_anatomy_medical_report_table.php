<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValidatedFieldToPathologicalAnatomyMedicalReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pathological_anatomy_medical_report', function (Blueprint $table) {
            $table->timestamp('validated_at')->nullable();
            $table->unsignedInteger('validated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pathological_anatomy_medical_report', function (Blueprint $table) {
            //
        });
    }
}
