<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Models\Backend\UserShopModel;
use App\Http\Models\Backend\UserSupplierModel;
use App\Http\Models\Backend\UserShopProductModel;
use App\Http\Requests\Backend\StoreUserShopProductRequest;
use App\Http\Requests\Backend\UpdateUserShopProductRequest;

use Auth, Redirect, Input, Image, File, Hashids, Validator, Response, DB, Form;

class UserShopProductController extends Controller
{
	/***************************************** VIEW *****************************************/
    public function index()
	{
		$user = Auth::user();
		
		if($user->can('shop_product_manage'))
		{
			$products = UserShopProductModel::paginate(10);
		}
		else
		{
			$products = UserShopProductModel::where('user_id', Auth::user()->id)->paginate(10);
		}

		return view('backend.products.index')->with(
			[
				'products' => $products
			]
		);
	}
	public function show()
	{
		return Redirect::route('backend.product.index');
	}
	/***************************************** VIEW *****************************************/
	
	
	/**************************************** CREATE ****************************************/
	public function create()
	{
		$this->authorize('create', UserShopProductModel::class);
		
		$shops = UserShopModel::where('user_id', Auth::user()->id)->pluck('company', 'id');
		$suppliers = UserSupplierModel::where('user_id', Auth::user()->id)->pluck('company', 'id');
		
		$user = Auth::user();
		
		if($user->shops->count() >= config('tss.guest_product_max') && !$user->can('shop_product_manage'))
		{
			return Redirect::route('backend.product.index')->withErrors([ trans('backend/global.product.guest_product_max') ]);
		}
		
		return view('backend.products.create')->with(
			[
				'shops' => $shops,
				'suppliers' => $suppliers,
			]
		);
	}
	public function store(StoreUserShopProductRequest $request)
	{
		$this->authorize('create', UserShopProductModel::class);
		
		$user = Auth::user();
		
		if($user->shops->count() >= config('tss.guest_product_max') && !$user->can('shop_product_manage'))
		{
			return Redirect::route('backend.product.index')->withErrors([ trans('backend/global.product.guest_product_max') ]);
		}
		
		$product = UserShopProductModel::create([
			'unique_id'				=> Hashids::encode(time()),
			'user_id' 				=> Auth::user()->id,
			'shop_id' 				=> $request->get('shop'),
			'supplier_id' 			=> $request->get('supplier'),
			'title' 				=> $request->get('title'),
			'sku' 					=> $request->get('sku'),
			'category' 				=> $request->get('category'),
			'short_description' 	=> $request->get('short_description'),
			'full_description' 		=> $request->get('full_description'),
			'price' 				=> $request->get('price'),
			'price_discount' 		=> $request->get('price_discount') ? $request->get('price_discount') : null,
			'taxe' 					=> $request->get('taxe'),
			'virtual_stock' 		=> $request->get('virtual_stock'),
			'active' 				=> $request->get('active'),
			'thumbnail' 			=> '/users/'.Auth::user()->id.'/products/',
		]);
		
		
		if(Input::hasFile('thumbnail'))
		{
			$path = storage_path('app/public') . '/users/'.Auth::user()->id.'/products/'.$product->id;
			File::makeDirectory($path, 0777, true, true);
			$file = Input::file('thumbnail');
			Image::make($file)->resize(50, 50)->save($path . '/50x50.'.$file->getClientOriginalExtension().'', 100);
			Image::make($file)->resize(100, 100)->save($path . '/100x100.'.$file->getClientOriginalExtension().'', 100);
			Image::make($file)->resize(200, 200)->save($path . '/200x200.'.$file->getClientOriginalExtension().'', 100);
		}
		
		return Redirect::route('backend.product.edit', ['product' => $product]);
		
	}
	/**************************************** CREATE ****************************************/
	
	
	/**************************************** UPDATE ****************************************/
	public function edit(UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$shops = UserShopModel::where('user_id', Auth::user()->id)->pluck('company', 'id');
		$suppliers = UserSupplierModel::where('user_id', Auth::user()->id)->pluck('company', 'id');
		return view('backend.products.edit')->with(
			[
				'product' => $product,
				'shops' => $shops,
				'suppliers' => $suppliers,
			]
		);
	}
	public function update(UpdateUserShopProductRequest $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$product->update(
			[
			'shop_id' 				=> $request->get('shop'),
			'supplier_id' 			=> $request->get('supplier'),
			'title' 				=> $request->get('title'),
			'sku' 					=> $request->get('sku'),
			'category' 				=> $request->get('category'),
			'short_description' 	=> $request->get('short_description'),
			'full_description' 		=> $request->get('full_description'),
			'price' 				=> $request->get('price'),
			'price_discount' 		=> $request->get('price_discount') ? $request->get('price_discount') : null,
			'taxe' 					=> $request->get('taxe'),
			'virtual_stock' 		=> $request->get('virtual_stock'),
			'active' 				=> $request->get('active'),
			]
		);
		
		if(Input::hasFile('thumbnail'))
		{
			$path = storage_path('app/public') . '/users/'.Auth::user()->id.'/products/'.$product->id;
			File::makeDirectory($path, 0777, true, true);
			$file = Input::file('thumbnail');
			Image::make($file)->resize(50, 50)->save($path . '/50x50.'.$file->getClientOriginalExtension().'', 100);
			Image::make($file)->resize(100, 100)->save($path . '/100x100.'.$file->getClientOriginalExtension().'', 100);
			Image::make($file)->resize(200, 200)->save($path . '/200x200.'.$file->getClientOriginalExtension().'', 100);
		}
		
		return Redirect::route('backend.product.edit', ['product' => $product]);
	}
	/**************************************** UPDATE ****************************************/
	
	
	/**************************************** DELETE ****************************************/
	public function destroy(UserShopProductModel $product)
	{
		$this->authorize('delete', $product);
		$product->delete();
		$path = storage_path('app/public') . '/users/'.Auth::user()->id.'/products/'.$product->id;
		File::deleteDirectory($path);
		return Redirect::route('backend.product.index');
	}
	/**************************************** DELETE ****************************************/
	
	
	/*************************************** VARIANTS ***************************************/
	public function createVariant(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$rules = array(
			'variants_sku' => 'nullable|string|min:3|max:64',
		    'variants_price' => 'required|numeric',
			'variants_price_discount' => 'nullable|numeric',
			'variants_virtual_stock' => 'nullable|numeric',
			'attributes_values' => 'required|array'
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
		
		$id = filter_var($request->get('variants_id'), FILTER_SANITIZE_NUMBER_INT);
		$sku = filter_var($request->get('variants_sku'), FILTER_SANITIZE_STRING);
		$price = filter_var($request->get('variants_price'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		$price_discount = filter_var($request->get('variants_price_discount'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		$virtual_stock = filter_var($request->get('variants_virtual_stock'), FILTER_SANITIZE_NUMBER_INT);
		$attributes_values = $request->get('attributes_values');
		
		
		$combinations = array();

		foreach($product->attributes()->get() as $attribute)
		{
			foreach($attribute->values()->get() as $value)
			{
				$combinations[$attribute->id][] = $value->id;
			}
		}
		
		$combinations = \BenTools\CartesianProduct\cartesian_product($combinations)->asArray();
		
		//we must check if combination can exist
		foreach($combinations as $key => $combination)
		{
			if(count($attributes_values) == count($combination))
			{
				asort($attributes_values);
				asort($combination);
				if(!array_diff(array_values($combination), $attributes_values))
				{
					$variant = $product->variants()->updateOrcreate(
						[
							'id' => $id
						],
						[
							'sku' => $sku,
							'price' => $price,
							'price_discount' => $price_discount,
							'virtual_stock' => $virtual_stock,
						]
					);
					
					foreach($combination as $key => $value)
					{
						$product->combinations()->updateOrcreate(
							[
								'variant_id' => $variant->id,
								'attribute_id' => $key,
								'attribute_value_id' => $value,
							],
							[
								'variant_id' => $variant->id,
								'attribute_id' => $key,
								'attribute_value_id' => $value,
							]
						);
					}
					
					return Response::json([
						'status' => 'success',
						'message' => 
						[	
							'id' => $variant->id,
							'message' => trans('backend/global.product.success_variants_save', ['name' => $variant->sku]),
						],
						'code' => 200
					], 200);
					
				}
			}
		}

		return Response::json([
			'status' => 'error',
			'error' => 'don try to cheat?',
			'code' => 400
		], 400);
		
	}
	public function deleteVariant(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$variant_id = filter_var($request->get('id'), FILTER_SANITIZE_NUMBER_INT);
		
		$variant = $product->variants()->find($variant_id);
		$sku = $variant->sku;
		$variant->delete();
		
		return Response::json([
			'status' => 'success',
			'message' => trans('backend/global.product.success_variants_delete', ['name' => $sku]),
			'code' => 200
		], 200);
		
	}
	
	public function getVariants(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$combinations = array();

		foreach($product->attributes()->get() as $attribute)
		{
			foreach($attribute->values()->get() as $value)
			{
				$combinations[$attribute->name][] = $value->id;
			}
		}
		
		$combinations = \BenTools\CartesianProduct\cartesian_product($combinations)->asArray();
		
		$array = array();
		$variants = $product->variants()->get();
		//Combinations already exists
		foreach($combinations as $key => $combination)
		{
			foreach($variants as $variant)
			{
				if($variant->combinations->count() && $variant->combinations->count() == count($combination))
				{
					$values = $variant->combinations->pluck('attribute_value_id')->toArray();
					asort($values);
					asort($combination);
					
					if(!array_diff(array_values($combination), $values))
					{
						$implode = array();
						foreach($combination as $id)
						{
							$implode[] = $product->attributes_values()->find($id)->value;
						}
						$array[] = [
							implode(', ', $implode),
							'<div class="form-group-variants">'. Form::text('variant_sku', $variant->sku, ['class' => 'form-control', 'id' => 'variant_sku']) .'</div>',
							'<div class="form-group-variants">'. Form::number('variant_price', $variant->price, ['min' => 0, 'step' => 0.01, 'class' => 'form-control', 'id' => 'variant_price']) .'</div>',
							'<div class="form-group-variants">'. Form::number('variant_price_discount', $variant->price_discount, ['min' => 0, 'step' => 0.01, 'class' => 'form-control', 'id' => 'variant_price_discount']) .'</div>',
							'<div class="form-group-combination">'. Form::number('variant_virtual_stock', $variant->virtual_stock, ['min' => 0, 'step' => 1, 'class' => 'form-control', 'id' => 'variant_virtual_stock']) .'</div>',
							'<div class="process-variants" data-attributes-values="'.implode(', ', $combination).'" data-id="'.$variant->id.'"><div role="button-save-variants" class="btn btn-success margin-right-10">'.trans('backend/global.app_save').'</div><div role="button-delete-variants" class="btn btn-danger">'.trans('backend/global.app_delete').'</div><div>'
						];
						
						//remove the combination from cartesian array
						unset($combinations[$key]);
					}
				}
			}
		}
		
		//Combinations made without existing one
		foreach($combinations as $key => $combination)
		{
			$implode = array();
			$sku = array();
			foreach($combination as $id)
			{
				$value = $product->attributes_values()->find($id)->value;
				$implode[] = $value;
				$sku[] = mb_strtoupper(substr($value, 0, 3));
			}
			
			$array[] = [
				implode(', ', $implode),
				'<div class="form-group-variants">'. Form::text('variant_sku', implode('', $sku), ['class' => 'form-control', 'id' => 'variant_sku']) .'</div>',
				'<div class="form-group-variants">'. Form::number('variant_price', $product->price, ['min' => 0, 'step' => 0.01, 'class' => 'form-control', 'id' => 'variant_price']) .'</div>',
				'<div class="form-group-variants">'. Form::number('variant_price_discount', $product->price_discount, ['min' => 0, 'step' => 0.01, 'class' => 'form-control', 'id' => 'variant_price_discount']) .'</div>',
				'<div class="form-group-variants">'. Form::number('variant_virtual_stock', $product->virtual_stock, ['min' => 0, 'step' => 1, 'class' => 'form-control', 'id' => 'variant_virtual_stock']) .'</div>',
				'<div class="process-variants" data-attributes-values="'.implode(', ', $combination).'"><div role="button-save-variants" class="btn btn-success margin-right-10">'.trans('backend/global.app_save').'</div><div>'
			];				
		}
		
		return Response::json([
			'status' => 'success',
			'message' => 
			[	
				'html' => $array,
				'message' => trans('backend/global.product.success_generate_combinations'),
			],
			'code' => 200
		], 200);
	}
	/*************************************** VARIANTS ***************************************/
	
	
	/*********************************** ATTRIBUTES VALUES **********************************/
	public function createAttributeValue(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$rules = array(
		    'attributes_values_value' => 'required|string|max:32',
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
		
		$parent_id = filter_var($request->get('parent_id'), FILTER_SANITIZE_NUMBER_INT);
		$id = filter_var($request->get('attributes_values_id'), FILTER_SANITIZE_NUMBER_INT);
		$value = filter_var($request->get('attributes_values_value'), FILTER_SANITIZE_STRING);
		

		
		$value = $product->attributes_values()->updateOrcreate(
			[
				'id' => $id
			],
			[
				'attribute_id' => $parent_id,
				'value' => $value,
				'position' => $product->attributes_values->count() ? $product->attributes_values->count() : 0,
			]
		);
		
		if($value->wasRecentlyCreated)
		{
			if($product->variants->count())
			{
				foreach($product->variants as $variant)
				{
					if($variant->combinations->count())
					{
						$attributes_ids = $variant->combinations->pluck('attribute_id')->toArray();
						$attribute = $value->attribute;
						if(!in_array($attribute->id, $attributes_ids))
						{
							$product->combinations()->create(
								[
									'variant_id' => $variant->id,
									'attribute_id' => $attribute->id,
									'attribute_value_id' => $value->id
								]
							);
						}
					}
					else
					{
						$attribute = $value->attribute;
						$product->combinations()->create(
								[
									'variant_id' => $variant->id,
									'attribute_id' => $attribute->id,
									'attribute_value_id' => $value->id
								]
							);
					}
				}
			}
		}
		
		return Response::json([
			'status' => 'success',
			'message' => 
			[	
				'id' => $value->id,
				'message' => trans('backend/global.product.success_attributes_values_save', ['name' => $value->value]),
			],
			'code' => 200
		], 200);
	}
	public function deleteAttributeValue(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$attribute_value_id = filter_var($request->get('id'), FILTER_SANITIZE_NUMBER_INT);
		
		$attributes_values = $product->attributes_values()->find($attribute_value_id);
		$value = $attributes_values->value;
		$attributes_values->delete();
		
		return Response::json([
			'status' => 'success',
			'message' => trans('backend/global.product.success_attributes_values_delete', ['name' => $value]),
			'code' => 200
		], 200);
	}
	public function updateAttributeValuePosition(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		if(is_array($request->get('order')))
		{
			$parent_id = filter_var($request->get('parent_id'), FILTER_SANITIZE_NUMBER_INT);
			$clean = array_values(array_filter($request->get('order')));
			foreach($clean as $key => $value)
			{
				$value = filter_var($value, FILTER_SANITIZE_STRING);
				$product->attributes_values()->where('id', $value)->update(['position' => $key, 'attribute_id' => $parent_id]);
			}
		}
		
		return Response::json([
			'status' => 'success',
			'message' => 'success',
			'code' => 200
		], 200);
	}
	/*********************************** ATTRIBUTES VALUES **********************************/
	
	
	/************************************** ATTRIBUTES **************************************/
	public function createAttribute(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$rules = array(
		    'attributes_name' => 'required|string|max:32',
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
		
		$id = filter_var($request->get('attributes_id'), FILTER_SANITIZE_NUMBER_INT);
		$name = filter_var($request->get('attributes_name'), FILTER_SANITIZE_STRING);
		
		$attribute = $product->attributes()->updateOrcreate(
			[
				'id' => $id
			],
			[
				'name' => $name,
				'position' => $product->attributes->count() ? $product->attributes->count() : 0,
			]
		);
		
		return Response::json([
			'status' => 'success',
			'message' => 
			[	
				'id' => $attribute->id,
				'message' => trans('backend/global.product.success_attributes_save', ['name' => $attribute->name]),
			],
			'code' => 200
		], 200);
	}
	public function deleteAttribute(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$attribute_id = filter_var($request->get('id'), FILTER_SANITIZE_NUMBER_INT);
		
		$attribute = $product->attributes()->find($attribute_id);
		$name = $attribute->name;
		$attribute->delete();
		
		return Response::json([
			'status' => 'success',
			'message' => trans('backend/global.product.success_attributes_delete', ['name' => $name]),
			'code' => 200
		], 200);
	}
	public function updateAttributePosition(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		if(is_array($request->get('order')))
		{
			$clean = array_values(array_filter($request->get('order')));
			foreach($clean as $key => $value)
			{
				$value = filter_var($value, FILTER_SANITIZE_STRING);
				$product->attributes()->where('id', $value)->update(['position' => $key]);
			}
		}
		return Response::json([
			'status' => 'success',
			'message' => 'success',
			'code' => 200
		], 200);
	}
	/************************************** ATTRIBUTES **************************************/

	
	/*************************************** FEATURES ***************************************/
	public function createFeature(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$rules = array(
		    'features_title' => 'required|string|max:64',
			'features_description' => 'required|string|max:255',
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
		
		$id = filter_var($request->get('features_id'), FILTER_SANITIZE_NUMBER_INT);
		$title = filter_var($request->get('features_title'), FILTER_SANITIZE_STRING);
		$description = filter_var($request->get('features_description'), FILTER_SANITIZE_STRING);
		
		$feature = $product->features()->updateOrcreate(
			[
				'id' => $id
			],
			[
				'title' => $title,
				'description' => $description,
				'position' => $product->features->count() ? $product->features->count() : 0,
			]
		);
		
		return Response::json([
			'status' => 'success',
			'message' => 
			[	
				'id' => $feature->id,
				'message' => trans('backend/global.product.success_features_save', ['name' => $feature->title]),
			],
			'code' => 200
		], 200);
	}
	public function deleteFeature(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		$feature_id = filter_var($request->get('id'), FILTER_SANITIZE_NUMBER_INT);
		
		$feature = $product->features()->find($feature_id);
		$title = $feature->title;
		$feature->delete();
		
		return Response::json([
			'status' => 'success',
			'message' => trans('backend/global.product.success_features_delete', ['name' => $title]),
			'code' => 200
		], 200);
	}
	public function updateFeaturePosition(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		if(is_array($request->get('order')))
		{
			$clean = array_values(array_filter($request->get('order')));
			foreach($clean as $key => $value)
			{
				$value = filter_var($value, FILTER_SANITIZE_STRING);
				$product->features()->where('id', $value)->update(['position' => $key]);
			}
		}
		return Response::json([
			'status' => 'success',
			'message' => 'success',
			'code' => 200
		], 200);
	}
	/*************************************** FEATURES ***************************************/
	
	
	/*************************************** GALLERY ***************************************/
	public function updateGallery(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		
		if($product->images->count() >= 8)
		{
			return Response::json([
				'status' => 'error',
				'error' => 'Max 8 images',
				'code' => 400
			], 400);
		}
		
		$input = Input::all();
		
		$rules = array(
		    'file' => 'mimes:jpeg,bmp,png,jpg|dimensions:min_width=200,min_height=200|max:500',
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
		{
			return Response::json([
				'status' => 'error',
                'error' => $validation->messages()->first(),
                'code' => 400
            ], 400);
		}
		
		
		
		$path = storage_path('app/public') . '/users/'.Auth::user()->id.'/products/'.$product->id.'/gallery/';
		File::makeDirectory($path, 0777, true, true);
		$file = Input::file('file');
		$id = Hashids::encode(time() + mt_rand(1, 999));
		
		
		Image::make($file)->save($path.$id.'_original.'.$file->getClientOriginalExtension().'', 50);
		
		// Image::make($file)->resize(50, 50, function ($constraint) {
            // $constraint->aspectRatio();
			// $constraint->upsize();
        // })->resizeCanvas(50, 50, 'center', false, array(255, 255, 255, 0))
		// ->save($path.$id.'_50x50.'.$file->getClientOriginalExtension().'', 100);
		
		// Image::make($file)->resize(200, 200, function ($constraint) {
            // $constraint->aspectRatio();
			// $constraint->upsize();
        // })->resizeCanvas(200, 200, 'center', false, array(255, 255, 255, 0))
		// ->save($path.$id.'_200x200.'.$file->getClientOriginalExtension().'', 100);
		
		
		Image::make($file)->fit(50, 50)->save($path.$id.'_50x50.'.$file->getClientOriginalExtension().'', 80);
		//Image::make($file)->fit(100, 100)->save($path.$id.'_100x100.'.$file->getClientOriginalExtension().'', 70);
		Image::make($file)->fit(200, 200)->save($path.$id.'_200x200.'.$file->getClientOriginalExtension().'', 60);
		
		$product->images()->create(
			[
				'filename' => $id,
				'position' => $product->images->count() ? $product->images->count() : 0,
			]
		);
		
		return Response::json([
			'status' => 'success',
			'message' => 
			[	
				'id' => $id,
				'url' => '/storage/users/'.Auth::user()->id.'/products/'.$product->id.'/gallery/'.$id.'_50x50.'.$file->getClientOriginalExtension(),
			],
			'code' => 200
		], 200);

	}
	public function deleteGallery(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		$filename = filter_var($request->get('id'), FILTER_SANITIZE_STRING);
		
		$files = File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $filename . '*');
		foreach($files as $file)
		{
			File::delete($file);
		}
		$product->images()->where('filename', $filename)->delete();
		
		return Response::json([
			'status' => 'success',
			'message' => trans('backend/global.product.success_gallery_delete'),
			'code' => 200
		], 200);
	}
	public function updateGalleryPosition(Request $request, UserShopProductModel $product)
	{
		$this->authorize('update', $product);
		if(is_array($request->get('order')))
		{
			$clean = array_values(array_filter($request->get('order')));
			foreach($clean as $key => $value)
			{
				$value = filter_var($value, FILTER_SANITIZE_STRING);
				$product->images()->where('filename', $value)->update(['position' => $key]);
			}
		}
		return Response::json([
			'status' => 'success',
			'message' => 'success',
			'code' => 200
		], 200);
	}
	/*************************************** GALLERY ***************************************/
}
