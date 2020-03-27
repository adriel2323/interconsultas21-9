<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRequestedDoctorIdForeignOnInterconsulting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interconsulting', function (Blueprint $table) {
            $table->dropForeign('interconsulting_requested_doctor_id_foreign');
            $table->foreign('requested_doctor_id')->references('id')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interconsulting', function (Blueprint $table) {
            //
        });
    }
}
