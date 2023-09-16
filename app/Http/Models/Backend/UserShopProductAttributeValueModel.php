<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserShopProductAttributeValueModel extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_shops_products_attributes_values';
  
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
		'attribute_id',
        'value',
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
	
	/**
     * Get shop
	 *
     * @return ORM
     */
    function attribute()
	{
		return $this->belongsTo('App\Http\Models\Backend\UserShopProductAttributeModel', 'attribute_id');
	}
}
