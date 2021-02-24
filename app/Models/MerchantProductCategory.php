<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Helpers;
use App\Models\MerchantProducts;

class MerchantProductCategory extends Model
{
    use HasFactory;

    protected $table = 'merchant_product_category';

    protected $fillable = ['user_id','category_name','category_name_ar', 'parent_id', 'type', 'image', 'status', 'sort_order', 'is_menu'];

    public $timestamps = true;

    public function children(){
        return $this->hasMany($this, 'parent_id', 'id');
    }
    
    public function parent(){
        return $this->belongsTo($this, 'parent_id');
    }

    public static function getCategoryName($category = false, $language = false){
        if(!empty($category) && is_numeric($category)){
            $categoryObj = self::where('id',$category)->first();
            if(!empty($categoryObj)){
                if(!empty($language)){
                    if($language == 'ar')
                        return $categoryObj->category_name_ar;
                    else
                        return $categoryObj->category_name;
                }
            }
        }
    }
    public static function getAllCategoryAndSubCategories($merchant_id = false,$type = 'product'){
        if(!empty($merchant_id)){
            $sql = "SELECT t1.id as lev1, t2.id as lev2, t3.id as lev3, t4.id as lev4, t5.id as lev5, t6.id as lev6, t7.id as lev7, t8.id as lev8, t9.id as lev9, t10.id as lev10
			FROM merchant_product_categories AS t1
			LEFT JOIN merchant_product_categories AS t2 ON t2.parent_id = t1.id 
			LEFT JOIN merchant_product_categories AS t3 ON t3.parent_id = t2.id 
			LEFT JOIN merchant_product_categories AS t4 ON t4.parent_id = t3.id
			LEFT JOIN merchant_product_categories AS t5 ON t5.parent_id = t4.id
			LEFT JOIN merchant_product_categories AS t6 ON t6.parent_id = t5.id 
			LEFT JOIN merchant_product_categories AS t7 ON t7.parent_id = t6.id 
			LEFT JOIN merchant_product_categories AS t8 ON t8.parent_id = t7.id 
			LEFT JOIN merchant_product_categories AS t9 ON t9.parent_id = t8.id 
			LEFT JOIN merchant_product_categories AS t10 ON t10.parent_id = t9.id 
            WHERE t1.user_id = ".$merchant_id." and t1.parent_id = 0 and t1.type = '".$type."' ";
            
            $categories = \DB::select($sql);
            $allCategories = [];
            if(!empty($categories)){
                foreach($categories as $cate){
                    if(!empty($cate->lev1)){
                        $key = false;
                        if(!empty($allCategories) && isset($allCategories['lev1']))
                            $key = array_search($cate->lev1, array_column($allCategories['lev1'], 'id'));
                            
                        if($key === false){
                            $categoryInfo = MerchantProductCategories::where('id',$cate->lev1)->first();
                            if(!empty($categoryInfo))
                                $allCategories['lev1'][] = ['id'=>$cate->lev1,'pId'=>0,'name'=>$categoryInfo->category_name,'name_ar'=>$categoryInfo->category_name_ar];
                        }
                    }

                    if(!empty($cate->lev2)){
                        $key = false;
                        if(!empty($allCategories) && isset($allCategories['lev2']))
                            $key = array_search($cate->lev2, array_column($allCategories['lev2'], 'id'));
                            
                        if($key === false){
                            $categoryInfo = MerchantProductCategories::where('id',$cate->lev2)->first();
                            if(!empty($categoryInfo))
                                $allCategories['lev2'][] = ['id'=>$cate->lev2,'pId'=>$cate->lev1,'name'=>$categoryInfo->category_name,'name_ar'=>$categoryInfo->category_name_ar];
                        }
                    }

                    if(!empty($cate->lev3)){
                        $key = false;
                        if(!empty($allCategories) && isset($allCategories['lev3']))
                            $key = array_search($cate->lev3, array_column($allCategories['lev3'], 'id'));
                            
                        if($key === false){
                            $categoryInfo = MerchantProductCategories::where('id',$cate->lev3)->first();
                            if(!empty($categoryInfo))
                                $allCategories['lev3'][] = ['id'=>$cate->lev3,'pId'=>$cate->lev2,'name'=>$categoryInfo->category_name,'name_ar'=>$categoryInfo->category_name_ar];
                        }
                    }

                    if(!empty($cate->lev4)){
                        $key = false;
                        if(!empty($allCategories) && isset($allCategories['lev4']))
                            $key = array_search($cate->lev4, array_column($allCategories['lev4'], 'id'));
                            
                        if($key === false){
                            $categoryInfo = MerchantProductCategories::where('id',$cate->lev4)->first();
                            if(!empty($categoryInfo))
                                $allCategories['lev4'][] = ['id'=>$cate->lev4,'pId'=>$cate->lev3,'name'=>$categoryInfo->category_name,'name_ar'=>$categoryInfo->category_name_ar];
                        }
                    }

                    if(!empty($cate->lev5)){
                        $key = false;
                        if(!empty($allCategories) && isset($allCategories['lev5']))
                            $key = array_search($cate->lev5, array_column($allCategories['lev5'], 'id'));
                            
                        if($key === false){
                            $categoryInfo = MerchantProductCategories::where('id',$cate->lev5)->first();
                            if(!empty($categoryInfo))
                                $allCategories['lev5'][] = ['id'=>$cate->lev5,'pId'=>$cate->lev4,'name'=>$categoryInfo->category_name,'name_ar'=>$categoryInfo->category_name_ar];
                        }
                    }

                    if(!empty($cate->lev6)){
                        $key = false;
                        if(!empty($allCategories) && isset($allCategories['lev6']))
                            $key = array_search($cate->lev6, array_column($allCategories['lev6'], 'id'));
                            
                        if($key === false){
                            $categoryInfo = MerchantProductCategories::where('id',$cate->lev6)->first();
                            if(!empty($categoryInfo))
                                $allCategories['lev6'][] = ['id'=>$cate->lev6,'pId'=>$cate->lev5,'name'=>$categoryInfo->category_name,'name_ar'=>$categoryInfo->category_name_ar];
                        }
                    }

                    if(!empty($cate->lev7)){
                        $key = false;
                        if(!empty($allCategories) && isset($allCategories['lev7']))
                            $key = array_search($cate->lev7, array_column($allCategories['lev7'], 'id'));
                            
                        if($key === false){
                            $categoryInfo = MerchantProductCategories::where('id',$cate->lev7)->first();
                            if(!empty($categoryInfo))
                                $allCategories['lev7'][] = ['id'=>$cate->lev7,'pId'=>$cate->lev6,'name'=>$categoryInfo->category_name,'name_ar'=>$categoryInfo->category_name_ar];
                        }
                    }

                    if(!empty($cate->lev8)){
                        $key = false;
                        if(!empty($allCategories) && isset($allCategories['lev8']))
                            $key = array_search($cate->lev8, array_column($allCategories['lev8'], 'id'));
                            
                        if($key === false){
                            $categoryInfo = MerchantProductCategories::where('id',$cate->lev8)->first();
                            if(!empty($categoryInfo))
                                $allCategories['lev8'][] = ['id'=>$cate->lev8,'pId'=>$cate->lev7,'name'=>$categoryInfo->category_name,'name_ar'=>$categoryInfo->category_name_ar];
                        }
                    }

                    if(!empty($cate->lev9)){
                        $key = false;
                        if(!empty($allCategories) && isset($allCategories['lev9']))
                            $key = array_search($cate->lev9, array_column($allCategories['lev9'], 'id'));
                            
                        if($key === false){
                            $categoryInfo = MerchantProductCategories::where('id',$cate->lev9)->first();
                            if(!empty($categoryInfo))
                                $allCategories['lev9'][] = ['id'=>$cate->lev9,'pId'=>$cate->lev8,'name'=>$categoryInfo->category_name,'name_ar'=>$categoryInfo->category_name_ar];
                        }
                    }

                    if(!empty($cate->lev10)){
                        $key = false;
                        if(!empty($allCategories) && isset($allCategories['lev10']))
                            $key = array_search($cate->lev10, array_column($allCategories['lev10'], 'id'));
                            
                        if($key === false){
                            $categoryInfo = MerchantProductCategories::where('id',$cate->lev10)->first();
                            if(!empty($categoryInfo))
                                $allCategories['lev10'][] = ['id'=>$cate->lev10,'pId'=>$cate->lev9,'name'=>$categoryInfo->category_name,'name_ar'=>$categoryInfo->category_name_ar];
                        }
                    }
                }
            }

            if(!empty($allCategories))
                return $allCategories;
            else
                return [];
        
        }else
            return [];

    }
}
