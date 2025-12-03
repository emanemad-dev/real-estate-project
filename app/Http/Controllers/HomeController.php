<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $estates = Estate::where('is_published', true)->latest()->get();
        $services = Service::latest()->get();
        $blogs = Blog::latest()->get();

        return view('home', compact('settings','estates','services','blogs'));
    }
}
