<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'guid'    => 'required|max:255|alpha',
            'state'   => 'required|max:255|alpha',
            'suburb'  => 'required|max:255|alpha',
            'country' => 'required|max:255|alpha',
        ];
    }
}
