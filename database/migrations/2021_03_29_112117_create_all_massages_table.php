<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllMassagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_massages', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_id')->nullable();
            $table->string('phonebook_id')->nullable();
            $table->string('mobile_num');
            $table->string('address');
            $table->string('sms');
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
        Schema::dropIfExists('all_massages');
    }
}
