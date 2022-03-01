<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationDish extends FormRequest
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
            "name" => "required|min:5|max:100",
            "type_id" => "required",
            "description" => "required",
            "price" => "numeric|between: 0.99, 999",
            "photo" => "mimes:jpeg,png,jpg,gif|max:2048",
        ];
    }
}
