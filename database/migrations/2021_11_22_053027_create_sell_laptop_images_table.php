<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellLaptopImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_laptop_images', function (Blueprint $table) {
            $table->id();
            $table->binary('sell_laptop_image');
            $table->timestamps();

            // FK
            $table->foreignId('sell_laptop_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_laptop_images');
    }
}
