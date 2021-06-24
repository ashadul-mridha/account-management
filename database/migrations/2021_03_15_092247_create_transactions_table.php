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
            $table->string('payment_id');
            $table->unsignedBiginteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->unsignedBiginteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('bank_accounts');
            $table->string('amount');
            $table->string('check_num')->nullable();
            $table->string('dr')->nullable();
            $table->string('cr')->nullable();
            $table->string('create_by')->nullable();
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
