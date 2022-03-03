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

    public function messages()
    {
        return [
            'name.required' => "Il nome è obbligatorio",
            'name.min' => "Il nome deve avere almeno :min caratteri",
            'name.max' => "Il nome deve avere massimo :max caratteri",
            'type_id.required' => "Selezionare almeno una tipo",
            'description.required' => "Scrivere almeno 1 ingrediente",
            'price.numeric' => "il prezzo minimo deve essere un numero",
            'price.between' => "il prezzo minimo deve essere un numero compreso tra :min e :max",
            'photo.mimes' => "Il file deve essere jpeg,png,jpg,gif",
            'photo.max' => "Il nome del file deve essere lungo massimo 2048 caratteri",
        ];
    }
}
