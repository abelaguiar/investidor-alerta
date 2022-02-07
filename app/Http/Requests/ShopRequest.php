<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cnpj' => 'required',
            'name' => 'required|string|max:255',
            'cep' => 'required',
            'address' => 'required|string|max:255',
            'address_number' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
