<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Models\Backend\UserShopProductModel;

use Validator, Redirect;

class OrderController extends Controller
{
    public function byUniqueId($unique_id, Request $request)
	{
		$product = UserShopProductModel::where('unique_id', $unique_id)->first();
		if($product)
		{
			$rules = array(
				'attributes' => 'required|array',
				'quantity' => 'required|min:1|integer',
				
				'lastname' => 'required|string|min:3',
				'firstname' => 'required|string|min:3',
				'company' => 'nullable|string|min:3|max:64',
				'address_1' => 'required|string|min:6|max:128',
				'address_2' => 'string|nullable|min:1|max:128',
				'address_3' => 'string|nullable|min:1|max:128',
				'postcode' => 'required|string|min:4|max:12',
				'city' => 'required|string|min:3|max:64',
				'country' => 'required|string|min:4|max:64',
				'phone_1' => 'required|string|min:6|max:32',
				'phone_2' => 'string|nullable|min:6|max:32',
				'email' => 'required|email|min:6|max:64',
				'stripeToken' => 'required|string|min:3',
			);

			$validation = Validator::make($request->all(), $rules);
			
			if($validation->fails())
			{
				return Redirect::route('product.index', ['unique_id' => $unique_id])
							->withErrors($validation)
							->withInput();
			}
			
			$attributes = $request->get('attributes');
			$attributes_values = array();
			foreach($attributes as $attribute)
			{
				$value = filter_var($attribute, FILTER_SANITIZE_NUMBER_INT);
				
				$exist = $product->attributes_values()->find($value);
				if($exist == null)
				{
					return Redirect::route('product.index', ['unique_id' => $unique_id])
							->withErrors(['Did you try to cheat ?'])
							->withInput();
				}
				$attributes_values[] = $value;
			}
			
			//Find Variant
			$id_variant = 0;
			$variants = $product->variants()->get();
			foreach($variants as $variant)
			{
				if($variant->combinations->count() && $variant->combinations->count() == count($attributes_values))
				{
					$values = $variant->combinations->pluck('attribute_value_id')->toArray();
					asort($values);
					asort($attributes_values);
					
					if(!array_diff(array_values($attributes_values), $values))
					{
						$id_variant = $variant->id;
						// $product->sku = $variant->sku;
						// $product->price = $variant->price;
						// $product->price_discount = $variant->price_discount;
						// $product->virtual_stock = $variant->virtual_stock;
					}
				}
			}
			
			dd($id_variant);
		}
		else
		{
			abort(404);
		}
	}
}
