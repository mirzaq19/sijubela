<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_carts', function (Blueprint $table) {
            $table->integer('cart_amount');
            $table->string('cart_note');
            $table->timestamps();

            // FK
            $table->unsignedBigInteger('laptop_id');
            $table->unsignedBigInteger('cart_id');

            $table->foreign('laptop_id')->references('id')->on('laptops');
            $table->foreign('cart_id')->references('id')->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_carts');
    }
}
