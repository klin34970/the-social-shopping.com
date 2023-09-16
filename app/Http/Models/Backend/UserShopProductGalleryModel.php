<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserShopProductGalleryModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_shops_products_gallery';
  
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
		'product_id',
        'filename',
		'position',
    ];
	
	/**
     * Get shop
	 *
     * @return ORM
     */
    function product()
	{
		return $this->belongsTo('App\Http\Models\Backend\UserShopProdcutModel', 'product_id');
	}
}
