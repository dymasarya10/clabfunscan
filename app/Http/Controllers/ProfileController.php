<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('UI.pages.admin.profile',[
            'title' => 'profil',
            'navigation' => ['profil', 'data creator'],
        ]);
    }

    public function changePass(Request $request)
    {
        $val = $request->validate([
            'oldPass' => 'required',
            'newPass' => 'required|min:8'
        ],[
            'oldPass.required' => 'Bidang ini wajib diisi',
            'newPass.required' => 'Bidang ini wajib diisi',
            'newPass.min' => 'Minimal 8 karakter'
        ]);

        if(Hash::check($request->oldPass, auth()->user()->getAuthPassword())){
            User::find(auth()->user()->user_id)->update(
                ['password' => Hash::make($request->newPass)]
            );
            return redirect()->route('profile')->with('success','Password berhasil diganti');
        }

        return redirect()->route('profile')->with('failed','Password lama salah');
    }
}
