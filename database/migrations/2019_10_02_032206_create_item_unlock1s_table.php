<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemUnlock1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_unlock1s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('owner')->nullable();
            $table->string('avatar')->nullable();
            $table->string('portsize')->nullable();
            $table->string('balance')->nullable();
            $table->string('profit')->nullable();
            $table->string('mt4')->nullable();
            $table->string('inves_pass')->nullable();
            $table->string('broker')->nullable();
            $table->string('server')->nullable();
            $table->string('url')->nullable();
            $table->integer('status')->default('0');
            $table->integer('sort')->default('0');
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
        Schema::dropIfExists('item_unlock1s');
    }
}
