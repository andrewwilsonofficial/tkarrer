<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendMessage(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $full_name = $request->fname . ' ' . $request->lname;
        $message_text = $request->message;
        $email = $request->email;

        Mail::send('emails.contact', ['full_name' => $full_name, 'message_text' => $message_text, 'email' => $email], function ($message) {
            $message->to('yos.h.almuzaini@gmail.com', 'Admin')->subject('رسالة جديدة من الزائر');
        });

        return back()->with('success', 'تم إرسال الرسالة بنجاح');
    }
}
