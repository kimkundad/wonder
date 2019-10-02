<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnlock1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unlock1s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text_1')->nullable();
            $table->string('text_2')->nullable();
            $table->string('text_sub_1')->nullable();
            $table->text('text_sub_2')->nullable();
            $table->string('time_count')->nullable();
            $table->string('score_left_1')->nullable();
            $table->string('score_left_2')->nullable();
            $table->string('score_mid')->nullable();
            $table->string('score_r_1')->nullable();
            $table->string('score_r_2')->nullable();
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('unlock1s');
    }
}
