<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantProductFilter extends Model
{
    use HasFactory;
    
    protected $table = 'merchant_product_filters';

    protected $fillable = ['user_id', 'name', 'name_ar', 'parent_id'];

    public $timestamps = true;

    public function children(){
        return $this->hasMany($this, 'parent_id', 'id');
    }
    
    public function parent(){
        return $this->belongsTo($this, 'parent_id');
    }
}
