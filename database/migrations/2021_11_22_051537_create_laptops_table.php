<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('laptop_name');
            $table->string('laptop_brand');
            $table->string('laptop_type');
            $table->text('laptop_desc');
            $table->boolean('laptop_condition');
            $table->float('laptop_weight');
            $table->integer('laptop_price');
            $table->integer('laptop_stock');
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
        Schema::dropIfExists('laptops');
    }
}
