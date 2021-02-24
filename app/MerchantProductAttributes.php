<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantProductAttributes extends Model
{
    protected $table = 'merchant_products_attributes';

    protected $fillable = ['product_id', 'attr_id','vend_product_id','pos_rocket_product_id'];

    public $timestamps = true;
}
