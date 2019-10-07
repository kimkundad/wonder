<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('detail_data')->nullable();
            $table->text('data_check')->nullable();
            $table->integer('admin_id')->default('0');
            $table->integer('user_id');
            $table->integer('get_point')->default('0');
            $table->integer('multi_point')->default('1');
            $table->integer('list_points_status')->default('0');
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
        Schema::dropIfExists('list_points');
    }
}
