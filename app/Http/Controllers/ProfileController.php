<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('pages.profil.profil', compact('user'));
    }

    public function update(Request $request)
    {
        $name   = $request->name;
        $email  = $request->email;

        $user   = User::find(auth()->user()->id);
        $user->name     = $name;
        $user->email    = $email;
        $user->save();

        return back()->with('success', 'Profil berhasil di ubah');
    }
}
