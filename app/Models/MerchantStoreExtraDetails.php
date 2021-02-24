<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantStoreExtraDetails extends Model
{
    use HasFactory;
    
    protected $table = 'merchant_store_extra_details';

    protected $fillable = ['user_id', 'field', 'value'];

    public $timestamps = true;
}
