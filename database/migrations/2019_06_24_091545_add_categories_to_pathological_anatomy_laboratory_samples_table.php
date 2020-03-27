<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriesToPathologicalAnatomyLaboratorySamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pathological_anatomy_laboratory_samples', function (Blueprint $table) {
            $table->unsignedInteger('pathological_category_level_one_id')->nullable();
            $table->foreign('pathological_category_level_one_id')->references('id')->on('pathology_category_class_one');

            $table->unsignedInteger('pathological_category_level_two_id')->nullable();
            $table->foreign('pathological_category_level_two_id')->references('id')->on('pathology_category_class_two');

            $table->unsignedInteger('pathological_category_level_three_id')->nullable();
            $table->foreign('pathological_category_level_three_id')->references('id')->on('pathology_category_class_three');

            $table->unsignedInteger('pathological_category_level_four_id')->nullable();
            $table->foreign('pathological_category_level_four_id')->references('id')->on('pathology_category_class_four');
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
