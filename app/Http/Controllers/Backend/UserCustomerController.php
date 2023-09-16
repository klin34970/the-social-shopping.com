<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Frontend\UserOrderModel;
use App\Http\Requests\Backend\UpdateOrderRequest;
use Auth, DB;

class UserCustomerController extends Controller
{

	/***************************************** VIEW *****************************************/
    public function index()
	{
		$user = Auth::user();
		
		if($user->can('customer_manage'))
		{
			$orders = UserOrderModel::select(
									'*', 
									DB::raw('sum(product_price * product_quantity) as total_spent'),
									DB::raw('count(id) as total_order'),
									DB::raw('max(created_at) as created_at')
								)
						->orderBy('created_at', 'desc')
						->groupBy('currency', 'customer_id')
						->paginate(10);
		}
		else
		{
			$orders = UserOrderModel::where('seller_id', Auth::user()->id)
						->select(
									'*', 
									DB::raw('sum(product_price * product_quantity) as total_spent'),
									DB::raw('count(id) as total_order'),
									DB::raw('max(created_at) as created_at')
								)
						->orderBy('created_at', 'desc')
						->groupBy('currency', 'customer_id')
						->paginate(10);
		}
		
		return view('backend.customers.index')->with(
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
		abort(404);
	}
	public function update(UpdateOrderRequest $request, UserOrderModel $order)
	{
		abort(404);
	}
	/**************************************** UPDATE ****************************************/
	
	
	/**************************************** DELETE ****************************************/
	public function destroy(Request $request, UserOrderModel $order)
	{
		abort(404);
	}
	/**************************************** DELETE ****************************************/
}
