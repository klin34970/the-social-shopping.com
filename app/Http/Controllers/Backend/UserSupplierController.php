<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Models\Backend\UserSupplierModel;
use App\Http\Requests\Backend\StoreUserSupplierRequest;
use App\Http\Requests\Backend\UpdateUserSupplierRequest;
use Auth, URL, Redirect;

class UserSupplierController extends Controller
{
	/***************************************** VIEW *****************************************/
    public function index()
	{
		$user = Auth::user();
		
		if($user->can('supplier_manage'))
		{
			$suppliers = UserSupplierModel::paginate(10);
		}
		else
		{
			$suppliers = UserSupplierModel::where('user_id', Auth::user()->id)->paginate(10);
		}
		
		return view('backend.suppliers.index')->with(
			[
				'suppliers' => $suppliers
			]
		);
	}
	public function show()
	{
		return Redirect::route('backend.supplier.index');
	}
	/***************************************** VIEW *****************************************/
	
	
	/**************************************** CREATE ****************************************/
	public function create()
	{
		$this->authorize('create', UserSupplierModel::class);
		
		$user = Auth::user();
		
		if($user->shops->count() >= config('tss.guest_supplier_max') && !$user->can('supplier_manage'))
		{
			return Redirect::route('backend.supplier.index')->withErrors([ trans('backend/global.supplier.guest_supplier_max') ]);
		}
		
		return view('backend.suppliers.create');
	}
	public function store(StoreUserSupplierRequest $request)
	{
		$this->authorize('create', UserSupplierModel::class);
		
		$user = Auth::user();
		
		if($user->shops->count() >= config('tss.guest_supplier_max') && !$user->can('supplier_manage'))
		{
			return Redirect::route('backend.supplier.index')->withErrors([ trans('backend/global.shop.guest_supplier_max') ]);
		}
		
		$supplier = UserSupplierModel::create([
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
		]);
		
		return Redirect::route('backend.supplier.edit', ['supplier' => $supplier]);
		
	}
	/**************************************** CREATE ****************************************/
	
	
	/**************************************** UPDATE ****************************************/
	public function edit(UserSupplierModel $supplier)
	{
		$this->authorize('update', $supplier);

		return view('backend.suppliers.edit')->with(['supplier' => $supplier]);
	}
	public function update(UpdateUserSupplierRequest $request, UserSupplierModel $supplier)
	{
		$this->authorize('update', $supplier);
		$supplier->update(
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
			]
		);
		return Redirect::route('backend.supplier.edit', ['supplier' => $supplier]);
	}
	/**************************************** UPDATE ****************************************/
	
	
	/**************************************** DELETE ****************************************/
	public function destroy(UserSupplierModel $supplier)
	{
		$this->authorize('delete', $supplier);
		$supplier->delete();
		return Redirect::route('backend.supplier.index');
	}
	/**************************************** DELETE ****************************************/
}
