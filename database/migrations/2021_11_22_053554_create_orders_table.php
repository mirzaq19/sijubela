<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('order_status');
            $table->string('shipping_status');
            $table->integer('shipping_cost');
            $table->integer('total_price');
            $table->timestamps();

            // FK
            $table->unsignedBigInteger('buyer_user_id');
            $table->unsignedBigInteger('payment_id');

            $table->foreign('buyer_user_id')->references('id')->on('buyer_users');
            $table->foreign('payment_id')->references('id')->on('payments');
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
