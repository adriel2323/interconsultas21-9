<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathologyCategoryClassFourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathology_category_class_four', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('code');

            $table->string('name');

            $table->unsignedInteger('pathology_category_class_three_id');
            $table->foreign('pathology_category_class_three_id')->references('id')->on('pathology_category_class_three');

            $table->timestamps();

            $table->softDeletes();

            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->foreign('created_by')->references('id')->on('users');

            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->foreign('updated_by')->references('id')->on('users');

            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pathology_category_class_four');
    }
}
