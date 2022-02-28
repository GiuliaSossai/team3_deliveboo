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
            "categories" => "required",
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

    public function messages()
    {
        return [
            'name.required' => "Il nome è obbligatorio",
            'name.min' => "Il nome deve avere almeno :min caratteri",
            'name.max' => "Il nome deve avere massimo :max caratteri",
            'categories.required' => "Selezionare almeno una categoria",
            'address.required' => "L'indirizzo è obbligatorio",
            'address.max' => "L'indirizzo deve avere massimo :max caratteri",
            'p_iva.required' => "La partita iva è obbligatoria",
            'p_iva.max' => "La partita iva deve avere massimo :max caratteri",
            'phone.required' => "Il numero di telefono è obbligatorio",
            'phone.max' => "Il numero di telefono deve avere massimo :max caratteri",
            'delivery_price.numeric' => "Il prezzo di consegna deve essere un numero",
            'delivery_price.between' => "Il prezzo di consegna deve essere un numero compreso tra :min e :max",
            'order_min.numeric' => "L'ordine minimo deve essere un numero",
            'order_min.between' => "L'ordine minimo deve essere un numero compreso tra :min e :max",
            'delivery_time.numeric' => "Il tempo di consegna deve essere un numero",
            'delivery_time.between' => "Il tempo di consegna deve essere un numero compreso tra :min e :max",

        ];
    }
}
