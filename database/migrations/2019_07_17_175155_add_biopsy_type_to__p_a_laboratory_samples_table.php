<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBiopsyTypeToPALaboratorySamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pathological_anatomy_laboratory_samples', function (Blueprint $table) {
            $table->unsignedInteger('biopsy_type_id')->nullable();
            $table->foreign("biopsy_type_id")->references('id')->on('biopsies_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pathological_anatomy_laboratory_samples', function (Blueprint $table) {
            //
        });
    }
}
