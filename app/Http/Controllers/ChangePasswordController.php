<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'old_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('The old password is incorrect.');
                }
            }],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        User::find(auth()->user()->id)
            ->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Change password success.');
    }
}
