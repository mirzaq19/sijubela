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
            $table->string('order_detail_note')->nullable();
            $table->integer('price_subtotal');
            $table->float('weight_subtotal');
            $table->boolean('reviewed')->default(false);
            $table->timestamps();

            // FK
            $table->foreignId('order_id');
            $table->foreignId('laptop_id');
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
