<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationLevel as Edu;

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
            'nama_jenjang' => 'required|max:5|regex:/^[a-zA-Z]+$/|unique:education_levels,nama_jenjang'
        ], [
            'nama_jenjang.required' => 'Bidang ini harus diisi !',
            'nama_jenjang.max' => 'Batas maksimal kata adalah 5 kata',
            'nama_jenjang.regex' => 'Hanya alfabet yang diperbolehkan !',
            'nama_jenjang.unique' => 'Jenjang sudah ada'
        ]);
        $val['nama_jenjang'] = strtolower($val['nama_jenjang']);
        $edulvl = Edu::create($val);

        return redirect(route('edulevels'))->with('success','Jenjang yang dibuat: '.strtoupper($edulvl->nama_jenjang));
    }

    public function destroy($id)
    {
        $edulvl = Edu::find(base64_decode($id));
        $edulvl->delete();
        return redirect(route('edulevels'))->with('success','Berhasil menghapus '.strtoupper($edulvl->nama_jenjang));
    }
}
