<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('bussniess_name');
            $table->string('transaction_type');
            $table->string('reasone');
            $table->string('trade');
            $table->string('family_number');
            $table->unsignedBiginteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('bank_accounts');
            $table->string('note');
            $table->string('amount');
            $table->string('pay_type');
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
        Schema::dropIfExists('paymentinfos');
    }
}
