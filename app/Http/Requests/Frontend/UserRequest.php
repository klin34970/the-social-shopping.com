<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
			'lastname' => 'required|string|max:255',
			'firstname' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
        ];
    }
	
	public function sanitize()
    {
        $input = $this->all();

        $input['lastname'] = filter_var($input['lastname'], FILTER_SANITIZE_STRING);
		$input['firstname'] = filter_var($input['firstname'], FILTER_SANITIZE_STRING);
		$input['email'] = filter_var($input['email'], FILTER_SANITIZE_STRING);
		$input['password'] = filter_var($input['password'], FILTER_SANITIZE_STRING);

        $this->replace($input);     
    }
}
