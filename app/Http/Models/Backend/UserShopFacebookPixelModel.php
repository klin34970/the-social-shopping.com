<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserShopFacebookPixelModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_shops_facebook_pixel';
  
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
		'facebook_pixel_code',
        'shop_id',
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
