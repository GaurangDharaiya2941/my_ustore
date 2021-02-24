<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('product_category');
            $table->string('product_name');
            $table->string('product_name_ar');
            $table->string('product_currency',50)->nullable();
            $table->decimal('product_price',10,2);
            $table->decimal('sale_product_price',10,2)->default(0.0)->nullable();
            $table->mediumText('product_description')->nullable();
            $table->mediumText('product_description_ar')->nullable();
            $table->string('product_type',100)->nullable();
            $table->string('product_status')->default('available')->comment('available,out_of_stock');
            $table->longText('product_image')->nullable();
            $table->longText('product_video')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->decimal('minimum_order',10,2)->nullable();
            $table->integer('minimum_quantity')->nullable();
            $table->text('sizes')->nullable();
            $table->text('colors')->nullable();
            $table->tinyInteger('send_inventory_email')->default(0)->nullable();
            $table->string('show_quantity_to_customer',20)->default('yes')->comment('yes,no');
            $table->tinyInteger('is_featured')->default(0)->nullable();
            $table->tinyInteger('is_visible_on_store')->default(0)->nullable();
            $table->integer('sort_order')->unique();
            $table->tinyInteger('is_product_purchased_once')->default(0)->nullable();
            $table->integer('product_can_be_purchase_after')->nullable();
            $table->string('product_can_be_purchase_after_type',20)->nullable();
            $table->string('sku',100)->nullable();
            $table->string('weight_type',100)->nullable();
            $table->string('weight',100)->nullable();
            $table->string('length_type',100)->nullable();
            $table->string('length',100)->nullable();
            $table->string('width',100)->nullable();
            $table->string('height',100)->nullable();
            $table->string('country_of_origin',20)->nullable();
            $table->dateTime('sale_end_date');
            $table->string('preparation_time',15)->nullable();
            $table->string('store_type')->nullable();
            $table->integer('is_appointment')->default(0)->nullable();
            $table->tinyInteger('is_pre_order')->default(0)->nullable();
            $table->dateTime('date_of_availability')->nullable();
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
        Schema::dropIfExists('merchant_products');
    }
}
