<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('order_update');
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
			'curren_state' => 'required|integer|min:1',
        ];
    }
	
	public function sanitize()
    {
        $input = $this->all();

        $input['curren_state'] = filter_var($input['curren_state'], FILTER_SANITIZE_STRING);
		
		$input = array_map('trim', $input);
        $this->replace($input);     
    }
}
