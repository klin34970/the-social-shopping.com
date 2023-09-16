<?php

namespace App\Http\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class UserAddressModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_addresses';
  
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
		'lastname',
		'firstname',
		'address_1',
		'address_2',
		'address_3',
		'postcode',
		'city',
		'country',
		'phone_1',
		'phone_2',
		
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
}
