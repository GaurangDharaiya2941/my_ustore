<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('store_code');
            $table->tinyInteger('store_is_public')->default(1);
            $table->text('store_front_img')->nullable();
            $table->string('store_design_type')->default('store');
            $table->string('store_url');
            $table->tinyInteger('store_open_24hours')->default(1);
            $table->string('store_bussiness_name')->nullable();
            $table->string('show_email_on_store',10)->default('YES');
            $table->string('show_mobile_on_store',10)->default('YES');
            $table->string('show_website_on_store')->default('YES');
            $table->integer('total_store_view')->default(0);
            $table->string('business_name')->nullable();
            $table->text('organization_name')->nullable();
            $table->string('bussiness_type')->nullable();
            $table->string('instagram_account',150)->nullable();
            $table->string('facebook_account',150)->nullable();
            $table->text('bio')->nullable();
            $table->text('bio_ar')->nullable();
            $table->string('website')->nullable();
            $table->text('profile_img')->nullable();
            $table->tinyInteger('is_archive')->default(0);
            $table->tinyInteger('store_pickup')->default(0);
            $table->tinyInteger('store_busy')->default(0);
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
        Schema::dropIfExists('merchant_details');
    }
}
