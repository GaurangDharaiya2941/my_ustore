<?php

namespace App;

use App\Library\Helpers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Hashids\Hashids;
use App\MerchantStoreExtraDetails;

class User extends Authenticatable implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract
{
    use Notifiable, SoftDeletes;
    use Authenticatable, Authorizable, CanResetPassword;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_code','first_name','last_name','email','password','mobile_number','show_password','role','status','logout','profile_pic','api_token','confirmed','verified','total_login','is_sub_merchant',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function details(){
        return $this->hasOne('App\MerchantDetails');
    }

    public function features(){
        return $this->hasOne('App\MerchantFeatures');
    }

    public  static function getUserCode()
    {
        $userObj = \DB::table('users')->orderBy('id','desc')->first();
        if(!empty($userObj))
            return 'm00000'.($userObj->id + 1);
        else
            return 'm000001';
    }

    public static function isAuthenticateUser($id){
        $user = self::getAll();
        if($user->role == "admin"){
            return true;
        }
        return false;
    }

    public static function isAuthorizedUserRecord($id)
    {
        $user = self::getAll();
        if($user->role =="admin")
            return true;
        elseif($user->role =="landlord")
        {
            if($user->id == $id)
                return true;
        }
        return false;

    }

    public  static function getAll()
    {
        $user = \Auth::user('user');
        if(empty($user)){
            \Auth::logout('user');
            \Auth::logout('subuser');
            \Auth::logout();
            return \Redirect::to('/auth/login')->send();
        }
        return $user;
    }
}
