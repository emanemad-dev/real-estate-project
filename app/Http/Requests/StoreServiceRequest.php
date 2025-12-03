<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(){ return true; }

    public function rules()
    {
        return [
            'name'=>'required|string|max:255',
            'description'=>'nullable|string',
            'image'=>'nullable|image|max:5120',
        ];
    }
}
