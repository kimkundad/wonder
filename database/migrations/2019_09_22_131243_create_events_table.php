<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('e_name');
            $table->text('e_detail');
            $table->string('e_start');
            $table->string('e_end');
            $table->integer('e_max_person');
            $table->string('e_image');
            $table->string('e_url');
            $table->integer('e_status')->default('0');
            $table->integer('e_point')->default('0');
            $table->text('e_location')->nullable();
            $table->text('e_map')->nullable();
            $table->text('e_tags')->nullable();
            $table->text('e_level')->nullable();
            $table->integer('e_cut_point')->default('0');
            $table->text('e_remark')->nullable();
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
        Schema::dropIfExists('events');
    }
}
