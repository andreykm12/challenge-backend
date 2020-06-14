<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PropertyAnalyticRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'value'            => 'required|numeric',
            'property_id'      => 'required|integer|min:0',
            'analytic_type_id' => 'required|integer|min:0',
        ];
    }
}
