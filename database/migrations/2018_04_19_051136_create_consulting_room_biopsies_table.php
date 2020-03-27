<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultingRoomBiopsiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulting_room_biopsies', function (Blueprint $table) {
            $table->increments('id');

            $table->string("patient_name");

            $table->integer('biopsy_type')->unsigned()->nullable();
            $table->foreign('biopsy_type')->references('id')->on('biopsies_types');

            $table->integer('doctor')->unsigned()->nullable();
            $table->foreign('doctor')->references('id')->on('doctors');

            $table->integer('os')->unsigned()->nullable();
            $table->foreign('os')->references('id')->on('os');

            $table->date('delivery_date');

            $table->string("autorized_order");

            $table->integer('patologist')->unsigned()->nullable();
            $table->foreign('patologist')->references('id')->on('doctors');

            $table->string("patient_document")->nullable();

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
        Schema::dropIfExists('consulting_room_biopsies');
    }
}
