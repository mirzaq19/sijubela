<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptop_images', function (Blueprint $table) {
            $table->id();
            $table->binary('laptop_image');
            $table->timestamps();

            // FK
            $table->unsignedBigInteger('laptop_id');

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
        Schema::dropIfExists('laptop_images');
    }
}
