<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserShopProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('shop_product_create');
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
			'title' => 'required|string|min:6|max:64',
			'sku' => 'nullable|string|min:3|max:64',
			'category' => 'string|required|min:1|max:64',
			'short_description' => 'string|required|min:6|max:128',
			'full_description' => 'nullable|string|min:6|max:65535',
			'price' => 'required|numeric',
			'price_discount' => 'nullable|numeric',
			'taxe' => 'required|numeric',
			'virtual_stock' => 'nullable|numeric',
			'active' => 'required|boolean',
			//'thumbnail' => 'mimes:jpeg,bmp,png,jpg|dimensions:ratio=1/1,min_width=200,min_height=200|max:500',
        ];
    }
	
	public function sanitize()
    {
        $input = $this->all();

        $input['title'] = filter_var($input['title'], FILTER_SANITIZE_STRING);
		$input['sku'] = filter_var($input['sku'], FILTER_SANITIZE_STRING);
		$input['category'] = filter_var($input['category'], FILTER_SANITIZE_STRING);
		$input['short_description'] = filter_var($input['short_description'], FILTER_SANITIZE_STRING);
		$input['full_description'] = filter_var($input['full_description'], FILTER_SANITIZE_STRING);
		$input['price'] = filter_var($input['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		$input['price_discount'] = filter_var($input['price_discount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		$input['taxe'] = filter_var($input['taxe'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		$input['virtual_stock'] = filter_var($input['virtual_stock'], FILTER_SANITIZE_NUMBER_INT);
		$input['active'] = filter_var($input['active'], FILTER_SANITIZE_STRING);
		
		$input = array_map('trim', $input);
        $this->replace($input);     
    }
}
