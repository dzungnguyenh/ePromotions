<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePointRequest extends FormRequest
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
            'vote' => 'required',
            'share' => 'required',
            'book' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'vote.required' => 'Vote is not null!',
            'share.required' => 'Share is not null!',
            'book.required' => 'Book is not null!',
        ];
    }
}
