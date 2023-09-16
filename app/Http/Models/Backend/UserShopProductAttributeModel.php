<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserShopProductAttributeModel extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_shops_products_attributes';
  
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
        'name',
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
     * Get attributes values
	 *
     * @return ORM
     */
	public function values()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopProductAttributeValueModel', 'attribute_id', 'id')->orderBy('position', 'asc');
    }
}
