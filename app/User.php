<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\PasswordReset;
use Hash;
/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    protected $fillable = ['banned', 'lastname', 'firstname', 'email', 'password', 'remember_token'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    
    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
	
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new PasswordReset($token));
	}
    
	/**
     * Get user shops
	 *
     * @return ORM
     */
	public function shops()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopModel', 'user_id', 'id');
    }
	
	/**
     * Get user shops
	 *
     * @return ORM
     */
	public function suppliers()
    {
        return $this->hasMany('App\Http\Models\Backend\UserSupplierModel', 'user_id', 'id');
    }
	
	/**
     * Get user products
	 *
     * @return ORM
     */
	public function products()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopProductModel', 'user_id', 'id');
    }
	
	/**
     * Get user stripe
	 *
     * @return ORM
     */
	public function stripe()
    {
        return $this->hasOne('App\Http\Models\Frontend\UserStripeModel', 'user_id');
    }
	
	/**
     * Get user addresses
	 *
     * @return ORM
     */
	public function addresses()
    {
        return $this->hasMany('App\Http\Models\Frontend\UserAddressModel', 'user_id', 'id');
    }
	
	/**
     * Get user orders
	 *
     * @return ORM
     */
	public function orders_customer()
    {
        return $this->hasMany('App\Http\Models\Frontend\UserOrderModel', 'customer_id', 'id');
    }
	
	/**
     * Get user orders
	 *
     * @return ORM
     */
	public function orders_seller()
    {
        return $this->hasMany('App\Http\Models\Frontend\UserOrderModel', 'seller_id', 'id');
    }
    
    
}