<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstateRequest extends FormRequest
{
    public function authorize(){ return true; }

    public function rules()
    {
        return (new StoreEstateRequest())->rules();
    }
}
