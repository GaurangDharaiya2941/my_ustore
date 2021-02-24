<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantStoreSliders extends Model
{
    protected $table = 'merchant_store_sliders';

    protected $fillable = ['user_id', 'title', 'title_ar', 'description', 'description_ar', 'button_text', 'button_text_ar', 'image', 'category_id', 'type', 'offer_tag', 'offer_tag_ar', 'is_active', 'sort_order'];

    public $timestamps = true;
}
