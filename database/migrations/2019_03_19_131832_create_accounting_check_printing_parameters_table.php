<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingCheckPrintingParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting_check_printing_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parameter');
            $table->string('left');
            $table->string('top');
            $table->string('default_left');
            $table->string('default_top');
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
        Schema::dropIfExists('accounting_check_printing_parameters');
    }
}
