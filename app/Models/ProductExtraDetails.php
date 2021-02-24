<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class ProductExtraDetails extends Model
{
    use HasFactory;

    protected $table = 'product_extra_details';
    
    protected $fillable = ['product_id', 'customized_fields', 'extra_packages', 'delivery_notes', 'pickup_time', 'setup_time'];

    public $timestamps = true;
}
