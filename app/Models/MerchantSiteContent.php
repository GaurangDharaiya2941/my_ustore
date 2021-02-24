<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantSiteContent extends Model
{
    use HasFactory;

    protected $table = 'merchant_site_content';

    protected $fillable = ['user_id', 'about_us', 'about_us_ar', 'terms_and_condition', 'terms_and_condition_ar', 'privacy_policy', 'privacy_policy_ar', 'email', 'mobile_number', 'whatsapp_number', 'home_page_slider', 'tag_line_en', 'tag_line_ar', 'google_map', 'youtube_account', 'address', 'hide_arabic', 'hide_rental','search_tag', 'search_tag_ar'];

    public $timestamps = true;
}
