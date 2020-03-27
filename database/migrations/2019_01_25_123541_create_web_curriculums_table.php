<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebCurriculumsTable extends Migration
{
    /**
     * Run the migrations.
     * Esta tabla se utiliza para la página web.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_curriculums', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('dni');

            $table->string('email');

            $table->string('phone');

            $table->string('cv_url');

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
        Schema::dropIfExists('web_curriculums');
    }
}
