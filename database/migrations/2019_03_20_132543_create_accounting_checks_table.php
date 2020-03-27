<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting_checks', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('check_number');

            $table->unsignedInteger('accounting_vendor_id');
            $table->foreign('accounting_vendor_id')->references('id')->on('accounting_vendors');

            $table->unsignedInteger('accounting_bank_account');
            $table->foreign('accounting_bank_account')->references('id')->on('accounting_banks');

            $table->dateTime('emission_date');

            $table->dateTime('expiration_date');

            $table->string('pay_name')->nullable();

            $table->float('amount');

            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->foreign('updated_by')->references('id')->on('users');
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounting_checks');
    }
}
