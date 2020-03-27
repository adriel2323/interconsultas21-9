<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');

            $table->string("license")->nullable();

            $table->string('cuit')->nullable();

            $table->integer("service_id")->unsigned()->nullable();
            $table->foreign("service_id")->references("id")->on("services");

            $table->string("phone")->nullable();

            $table->string("address")->nullable();

            $table->string("malpractice_ensurance")->nullable();

            $table->integer("user_id")->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users");

            $table->string('name');

            $table->string('email')->nullable();

            $table->string('telegram_id')->nullable();

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
        Schema::dropIfExists('doctors');
    }
}
