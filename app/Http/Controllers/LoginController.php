<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return abort(500, 'Internal Server Error');
        return view('UI.pages.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'nama_pengguna' => 'required',
            'password' => 'required'
        ]);

        $username = $credentials['nama_pengguna'];
        $password = $credentials['password'];

        if (Auth::attempt(['nama_pengguna' => $username, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->intended(route('contents'));
        }


        return back()->with('failedauth', 'Login Gagal');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
