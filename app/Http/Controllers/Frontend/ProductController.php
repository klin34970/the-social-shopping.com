<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Models\Backend\UserShopProductModel;
use App\Http\Models\Frontend\UserOrderModel;
use App\User;
use Carbon\Carbon;

use GeoIP, Validator, Redirect, Input, Hashids, Session, Response, Form;

class ProductController extends Controller
{
    public function byUniqueId($unique_id)
	{
		$product = UserShopProductModel::where('unique_id', $unique_id)->first();
		if($product)
		{
			$geoip = GeoIP::getLocation();
			return view('shop.product.index')->with(
				[
					'product' => $product,
					'geoip' => $geoip,
				]
			);
		}
		else
		{
			abort(404);
		}
	}
	
	public function StoreSessionattributes($unique_id, Request $request)
	{
		$product = UserShopProductModel::where('unique_id', $unique_id)->first();
		if($product)
		{
			$rules = array(
				'attributes' => 'required|array'
			);

			$validation = Validator::make($request->all(), $rules);
			
			if($validation->fails())
			{
				return Response::json([
					'status' => 'error',
					'error' => $validation->messages()->first(),
					'code' => 400
				], 400);
			}
		
			$attributes = $request->get('attributes');
			
			
			$attributes_values = array();
			foreach($attributes as $attribute)
			{

				$key = filter_var($attribute[0], FILTER_SANITIZE_STRING);
				$value = filter_var($attribute[1], FILTER_SANITIZE_NUMBER_INT);
				
				$exist = $product->attributes_values()->find($value);
				if($exist == null)
				{
					return Response::json([
						'status' => 'error',
						'error' => $attribute[0] . ' not correct',
						'code' => 400
					], 400);
				}
				
				Session::put($unique_id . '_' . $key,  $value);
				Session::save();
				
				$attributes_values[] = $value;
			}
			
			$itemstatus = '';
			$itemssku = '';
			$itemsprice = '';
			$itemsqty = '';
						
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
						if($variant->price_discount)
						{
							$itemstatus .= 
							'<div class="cui-ecommerce--catalog--item--status">
								<span class="cui-ecommerce--catalog--item--status--title">-' . ceil ((($variant->price - $variant->price_discount) * 100) / $variant->price) . '%</span>
							</div>';
						
							$itemsprice .= 
							'<div class="cui-ecommerce--product--price">
								' . $product->shop->getSymbolCurrency() . ' <span id="price">' .number_format($variant->price_discount, 2). '</span>
								<span class="promo">(-' . ceil ((($variant->price - $variant->price_discount) * 100) / $variant->price) . '%)</span>
								<div class="cui-ecommerce--product--price-before">
									' . $product->shop->getSymbolCurrency() . ' ' . number_format($variant->price, 2) . '
								</div>
							</div>';
						}
						else
						{
							$itemsprice .= 
							'<div class="cui-ecommerce--product--price">
								' . $product->shop->getSymbolCurrency(). ' ' . number_format($variant->price, 2) . '
							</div>';
						}
						if($variant->sku)
						{
							$itemssku .= trans('frontend/global.product.sku') .': #'. $variant->sku;
						}
						

						$in_stock = $variant->virtual_stock == 0 ? 1000 : $variant->virtual_stock;
						$itemsqty .=
						'
							<div class="form-group row">
								<div class="col-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
									<label class="form-control-label">' .  trans('frontend/global.product.quantity') . '</label>
								</div>
								<div class="col-8 col-xl-8 col-lg-8 col-md-12 col-sm-12">
									<div class="">
										' . Form::number('quantity', 1, ['min' => 1, 'max' => $in_stock, 'step' => 1, 'class' => 'form-control', 'id' => 'quantity']) . '
									</div>
								</div>
							</div>
						';
							
				
						return Response::json([
							'status' => 'success',
							'message' =>
							[
								'itemstatus' => $itemstatus,
								'itemssku' => $itemssku,
								'itemsprice' => $itemsprice,
								'itemsqty' => $itemsqty,
							],
							'code' => 200
						], 200);
					}
				}
			}
			
			if($product->price_discount)
			{
				$itemstatus .= 
				'<div class="cui-ecommerce--catalog--item--status">
					<span class="cui-ecommerce--catalog--item--status--title">-' . ceil ((($product->price - $product->price_discount) * 100) / $product->price) . '%</span>
				</div>';
			
				$itemsprice .= 
				'<div class="cui-ecommerce--product--price">
					' . $product->shop->getSymbolCurrency() . ' <span id="price">' .number_format($product->price_discount, 2). '</span>
					<span class="promo">(-' . ceil ((($product->price - $product->price_discount) * 100) / $product->price) . '%)</span>
					<div class="cui-ecommerce--product--price-before">
						' . $product->shop->getSymbolCurrency() . ' ' . number_format($product->price, 2) . '
					</div>
				</div>';
			}
			else
			{
				$itemsprice .= 
				'<div class="cui-ecommerce--product--price">
					' . $product->shop->getSymbolCurrency(). ' ' . number_format($product->price, 2) . '
				</div>';
			}
			if($product->sku)
			{
				$itemssku .= trans('frontend/global.product.sku') .': #'. $product->sku;
			}
			
			$in_stock = $product->virtual_stock == 0 ? 1000 : $product->virtual_stock;
			$itemsqty .=
			'
				<div class="form-group row">
					<div class="col-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
						<label class="form-control-label">' .  trans('frontend/global.product.quantity') . '</label>
					</div>
					<div class="col-8 col-xl-8 col-lg-8 col-md-12 col-sm-12">
						<div class="">
							' . Form::number('quantity', 1, ['min' => 1, 'max' => $in_stock, 'step' => 1, 'class' => 'form-control', 'id' => 'quantity']) . '
						</div>
					</div>
				</div>
			';
			
			return Response::json([
				'status' => 'success',
				'message' =>
				[
					'itemstatus' => $itemstatus,
					'itemssku' => $itemssku,
					'itemsprice' => $itemsprice,
					'itemsqty' => $itemsqty,
				],
				'code' => 200
			], 200);
		}
		else
		{
			return Response::json([
				'status' => 'error',
                'error' => 'error',
                'code' => 400
            ], 400);
		}
	}
}
