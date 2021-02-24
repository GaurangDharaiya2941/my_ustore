<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Buyers extends Model implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract
{
    use SoftDeletes;

    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $dates =['deleted_at'];
    protected $table = 'buyers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['merchant_id','mobile_number','country_code','show_password','mobile_verified','verification_code','uuid','device_token','verified_datetime', 'full_name', 'gender','date_of_birth','email', 'password', 'register_from', 'addresses', 'google_token', 'facebook_token', 'twitter_token', 'secret_token'];

    public $timestamps = true;

    protected $hidden = ['password', 'remember_token'];

    public  static function getAll()
    {
        $buyer = \Auth::user('buyer');
		
        if(!empty($buyer))
            return $buyer;
	}

	public function merchant() {
        return $this->belongsTo(User::class, 'merchant_id')->withTrashed();
	}

	public function merchantDetails() {
		return $this->hasOne(MerchantDetails::class, 'user_id', 'merchant_id');
	}

	public static function getSocialSecretToken(){
		$flag = true;		
		$secret_token = '';
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet.= "0123456789";
		$max = strlen($codeAlphabet); // edited
		do{
			$secret_token='';
			for ($i=0; $i < 32; $i++)
				$secret_token .= $codeAlphabet[self::crypto_rand_secure(0, $max-1)];
			
			$obj = \DB::table('buyers')->where('secret_token',$secret_token)->count();
			if(empty($obj))
				$flag = false;			
		}while($flag);
		
		return ['secret_token'=>$secret_token];
	}
	public static function crypto_rand_secure($min, $max)
	{
		$range = $max - $min;
		if ($range < 1) return $min; // not so random...
		$log = ceil(log($range, 2));
		$bytes = (int) ($log / 8) + 1; // length in bytes
		$bits = (int) $log + 1; // length in bits
		$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
		do {
			$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd = $rnd & $filter; // discard irrelevant bits
		} while ($rnd > $range);
		return $min + $rnd;
	}
}
