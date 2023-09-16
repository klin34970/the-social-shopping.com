<?php

namespace App\Http\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class UserStripeModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_stripe';
  
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
        'stripe_id',
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
