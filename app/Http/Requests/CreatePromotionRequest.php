<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePromotionRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            $title = 'required|max:255|unique:promotions,title,' . $this->get('promotion_id');
        } else {
            $title = 'required|max:255|unique:promotions';
        }
        return [
            'title' => $title,
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'percent'=>'required',
            'quantity'=>'required',
            'date_start'=>'required',
            'date_end'=>'required'
        ];
    }
}
