<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantDetails extends Model
{
    use HasFactory;

    protected $table = 'merchant_details';

    protected $fillable = ['user_id','business_name','business_type','instagram_account','facebook_account','bio','bio_ar','website','profile_img','organization_name'
        ,'store_code','store_url','total_store_view','show_email_on_store','show_mobile_on_store','show_website_on_store','store_open_24hours','store_business_hours',
        'store_busy', 'store_design_type','store_pickup','is_archive'];

    public $timestamps = true;

    public function features(){
        return $this->hasOne('App\MerchantFeatures', 'user_id', 'user_id');
    }
}
