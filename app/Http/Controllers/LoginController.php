<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Pengguna berhasil login
            $user = Auth::user();

            if ($user->is_admin) {
                // Pengguna adalah admin
                return redirect()->route('Admin');
            } else {
                // Pengguna adalah pengguna biasa
                return redirect()->route('User');
            }
        } else {    
            // Gagal login
            return redirect()->route('login')->with('error', 'Email atau kata sandi salah.');
        }
    }
}
