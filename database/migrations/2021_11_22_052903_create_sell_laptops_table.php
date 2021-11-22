<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_laptops', function (Blueprint $table) {
            $table->id();
            $table->string('sell_laptop_name');
            $table->string('sell_laptop_brand');
            $table->string('sell_laptop_type');
            $table->text('sell_laptop_desc');
            $table->boolean('sell_laptop_condition');
            $table->integer('sell_laptop_usage_time');
            $table->integer('sell_laptop_price');
            $table->boolean('sell_laptop_negotiable');
            $table->timestamps();

            // FK
            $table->unsignedBigInteger('seller_user_id');

            $table->foreign('seller_user_id')->references('id')->on('seller_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_laptops');
    }
}
