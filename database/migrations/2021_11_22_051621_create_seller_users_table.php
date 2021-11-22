<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_users', function (Blueprint $table) {
            $table->id();
            $table->string('seller_username')->unique();
            $table->string('seller_password');
            $table->string('seller_full_name');
            $table->string('seller_email')->unique();
            $table->string('seller_phone')->unique();
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
        Schema::dropIfExists('seller_users');
    }
}
