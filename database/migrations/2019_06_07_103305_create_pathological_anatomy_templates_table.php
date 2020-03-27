<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathologicalAnatomyTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathological_anatomy_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('template_category_id');
            $table->foreign('template_category_id')->references('id')->on('pathological_anatomy_templates_titles');
            $table->string('code');
            $table->string('description',1000);
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pathological_anatomy_templates');
    }
}
