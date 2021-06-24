<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactioncalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactioncals', function (Blueprint $table) {
            $table->id();
            $table->string('bank_id');
            $table->string('supplier_id');
            $table->string('pay_type');
            $table->string('check_num')->nullable();
            $table->string('amount');
            $table->string('notes');
            $table->string('cr')->nullable();
            $table->string('dr')->nullable();
            $table->string('user_id')->nullable();
            $table->string('created_by')->nullable();
            $table->string('Updated_by')->nullable();
            $table->string('Delete_by')->nullable();
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
        Schema::dropIfExists('transactioncals');
    }
}
