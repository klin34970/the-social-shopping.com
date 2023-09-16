<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserShopProductVariantModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_shops_products_variants';
  
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
        'sku',
		'price',
		'price_discount',
		'virtual_stock',
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
	
	/**
     * Get product combinations
	 *
     * @return ORM
     */
	public function combinations()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopProductCombinationModel', 'variant_id');
    }
}
