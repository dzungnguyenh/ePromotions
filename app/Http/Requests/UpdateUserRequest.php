<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        return [
            'name' => 'required|min:5|max:20',
            'dob' => 'required|date|before:now',
            'phone' => 'required|min:9|max:15',
            'address' => 'required|max:320',
            'password' => 'min:6|max:20',
        ];
    }
}
