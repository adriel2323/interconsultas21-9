<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomenclatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomenclator', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('code');
            $table->string('description');
            $table->integer('honorary_units')->nullable();
            $table->integer('expenses_units')->nullable();
            $table->integer('helper_honorary_units')->nullable();
            $table->integer('anesthesist_honorary_units')->nullable();
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
        Schema::dropIfExists('nomenclator');
    }
}
