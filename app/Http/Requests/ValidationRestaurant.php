<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRestaurant extends FormRequest
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
                "name" => "required|min:2|max:100",
                "address" => "required|max:255",
                "email" => "required|email|max:255",
                "p_iva" => "required|max:20",
                "phone" => "required|max:25",
                "delivery_price" => "numeric|between:0, 99",
                "order_min" => "numeric|between: 0, 255",
                "delivery_time" => "numeric|between: 0, 200",
                "photo" => "mimes:jpeg,png,jpg,gif|max:2048",
                "photo_bg" => "mimes:jpeg,png,jpg,gif|max:32000"
            
            
        ];
    }

    public function messages(){
        return [
            'name.required' => "Il nome è obbligatorio",
            'name.min' => "Il nome deve avere almeno :min caratteri",
            
        ];
    }
}
