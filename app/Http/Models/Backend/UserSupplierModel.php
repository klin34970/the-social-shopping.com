<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserSupplierModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_suppliers';
  
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
		'user_id',
        'company',
		'address_1',
		'address_2',
		'address_3',
		'postcode',
		'city',
		'country',
		'phone_1',
		'phone_2',
		'email',
		'website',
		'legal_form',
		'social_reason',
		'registration',
		'vat',
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
     * Get shop products
	 *
     * @return ORM
     */
	public function products()
    {
        return $this->hasMany('App\Http\Models\Backend\UserShopProductModel', 'supplier_id', 'id');
    }
}
