<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_users', function (Blueprint $table) {
            $table->id();
            $table->string('buyer_username')->unique();
            $table->string('buyer_password');
            $table->string('buyer_full_name');
            $table->string('buyer_email')->unique();
            $table->string('buyer_phone')->unique();
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
        Schema::dropIfExists('buyer_users');
    }
}
