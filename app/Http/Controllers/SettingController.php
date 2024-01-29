<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'old_password' => 'nullable|min:4',
            'password' => 'nullable|min:4',
            'remove_avatar' => 'nullable|boolean',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

        // Upload Avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar_name = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('dashboard-assets/img/avatars'), $avatar_name);
            $user->avatar = $avatar_name;
        }

        // Remove Avatar
        if ($request->remove_avatar) {
            $user->avatar = 'defult-user.webp';
        }

        if ($request->old_password && $request->password) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
            } else {
                return back()->with('error',  'كلمة المرور القديمة غير صحيحة');
            }
        }

        $user->save();

        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }
}
