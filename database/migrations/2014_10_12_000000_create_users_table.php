<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_code')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile_number')->unique();
            $table->string('role')->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('show_password');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('logout')->default(0);
            $table->text('profile_pic')->nullable();
            $table->text('api_token')->nullable();
            $table->tinyInteger('confirmed')->default(0)->nullable();
            $table->tinyInteger('verified')->default(0)->nullable();
            $table->integer('total_login')->default(0)->nullable();
            $table->tinyInteger('is_sub_merchant')->default(0)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
