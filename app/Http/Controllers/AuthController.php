<?php

namespace App\Http\Controllers;

use SweetAlert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function proses(Request $request)
    {
        $request->validate(
            [
                'email'     => 'required|email',
                'password'  => 'required|min:8'
            ],
        );

        $kredensial = $request->only('email', 'password');

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return redirect()->intended('transaksi');
        }

        return back()->withErrors([
            'email' => 'Maaf Username atau password anda salah',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate(
            [
                'name'      => 'required|string|max:255',
                'email'     => 'required|email',
                'password'  => 'required|min:8|confirmed',
            ],
        );
        $name       = $request->name;
        $email      = $request->email;
        $password   = $request->password;

        $user = new User;
        $user->name     = $name;
        $user->email    = $email;
        $user->password = bcrypt($password);
        $user->save();

        SweetAlert::success('Success', 'Registrasi Berhasil');
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
