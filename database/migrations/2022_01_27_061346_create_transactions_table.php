<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usage_id');
            $table->foreignId('user_id');
            $table->foreignId('customer_id');
            $table->boolean('has_paid')->default(false);
            $table->dateTime('jatuh_tempo');
            // $table->dateTime('tanggal_bayar')->default(now());
            $table->float('bill_amount');
            // $table->float('penalty_fee');
            // $table->float('total');
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
        Schema::dropIfExists('transactions');
    }
}
