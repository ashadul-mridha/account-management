<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('member_id');
            $table->string('photo');
            $table->string('fatherorhusband');
            $table->string('motherorwife');
            $table->string('mobile_num');
            $table->string('nid_num');
            $table->string('account_number');
            $table->string('address');
            $table->string('nid_photo_front');
            $table->string('nid_photo_back');
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
        Schema::dropIfExists('nominis');
    }
}
