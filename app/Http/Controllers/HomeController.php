<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('public.landing', compact('categories'));
    }

    public function aboutUs()
    {
        $our_message = Setting::where('key', 'our_message')->first();
        return view('public.about-us', compact('our_message'));
    }
}
