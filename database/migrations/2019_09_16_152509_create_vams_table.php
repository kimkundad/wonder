<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('id_card');
            $table->integer('year_old');
            $table->string('line');
            $table->string('phone');
            $table->integer('sex');
            $table->string('email');
            $table->string('ip_address');
            $table->string('browser');
            $table->integer('status')->default('0');
            $table->integer('group_blood');
            $table->string('qrcode');
            $table->integer('group_type');
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
        Schema::dropIfExists('vams');
    }
}
