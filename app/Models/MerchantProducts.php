<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantProducts extends Model
{
    use HasFactory;

    protected $table = 'merchant_products';

    protected $fillable = ['user_id','product_category','product_name_en','product_name_ar','product_currency','product_price','product_description','product_description_ar','product_status','product_image','product_quantity','sent_inventory_email','show_quantity_to_customer','product_sale_price','sizes','colors','sort_order','is_visible_on_store','is_product_purchased_once','product_can_be_purchase_after','product_can_be_purchase_after_type',
	'product_video', 'product_type', 'minimum_order', 'minimum_quantity','store_type', 'is_featured', 'sku', 'weight_type', 'weight', 'length_type', 'length', 'width', 'height', 'sale_end_date','is_appointment','country_of_origin', 'preparation_time', 'is_pre_order', 'date_of_availability'];

    public $timestamps = true;
    
}
