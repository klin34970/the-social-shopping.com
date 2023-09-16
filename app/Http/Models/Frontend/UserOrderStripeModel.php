<?php

namespace App\Http\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class UserOrderStripeModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
	 *
     */
    protected $table = 'users_orders_stripe';
  
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
		'order_id',
        'charge_id',
		'charger_balance_transaction',
		'charge_card_id',
		'charge_customer',
		
    ];
	
	/**
     * Get order
	 *
     * @return ORM
     */
    function order()
	{
		return $this->belongsTo('App\Http\Models\Frontend\UserOrderModel', 'order_id');
	}
}
