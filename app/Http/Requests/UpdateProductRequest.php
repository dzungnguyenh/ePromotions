<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_name'=>'required',
            'price'=>'required| numeric',
            'quantity'=>'required | numeric | min:0',
            'description'=>'required',
            'category_id'=>'required',
            'user_id'=>'required',
        ];
    }
}
