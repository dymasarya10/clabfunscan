<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\EducationLevel;
use App\Models\Teacher as Creator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CreatorController extends Controller
{
    public $title = "creator";

    public function index()
    {
        $edulvls = EducationLevel::orderByRaw("FIELD(nama_jenjang, 'tk', 'sd', 'smp', 'smk')")->get();
        $creators = Creator::with(['user', 'education_level'])->get();

        return view('UI.pages.admin.creator', [
            'title' => $this->title,
            'navigation' => [$this->title, 'data creator'],
            'creators' => $creators,
            'edulvls' => $edulvls
        ]);
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'nama_pengguna_post' => 'required|regex:/^[a-zA-Z0-9_]+$/|unique:users,nama_pengguna|max:100',
            'nama_post' => 'required|regex:/^[a-zA-Z, .]+$/|max:150',
            'email_post' => 'required|email',
            'password_post' => 'required|min:8|max:150',
            'education_level_id_post' => 'not_in:pilih',
            'foto_post' => 'required|image|max:2048|dimensions:height=500,width=500|mimes:png'
        ], [
            'nama_post.required' => 'Nama wajib diisi !',
            'nama_post.regex' => 'Format tidak sesuai !',
            'nama_post.max' => 'Maksimal karakter 150 karakter',
            'nama_pengguna_post.required' => 'Nama pengguna wajib diisi !',
            'nama_pengguna_post.max' => 'Nama pengguna melebihi batas maksimal (100 Karakter) !',
            'nama_pengguna_post.regex' => 'Terdeteksi karakter asing',
            'nama_pengguna_post.unique' => 'Nama pengguna sudah ada !',
            'email_post.required' => 'Email wajib diisi !',
            'email_post.email' => 'Harus menggunakan email yang valid !',
            'password_post.required' => 'Password wajib diisi !',
            'password_post.min' => 'Minimal 8 karakter',
            'password_post.max' => 'Maksimal karakter 150 karakter',
            'education_level_id_post.not_in' => 'Silakan pilih jenjang',
            'foto_post.required' => 'Foto wajib diisi !',
            'foto_post.max' => 'Ukuran maksimal file adalah 2mb',
            'foto_post.dimensions' => 'Dimensi foto harus 500x500 pixel',
            'foto_post.image' => 'File harus berupa foto/gambar !',
            'foto_post.mimes' => 'Hanya ekstensi .png yang dapat diterima !',
        ]);
        $user_val['nama_pengguna'] = strtolower($val['nama_pengguna_post']);
        $user_val['nama'] = $val['nama_post'];
        $user_val['email'] = strtolower($val['email_post']);
        $user_val['password'] = Hash::make($val['password_post']);
        $user_val['peran'] = 'teacher';
        $user_val['foto'] = $request->file('foto_post')->store('foto_creator');
        $user = User::create($user_val);
        $creator_val['education_level_id'] = base64_decode($val['education_level_id_post']);
        $creator_val['user_id'] = $user->user_id;
        $creator = Creator::create($creator_val);
        return redirect(route('creators'))->with('success', 'Creator yang dibuat: ' . $user->nama);
    }

    public function destroy(Request $request)
    {
        $creator = Creator::with(['user', 'education_level'])->find($request->id_creator_delete);
        $contents = Content::where('teacher_id',$creator->teacher_id)->get();
        foreach ($contents as $key => $content) {
            if (Storage::exists($content->gambar)) {
                Storage::delete($content->gambar);
            }
            $content->delete();
        }
        $user = User::find($creator->user_id);
        if (Storage::exists($user->foto)) {
            Storage::delete($user->foto);
        }
        $deletedUser = $user->nama;
        $creator->delete();
        $user->delete();

        return redirect(route('creators'))->with('success', 'Creator yang dihapus: ' . $deletedUser);
    }

    public function put(Request $request)
    {
        $id_update = decrypt($request->id_update);
        $creator = Creator::with(['user', 'education_level'])->find($id_update);
        $user = User::find($creator->user_id);
        $val = $request->validate([
            'nama_pengguna_update' => "required|unique:users,nama_pengguna,$user->user_id,user_id|regex:/^[a-zA-Z0-9_]+$/|max:100",
            'nama_update' => 'required|regex:/^[a-zA-Z, .]+$/|max:150',
            'email_update' => 'required|email',
            'education_level_id_update' => 'not_in:pilih',
            'foto_update' => 'sometimes|file|max:2048|dimensions:height=500,width=500'
        ], [
            'nama_update.required' => 'Nama wajib diisi !',
            'nama_update.regex' => 'Format tidak sesuai',
            'nama_update.max' => 'Maksimal karakter 150 karakter',
            'nama_pengguna_update.required' => 'Nama pengguna harus diisi !',
            'nama_pengguna_update.max' => 'Nama pengguna melebihi batas maksimal !',
            'nama_pengguna_update.unique' => "$request->nama_pengguna_update pengguna sudah terdaftar !",
            'nama_pengguna_update.regex' => 'Terdeteksi karakter asing !',
            'email_update.required' => 'Email wajib diisi !',
            'email_update.email' => 'Harus menggunakan email yang valid !',
            'education_level_id_update.not_in' => 'Silakan pilih jenjang',
            'foto_update.max' => 'Ukuran maksimal file adalah 2mb',
            'foto_update.dimensions' => 'Dimensi foto harus 500x500 pixel'
        ]);
        $foto = $request->file('foto_update');
        if ($foto) {
            if (Storage::exists($creator->user->foto)) {
                Storage::delete($creator->user->foto);
            }
            $val['foto_update'] = $foto->store('foto_creator');
        } else {
            $val['foto_update'] = $creator->user->foto;
        }
        $user_data = [
            'nama_pengguna' => $val['nama_pengguna_update'],
            'nama' => $val['nama_update'],
            'email' => $val['email_update'],
            'foto' => $val['foto_update'],
        ];
        $creator_data = [
            'education_level_id' => base64_decode($val['education_level_id_update'])
        ];
        $user->update($user_data);
        $creator->update($creator_data);
        return redirect(route('creators'))->with('success', 'Creator yang diubah: ' . $user->nama);
    }

    public function passDefault(Request $request)
    {
        $creator = Creator::with(['user','education_level'])->find($request->id_creator_resetpass);
        $message = "Password masih tersimpan default";
        if (!Hash::check("password", $creator->user->password)) {
            $creator->user->update([
                'password' => Hash::make("password")
            ]);

            $message = "Berhasil mengubah password default : password";
        }
        return redirect(route('creators'))->withErrors(['error' => 'Password sudah default']);
    }
}
