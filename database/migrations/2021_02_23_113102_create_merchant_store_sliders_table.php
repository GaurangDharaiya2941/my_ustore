<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantStoreSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_store_sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('description')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('button_text',100)->nullable();
            $table->string('button_text_ar',100)->nullable();
            $table->text('image')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('type',100)->nullable();
            $table->string('design',100)->nullable();
            $table->string('offer_tag',100)->nullable();
            $table->string('offer_tag_ar',100)->nullable();
            $table->tinyInteger('is_active')->default(0)->nullable();
            $table->text('product_ids')->nullable();
            $table->integer('sort_order')->nullable();
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
        Schema::dropIfExists('merchant_store_sliders');
    }
}
