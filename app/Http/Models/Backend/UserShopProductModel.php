<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserShopProductModel extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_shops_products';
  
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
		'unique_id',
		'user_id',
        'shop_id',
		'supplier_id',
		'title',
		'sku',
		'category',
		'short_description',
		'full_description',
		'price',
		'price_discount',
		'taxe',
		'virtual_stock',
		'active',
    ];
	
	/**
     * Get user
	 *
     * @return ORM
     */
    function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	
	/**
     * Get shop
	 *
     * @return ORM
     */
    function shop()
	{
		return $this->belongsTo('App\Http\Models\Backend\UserShopModel', 'shop_id');
	}
	
	/**
     * Get supplier
	 *
     * @return ORM
     */
    function supplier()
	{
		return $this->belongsTo('App\Http\Models\Backend\UserSupplierModel', 'supplier_id');
	}
	
	/**
     * Get user orders
	 *
     * @return ORM
     */
	public function orders()
    {
        return $this->hasMany('App\Http\Models\Frontend\UserOrderModel', 'product_id', 'id');
    }
	
	/**
     * Get product images
	 *
     * @return ORM
     */
	public function images()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopProductGalleryModel', 'product_id', 'id')->orderBy('position', 'asc');
    }
	
	/**
     * Get product features
	 *
     * @return ORM
     */
	public function features()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopProductFeatureModel', 'product_id', 'id')->orderBy('position', 'asc');
    }
	
	/**
     * Get product attributes
	 *
     * @return ORM
     */
	public function attributes()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopProductAttributeModel', 'product_id', 'id')->orderBy('position', 'asc');
    }
	
	/**
     * Get product attributes values
	 *
     * @return ORM
     */
	public function attributes_values()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopProductAttributeValueModel', 'product_id', 'id')->orderBy('position', 'asc');
    }
	
	/**
     * Get product variants
	 *
     * @return ORM
     */
	public function variants()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopProductVariantModel', 'product_id', 'id');
    }
	
	/**
     * Get product combinations
	 *
     * @return ORM
     */
	public function combinations()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopProductCombinationModel', 'product_id', 'id');
    }
}
