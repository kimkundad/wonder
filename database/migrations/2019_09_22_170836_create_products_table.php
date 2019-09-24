<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('p_name');
            $table->string('p_detail');
            $table->string('p_image');
            $table->string('p_code');
            $table->string('p_weight');
            $table->string('p_dimensions');
            $table->integer('p_pricec')->default('0');
            $table->integer('p_stock')->default('0');
            $table->integer('p_point')->default('0');
            $table->integer('p_cut_point')->default('0');
            $table->integer('p_size')->default('0');
            $table->integer('p_color')->default('0');
            $table->text('p_tags')->nullable();
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
        Schema::dropIfExists('products');
    }
}
