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
            "name" => "required|min:2|max:100",
            "type_id" => "required",
            "description" => "required",
            "price" => "numeric|between: 0.99, 999",
            "photo" => "mimes:jpeg,png,jpg,gif|max:2048",
            "visible" => "required",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Il nome è obbligatorio",
            'name.min' => "Il nome deve avere almeno :min caratteri",
            'name.max' => "Il nome deve avere massimo :max caratteri",
            'type_id.required' => "Selezionare almeno una categoria",
            'description.required' => "La descrizione è obbligatoria",
            'price.numeric' => "Il prezzo minimo è obbligatorio",
            'price.between' => "Il prezzo minimo deve essere un numero compreso tra :min e :max",
            'photo.mimes' => "Il file deve essere :mimes",
            'photo.max' => "Dimensione massima :max",
            'visible.required' => "Selezionare se è Disponibile o Non",
        ];
    }
}
