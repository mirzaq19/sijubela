<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_addresses', function (Blueprint $table) {
            $table->timestamps();

            // FK
            $table->unsignedBigInteger('buyer_user_id');
            $table->unsignedBigInteger('address_id');

            $table->foreign('buyer_user_id')->references('id')->on('buyer_users');
            $table->foreign('address_id')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_addresses');
    }
}
