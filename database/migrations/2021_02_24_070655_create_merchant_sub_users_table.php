<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantSubUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_sub_users', function (Blueprint $table) {
            $table->id();
            $table->integer('merchant_id');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('mobile_number')->unique();
            $table->string('password');
            $table->string('show_password');
            $table->tinyInteger('status')->default(1);
            $table->text('api_token')->nullable();
            $table->integer('store_branch_id')->nullable();
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
        Schema::dropIfExists('merchant_sub_users');
    }
}
