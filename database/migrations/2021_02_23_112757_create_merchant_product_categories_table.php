<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('category_name');
            $table->string('category_name_ar')->nullable();
            $table->integer('parent_id')->default(0);
            $table->string('type')->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('sort_order')->nullable();
            $table->tinyInteger('is_menu')->default(0)->nullable();
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
        Schema::dropIfExists('merchant_product_categories');
    }
}
