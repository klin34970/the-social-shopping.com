<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserShopProductCombinationModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_shops_products_combinations';
  
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
        'variant_id',
		'attribute_id',
		'attribute_value_id',
    ];
	
	/**
     * Get product
	 *
     * @return ORM
     */
    function product()
	{
		return $this->belongsTo('App\Http\Models\Backend\UserShopProdcutModel', 'product_id');
	}
	
	/**
     * Get variant
	 *
     * @return ORM
     */
    function variant()
	{
		return $this->belongsTo('App\Http\Models\Backend\UserShopProdcutVariantModel', 'variant_id');
	}
	
	/**
     * Get variant
	 *
     * @return ORM
     */
    function attribute_value()
	{
		return $this->belongsTo('App\Http\Models\Backend\UserShopProductAttributeValueModel', 'attribute_value_id');
	}
}
