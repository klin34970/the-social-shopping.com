<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Frontend\UserOrderModel;
use App\Http\Requests\Backend\UpdateOrderRequest;

use Auth;

class UserOrderController extends Controller
{
	/***************************************** VIEW *****************************************/
    public function index()
	{
		$user = Auth::user();
		
		if($user->can('shop_manage'))
		{
			$orders = UserOrderModel::paginate(10);
		}
		else
		{
			$orders = UserOrderModel::where('customer_id', Auth::user()->id)->orWhere('seller_id', Auth::user()->id)->paginate(10);
		}
		
		return view('backend.orders.index')->with(
			[
				'orders' => $orders
			]
		);
	}
	public function show()
	{
		return Redirect::route('backend.order.index');
	}
	/***************************************** VIEW *****************************************/
	
	
	/**************************************** CREATE ****************************************/
	public function create()
	{
		abort(404);
	}
	public function store()
	{
		abort(404);
	}
	/**************************************** CREATE ****************************************/
	
	
	/**************************************** UPDATE ****************************************/
	public function edit(UserOrderModel $order)
	{
		$this->authorize('update', $order);
	}
	public function update(UpdateOrderRequest $request, UserOrderModel $order)
	{
	}
	/**************************************** UPDATE ****************************************/
	
	
	/**************************************** DELETE ****************************************/
	public function destroy(Request $request, UserOrderModel $order)
	{
		abort(404);
	}
	/**************************************** DELETE ****************************************/
}
