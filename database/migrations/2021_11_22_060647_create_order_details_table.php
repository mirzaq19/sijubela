<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_detail_amount');
            $table->string('order_detail_note');
            $table->integer('price_subtotal');
            $table->float('weight_subtotal');
            $table->timestamps();

            // FK
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('laptop_id');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('laptop_id')->references('id')->on('laptops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}