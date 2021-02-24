<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantSiteContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_site_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->tinyInteger('hide_arabic');
            $table->tinyInteger('hide_rental');
            $table->longText('about_us');
            $table->longText('about_us_ar');
            $table->longText('terms_and_condition');
            $table->longText('terms_and_condition_ar');
            $table->longText('privacy_policy');
            $table->longText('privacy_policy_ar');
            $table->text('email');
            $table->string('mobile_number');
            $table->string('whatsapp_number');
            $table->text('address');
            $table->longText('home_page_slider');
            $table->text('tag_line_en');
            $table->text('tag_line_ar');
            $table->string('search_tag');
            $table->string('search_tag_ar');
            $table->text('google_map');
            $table->text('youtube_account');
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
        Schema::dropIfExists('merchant_site_contents');
    }
}
