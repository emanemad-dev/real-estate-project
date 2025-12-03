<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'header_title','header_description','header_image',
        'about_title','about_description','about_image_1','about_image_2',
        'contact_address','contact_email','contact_phone',
    ];
}
