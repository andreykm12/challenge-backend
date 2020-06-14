<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AnalyticTypeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'              => 'required|max:100|alpha',
            'units'             => 'required|max:100|alpha',
            'is_numeric'        => 'required|boolean',
            'num_decimal_place' => 'required|max:100|alpha',
        ];
    }
}
