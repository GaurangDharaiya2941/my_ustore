<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id');
            $table->string('mobile_number',20);
            $table->string('country_code',10)->nullable();
            $table->tinyInteger('mobile_verified')->default(0)->nullable();
            $table->tinyInteger('verification_code')->default(0)->nullable();
            $table->dateTime('verification_datetime')->nullable();
            $table->text('uuid')->nullable();
            $table->text('device_token')->nullable();
            $table->string('full_name');
            $table->string('gender');
            $table->date('date_of_birth')->nullable();
            $table->string('email')->nullable();
            $table->string('password',60);
            $table->string('show_password',50);
            $table->string('register_form')->default('store')->nullable();
            $table->text('addresses')->nullable();
            $table->string('remember_token',100)->nullable();
            $table->string('google_token',191)->nullable();
            $table->string('facebook_token')->nullable();
            $table->string('twitter_token')->nullable();
            $table->string('secret_token',100)->nullable();
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
        Schema::dropIfExists('buyers');
    }
}
