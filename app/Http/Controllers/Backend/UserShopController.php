<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Backend\UserShopModel;
use App\Http\Requests\Backend\StoreUserShopRequest;
use App\Http\Requests\Backend\UpdateUserShopRequest;
use Auth, GeoIP, URL, Redirect, Image, Input, File;
class UserShopController extends Controller
{
	/***************************************** VIEW *****************************************/
    public function index()
	{
		$user = Auth::user();
		
		if($user->can('shop_manage'))
		{
			$shops = UserShopModel::paginate(10);
		}
		else
		{
			$shops = UserShopModel::where('user_id', Auth::user()->id)->paginate(10);
		}
		
		return view('backend.shops.index')->with(
			[
				'shops' => $shops
			]
		);
	}
	public function show()
	{
		return Redirect::route('backend.shop.index');
	}
	/***************************************** VIEW *****************************************/
	
	
	/**************************************** CREATE ****************************************/
	public function create()
	{
		$this->authorize('create', UserShopModel::class);
		
		$geoip = GeoIP::getLocation();
		
		$user = Auth::user();
		
		if($user->shops->count() >= config('tss.guest_shop_max') && !$user->can('shop_manage'))
		{
			return Redirect::route('backend.shop.index')->withErrors([ trans('backend/global.shop.guest_shop_max') ]);
		}
		
		return view('backend.shops.create')->with(['geoip' => $geoip]);
		
	}
	public function store(StoreUserShopRequest $request)
	{
		$this->authorize('create', UserShopModel::class);
		
		$user = Auth::user();
		
		if($user->shops->count() >= config('tss.guest_shop_max') && !$user->can('shop_manage'))
		{
			return Redirect::route('backend.shop.index')->withErrors([ trans('backend/global.shop.guest_shop_max') ]);
		}
		
		$shop = UserShopModel::create([
			'user_id' 		=> Auth::user()->id,
			'company' 		=> $request->get('company'),
			'address_1' 	=> $request->get('address_1'),
			'address_2'		=> $request->get('address_2'),
			'address_3'		=> $request->get('address_3'),
			'postcode'		=> $request->get('postcode'),
			'city' 			=> $request->get('city'),
			'country'		=> $request->get('country'),
			'phone_1'		=> $request->get('phone_1'),
			'phone_2'		=> $request->get('phone_2'),
			'email'			=> $request->get('email'),
			'website'		=> $request->get('website'),
			'legal_form'	=> $request->get('legal_form'),
			'social_reason'	=> $request->get('social_reason'),
			'registration'	=> $request->get('registration'),
			'vat'			=> $request->get('vat'),
			'currency'		=> $request->get('currency'),
			'free_text'		=> $request->get('free_text'),
			'logo' 			=> Input::hasFile('logo') ? '/users/'.Auth::user()->id.'/shops/' : null,
		]);
		
		$shop->stripe()->create(
			[
				'key_public' => $request->get('key_public'),
				'key_private' => $request->get('key_private'),
			]
		);
		
		if($request->get('facebook_pixel_code'))
		{
			$shop->facebook_pixel()->create(
				[
					'facebook_pixel_code' => $request->get('facebook_pixel_code'),
				]
			);
		}
		
		if(Input::hasFile('logo'))
		{
			$path = storage_path('app/public') . '/users/'.Auth::user()->id.'/shops/'.$shop->id;
			File::makeDirectory($path, 0777, true, true);
			Image::make(Input::file('logo'))->resize(50, 50)->save($path . '/50x50.'.Input::file('logo')->getClientOriginalExtension().'', 100);
			Image::make(Input::file('logo'))->resize(100, 100)->save($path . '/100x100.'.Input::file('logo')->getClientOriginalExtension().'', 100);
			Image::make(Input::file('logo'))->resize(200, 200)->save($path . '/200x200.'.Input::file('logo')->getClientOriginalExtension().'', 100);
			Image::make(Input::file('logo'))->resize(400, 400)->save($path . '/400x400.'.Input::file('logo')->getClientOriginalExtension().'', 100);
			Image::make(Input::file('logo'))->resize(800, 800)->save($path . '/800x800.'.Input::file('logo')->getClientOriginalExtension().'', 100);
		}
		
		return Redirect::route('backend.shop.edit', ['shop' => $shop]);
		
	}
	/**************************************** CREATE ****************************************/
	
	
	/**************************************** UPDATE ****************************************/
	public function edit(UserShopModel $shop)
	{
		$this->authorize('update', $shop);
		$geoip = GeoIP::getLocation();
		return view('backend.shops.edit')->with(['geoip' => $geoip, 'shop' => $shop]);
	}
	public function update(UpdateUserShopRequest $request, UserShopModel $shop)
	{
		$this->authorize('update', $shop);
		$shop->update(
			[
				'company' 		=> $request->get('company'),
				'address_1' 	=> $request->get('address_1'),
				'address_2'		=> $request->get('address_2'),
				'address_3'		=> $request->get('address_3'),
				'postcode'		=> $request->get('postcode'),
				'city' 			=> $request->get('city'),
				'country'		=> $request->get('country'),
				'phone_1'		=> $request->get('phone_1'),
				'phone_2'		=> $request->get('phone_2'),
				'email'			=> $request->get('email'),
				'website'		=> $request->get('website'),
				'legal_form'	=> $request->get('legal_form'),
				'social_reason'	=> $request->get('social_reason'),
				'registration'	=> $request->get('registration'),
				'vat'			=> $request->get('vat'),
				'currency'		=> $request->get('currency'),
				'free_text'		=> $request->get('free_text'),
				'logo' 			=> Input::hasFile('logo') ? '/users/'.Auth::user()->id.'/shops/' : null,
			]
		);
		
		$shop->stripe()->updateOrCreate(
			[
				'shop_id' => $shop->id
			],
			[
				'key_public' => $request->get('key_public'),
				'key_private' => $request->get('key_private'),
			]
		);
		
		$shop->facebook_pixel()->updateOrCreate(
			[
				'shop_id' => $shop->id
			],
			[
				'facebook_pixel_code' => $request->get('facebook_pixel_code'),
			]
		);
		
		if(Input::hasFile('logo'))
		{
			$path = storage_path('app/public') . '/users/'.Auth::user()->id.'/shops/'.$shop->id;
			File::makeDirectory($path, 0777, true, true);
			Image::make(Input::file('logo'))->resize(50, 50)->save($path . '/50x50.'.Input::file('logo')->getClientOriginalExtension().'', 100);
			Image::make(Input::file('logo'))->resize(100, 100)->save($path . '/100x100.'.Input::file('logo')->getClientOriginalExtension().'', 100);
			Image::make(Input::file('logo'))->resize(200, 200)->save($path . '/200x200.'.Input::file('logo')->getClientOriginalExtension().'', 100);
			Image::make(Input::file('logo'))->resize(400, 400)->save($path . '/400x400.'.Input::file('logo')->getClientOriginalExtension().'', 100);
			Image::make(Input::file('logo'))->resize(800, 800)->save($path . '/800x800.'.Input::file('logo')->getClientOriginalExtension().'', 100);
		}
		
		return Redirect::route('backend.shop.edit', ['shop' => $shop]);
	}
	/**************************************** UPDATE ****************************************/
	
	
	/**************************************** DELETE ****************************************/
	public function destroy(UserShopModel $shop)
	{
		$this->authorize('delete', $shop);
		$shop->delete();
		$path = storage_path('app/public') . '/users/'.Auth::user()->id.'/shops/'.$shop->id;
		File::deleteDirectory($path);
		return Redirect::route('backend.shop.index');
	}
	/**************************************** DELETE ****************************************/
}
