<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VISITORRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'cpf' => 'required|unique:VISITORs',
            'cep' => 'required',
            'address' => 'required|string|max:255',
            'address_number' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'telephone' => 'required',
            'picture_profile' => 'required|image',
            'documents' => 'required'
        ];
    }
}
