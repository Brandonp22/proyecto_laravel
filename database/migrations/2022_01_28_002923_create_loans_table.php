<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->decimal('loanBalance');
            $table->decimal('borrowedCapital');
            $table->decimal('appliedInterest');
            $table->integer('amountInstallments');
/*             $table->unsignedBigInteger('id_paymentPeriod'); */
/*             $table->unsignedBigInteger('id_user'); */
            $table->integer('statusLoan');
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
        Schema::dropIfExists('loans');
    }
}
