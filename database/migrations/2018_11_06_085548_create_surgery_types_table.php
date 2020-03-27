<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeryTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgery_types', function (Blueprint $table) {
            $table->increments('id');

            $table->text('description');

            $table->timestamps();

            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->foreign('created_by')->references('id')->on('users');

            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->foreign('updated_by')->references('id')->on('users');

            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->foreign('deleted_by')->references('id')->on('users');

            $table->timestamp('deleted_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surgery_types');
    }
}
