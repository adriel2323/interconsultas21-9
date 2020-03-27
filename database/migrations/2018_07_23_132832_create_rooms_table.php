<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->string("name");

            $table->integer('bed_count')->nullable();

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
        Schema::dropIfExists('rooms');
    }
}
