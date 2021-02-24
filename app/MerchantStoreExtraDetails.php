<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantStoreExtraDetails extends Model
{
    //
    protected $table = 'merchant_store_extra_details';

    protected $fillable = ['user_id', 'field', 'value'];

    public $timestamps = true;
}
