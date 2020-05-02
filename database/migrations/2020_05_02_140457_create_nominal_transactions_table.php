<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominalTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominal_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->integer('debit_nominal_account_id');
            $table->integer('credit_nominal_account_id');
            $table->date('accounted_at');
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
        Schema::dropIfExists('nominal_transactions');
    }
}
