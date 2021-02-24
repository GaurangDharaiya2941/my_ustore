<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantFeatures extends Model
{
    
    protected $table = 'merchant_features';
    
    protected $fillable = ['user_id', 'school', 'new_invoice', 'appointment', 'reservation', 'store_order_limit'];

    public $timestamps = true;
}
