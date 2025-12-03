<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    public function authorize(){ return true; }

    public function rules()
    {
        return [
            'title'=>'required|string|max:255',
            'image'=>'nullable|image|max:5120',
            'excerpt'=>'nullable|string',
            'content'=>'nullable|string',
        ];
    }
}
