<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstateRequest extends FormRequest
{
    public function authorize(){ return true; }

    public function rules()
    {
        return [
            'name'=>'required|string|max:255',
            'price'=>'nullable|numeric',
            'operation_type'=>'required|in:rent,sell',
            'address'=>'nullable|string|max:255',
            'area'=>'nullable|integer',
            'rooms'=>'nullable|integer',
            'bathrooms'=>'nullable|integer',
            'images.*'=>'nullable|image|max:5120',
            'is_published'=>'nullable|boolean',
        ];
    }
}
