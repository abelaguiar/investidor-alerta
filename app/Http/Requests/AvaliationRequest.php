<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvaliationRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|string',
            'company_id' => 'required',
            'product_id' => 'required',
            'date_acquisition' => 'required',
            'description_experience_product' => 'required',
            'avaliation_count' => 'required|integer',
            'document' => 'required'
        ];
    }
}
