<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantProductAttributes extends Model
{
    use HasFactory;

    protected $table = 'merchant_products_attributes';

    protected $fillable = ['product_id', 'attr_id','vend_product_id','pos_rocket_product_id'];

    public $timestamps = true;
}
