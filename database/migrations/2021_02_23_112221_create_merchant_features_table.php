<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_features', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->tinyInteger('school')->default(0)->nullable();
            $table->tinyInteger('new_invoice')->default(0)->nullable();
            $table->tinyInteger('appointment')->default(0)->nullable();
            $table->tinyInteger('reservation')->default(0)->nullable();
            $table->integer('store_order_limit')->nullable();
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
        Schema::dropIfExists('merchant_features');
    }
}
