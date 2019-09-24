<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('code_order')->nullable();
            $table->string('track_no')->nullable();
            $table->string('name_re');
            $table->string('phone_re');
            $table->string('email_re');
            $table->text('address_re');
            $table->integer('pro_id_re');
            $table->string('zip_re');
            $table->integer('option1')->default('0');
            $table->integer('option2')->default('0');
            $table->integer('pay_type')->default('0');
            $table->integer('pay_status')->default('0');
            $table->integer('pay_status2')->default('0');
            $table->integer('admin_id')->default('0');
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
        Schema::dropIfExists('orders');
    }
}
