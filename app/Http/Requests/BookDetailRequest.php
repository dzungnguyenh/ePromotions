<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookDetailRequest extends FormRequest
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
            'quantity' => 'required | number',
            'book_id' => 'required',
            'product_id' => 'required',
            'price' => 'required | number',
        ];
    }
}
