<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;

class MerchantProductCategorieRelation extends Model
{
    use HasFactory;

    protected $table = 'merchant_product_categorie_relation';

    protected $fillable = ['product_id', 'category_id'];

    public $timestamps = true;

    public static function getProducts($category_id) {
        $totalProd = false;

		if(!empty($category_id)) {
			$prodObj = MerchantProductCategorieRelation::where('category_id',$category_id)->get();
			if(!empty($prodObj)) {
				$total = $prodObj->count();
				if($total > 0)
					$totalProd = true;
			}
		}
        return $totalProd;
    }
}
