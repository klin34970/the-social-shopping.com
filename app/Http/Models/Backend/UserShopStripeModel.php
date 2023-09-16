<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserShopStripeModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_shops_stripe';
  
    /**
     * The guarded.
     *
     * @var array
	 *
     */	
	protected $guarded = ['id'];
	
    /**
     * The fillable.
     *
     * @var array
	 *
     */	
    protected $fillable = [
		'shop_id',
        'key_public',
		'key_private',
    ];
	
	/**
     * Get shop
	 *
     * @return ORM
     */
    function shop()
	{
		return $this->belongsTo('App\Http\Models\Backend\UserShopModel', 'shop_id');
	}
}
