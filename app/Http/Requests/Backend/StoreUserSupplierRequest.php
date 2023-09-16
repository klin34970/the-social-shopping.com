<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('supplier_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->sanitize();
		
        return [
			'company' => 'required|string|min:3|max:64',
			'address_1' => 'required|string|min:6|max:128',
			'address_2' => 'string|nullable|min:1|max:128',
			'address_3' => 'string|nullable|min:1|max:128',
			'postcode' => 'required|string|min:4|max:12',
			'city' => 'required|string|min:3|max:64',
			'country' => 'required|string|min:4|max:64',
			'phone_1' => 'required|string|min:6|max:32',
			'phone_2' => 'string|nullable|min:6|max:32',
			'email' => 'required|email|min:6|max:64',
			'website' => 'url|nullable|min:6|max:128',
			'legal_form' => 'required|string|min:3|max:64',
			'social_reason' => 'required|string|min:3|max:16',
			'registration' => 'required|string|min:6|max:32',
			'vat' => 'string|nullable|min:6|max:32',
        ];
    }
	
	public function sanitize()
    {
        $input = $this->all();

        $input['company'] = filter_var($input['company'], FILTER_SANITIZE_STRING);
		$input['address_1'] = filter_var($input['address_1'], FILTER_SANITIZE_STRING);
		$input['address_2'] = filter_var($input['address_2'], FILTER_SANITIZE_STRING);
		$input['address_3'] = filter_var($input['address_3'], FILTER_SANITIZE_STRING);
		$input['postcode'] = filter_var($input['postcode'], FILTER_SANITIZE_STRING);
		$input['city'] = filter_var($input['city'], FILTER_SANITIZE_STRING);
		$input['country'] = filter_var($input['country'], FILTER_SANITIZE_STRING);
		$input['phone_1'] = filter_var($input['phone_1'], FILTER_SANITIZE_STRING);
		$input['phone_2'] = filter_var($input['phone_2'], FILTER_SANITIZE_STRING);
		$input['email'] = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
		$input['website'] = filter_var($input['website'], FILTER_SANITIZE_URL);
		$input['legal_form'] = filter_var($input['legal_form'], FILTER_SANITIZE_STRING);
		$input['social_reason'] = filter_var($input['social_reason'], FILTER_SANITIZE_STRING);
		$input['registration'] = filter_var($input['registration'], FILTER_SANITIZE_STRING);
		$input['vat'] = filter_var($input['vat'], FILTER_SANITIZE_STRING);
		
		$input = array_map('trim', $input);
        $this->replace($input);     
    }
}
