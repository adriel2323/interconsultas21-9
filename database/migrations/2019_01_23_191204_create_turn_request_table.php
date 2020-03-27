<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnRequestTable extends Migration
{
    /**
     * Run the migrations.
     * Esta tabla se utiliza para la página web.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turn_request', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->integer('os')->unsigned()->nullable();
            $table->foreign('os')->references('id')->on('os');

            $table->string('dni');

            $table->string('email');

            $table->string('phone');

            $table->boolean('xray');

            $table->boolean('mamo');

            $table->boolean('gamma');

            $table->boolean('us');

            $table->boolean('ct');

            $table->boolean('rmn');

            $table->boolean('doppler');

            $table->string('order_url');

            $table->string('authorization_url')->nullable();

            $table->text('comments')->nullable();

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
        Schema::dropIfExists('turn_request');
    }
}
