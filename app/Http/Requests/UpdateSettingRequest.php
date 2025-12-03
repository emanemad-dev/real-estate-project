<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize(){ return true; }

    public function rules()
    {
        return [
            'header_title'=>'nullable|string|max:255',
            'header_description'=>'nullable|string',
            'header_image'=>'nullable|image|max:5120',
            'about_title'=>'nullable|string|max:255',
            'about_description'=>'nullable|string',
            'about_image_1'=>'nullable|image|max:5120',
            'about_image_2'=>'nullable|image|max:5120',
            'contact_address'=>'nullable|string|max:255',
            'contact_email'=>'nullable|email|max:255',
            'contact_phone'=>'nullable|string|max:50',
        ];
    }
}
