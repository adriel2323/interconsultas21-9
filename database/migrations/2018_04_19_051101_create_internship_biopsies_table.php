<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipBiopsiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_biopsies', function (Blueprint $table) {
            $table->increments('id');

            $table->string("patient_name");

            $table->string("patient_document")->nullable();

            $table->integer('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->integer('os_id')->unsigned()->nullable();
            $table->foreign('os_id')->references('id')->on('os');

            $table->date('delivery_date');

            $table->string("autorized_order");

            $table->integer('patologist_id')->unsigned()->nullable();
            $table->foreign('patologist_id')->references('id')->on('doctors');

            $table->integer('biopsy_type_id')->unsigned()->nullable();
            $table->foreign('biopsy_type_id')->references('id')->on('biopsies_types');

            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->foreign('created_by')->references('id')->on('users');

            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->foreign('updated_by')->references('id')->on('users');

            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->foreign('deleted_by')->references('id')->on('users');

            $table->timestamp('deleted_at')->nullable();

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
        //
    }
}
