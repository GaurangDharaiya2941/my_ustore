<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use Hashids\Hashids;

class MerchantSubUsers extends Model implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract
{
    use HasFactory, SoftDeletes;

    use Authenticatable, Authorizable, CanResetPassword;

    protected $dates = ['deleted_at'];
    public $timestamps = true;
    //
    protected $table = 'merchant_subusers';
    
    protected $fillable = ['merchant_id','full_name','email','mobile_number','password','show_password','status','app_token','store_branch_id'];

    protected $hidden = ['password', 'remember_token'];

    public static function getName($user_id){
        $obj = self::find($user_id);
        if(!empty($obj)) {
            return $obj->full_name;
        }

        return "-";
    }
}
