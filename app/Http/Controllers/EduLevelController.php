<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EducationLevel as Edu;
use Illuminate\Support\Facades\Storage;

class EduLevelController extends Controller
{
    public $title = 'jenjang';
    public function index()
    {
        $edu_levels = Edu::all();

        return view('UI.pages.admin.edu-level', [
            'title' => $this->title,
            'navigation' => [$this->title, 'data jenjang'],
            'edu_levels' => $edu_levels
        ]);
    }
    public function store(Request $request)
    {
        $val = $request->validate([
            'nama_jenjang_post' => 'required|max:5|regex:/^[a-zA-Z]+$/|unique:education_levels,nama_jenjang'
        ], [
            'nama_jenjang_post.required' => 'Bidang ini harus diisi !',
            'nama_jenjang_post.max' => 'Batas maksimal kata adalah 5 kata',
            'nama_jenjang_post.regex' => 'Hanya alfabet yang diperbolehkan !',
            'nama_jenjang_post.unique' => 'Jenjang sudah ada'
        ]);
        $val['nama_jenjang'] = strtolower($val['nama_jenjang_post']);
        $edulvl = Edu::create($val);

        return redirect(route('edulevels'))->with('success','Jenjang yang dibuat: '.strtoupper($edulvl->nama_jenjang));
    }

    public function put(Request $request)
    {
        $decryptedId = decrypt($request->id_jenjang);
        $val = $request->validate([
            'nama_jenjang_edit' => "required|unique:education_levels,nama_jenjang,$decryptedId,id|max:5|regex:/^[a-zA-Z]+$/"
        ],[
            'nama_jenjang_edit.unique' => strtoupper($request->nama_jenjang_edit).' sudah ada !',
            'nama_jenjang_edit.required' => 'Bidang ini harus diisi !',
            'nama_jenjang_edit.max' => 'Batas maksimal kata adalah 5 kata',
            'nama_jenjang_edit.regex' => 'Hanya alfabet yang diperbolehkan !',
        ]);
        $edulvl = Edu::find($decryptedId);
        if ($val['nama_jenjang_edit'] === $edulvl->nama_jenjang) {
            return redirect()->back()->withErrors(['nama_jenjang_edit' => 'Tidak ada data yang diubah !']);
        }
        $before = $edulvl->nama_jenjang;
        $edulvl->update($val);

        return redirect(route('edulevels'))->with('success','Data yang diubah: '.strtoupper($before).' menjadi '.strtoupper($edulvl->nama_jenjang));
    }

    public function destroy(Request $request)
    {
        // return dd($request);
        $edulvl = Edu::find(base64_decode($request->id));
        $creators = Teacher::where('education_level_id',$edulvl->education_level_id)->get();

        foreach ($creators as $key => $creator) {
            $contents = Content::where('teacher_id',$creator->teacher_id)->get();
            $user = User::find($creator->user_id);
            foreach ($contents as $key => $content) {
                if (Storage::exists($content->gambar)) {
                    Storage::delete($content->gambar);
                }
                $content->delete();
            }
            if (Storage::exists($user->foto)) {
                Storage::delete($user->foto);
            }
            $creator->delete();
            $user->delete();
        }
        $edulvl->delete();
        return redirect(route('edulevels'))->with('success','Berhasil menghapus '.strtoupper($edulvl->nama_jenjang));
    }
}
