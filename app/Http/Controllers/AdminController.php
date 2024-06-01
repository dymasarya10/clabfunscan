<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public $creator = 'creator';
    public $edulevel = 'jenjang';
    public $content = 'konten';
    public $dangerous_tags;

    public function __construct()
    {
        $this->dangerous_tags = [
            '&lt;/script&gt;',
            '&lt;/iframe&gt;',
            '&lt;/object&gt;',
            '&lt;/embed&gt;',
            '&lt;/applet&gt;',
            '&lt;/link&gt;',
            '&lt;/style&gt;',
            '&lt;/meta&gt;',
            '&lt;/img&gt;',
            '&lt;/form&gt;',
            '</script>',
            '</iframe>',
            '</object>',
            '</embed>',
            '</applet>',
            '</link>',
            '</style>',
            '</meta>',
            '</img>',
            '</form>',
        ];
    }

    public function index()
    {
        $users = [];
        for ($i = 0; $i < 2; $i++) {
            $users[] = [
                'name' => fake()->name,
                'email' => fake()->email,
                'address' => fake()->address,
                'nisn' => fake()->randomNumber(9, true),
                'date' => fake()->date('Y/m/d'),
            ];
        }
        return view('UI.pages.admin.homepage', [
            'title' => $this->creator,
            'navigation' => [$this->creator, 'data creator'],
            'users' => $users
        ]);
    }

    public function eduLevel()
    {
        $users = [];
        for ($i = 0; $i < 2; $i++) {
            $users[] = [
                'name' => fake()->name,
                'email' => fake()->email,
                'address' => fake()->address,
                'nisn' => fake()->randomNumber(9, true),
                'date' => fake()->date('Y/m/d'),
            ];
        }

    }

    public function allContent()
    {
        $users = [];
        for ($i = 0; $i < 2; $i++) {
            $users[] = [
                'name' => fake()->name,
                'email' => fake()->email,
                'address' => fake()->address,
                'nisn' => fake()->randomNumber(9, true),
                'date' => fake()->date('Y/m/d'),
            ];
        }

        return view('UI.pages.admin.all-contents', [
            'title' => $this->content,
            'navigation' => [$this->content],
            'users' => $users
        ]);
    }

    public function createContent()
    {
        return view('UI.pages.admin.create-content', [
            'title' => $this->content,
            'navigation' => [$this->content, 'buat konten']
        ]);
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'judul' => 'required|max:35',
            'isi_konten' => 'required',
            'gambar' => 'required|image|max:3072'
        ], [
            'judul.required' => 'Judul wajib diisi !',
            'judul.max' => 'Batas maksimal karakter tercapai',
            'isi_konten' => 'Isi konten wajib diisi',
            'gambar.required' => 'Gambar wajib diisi',
            'gambar.max' => 'Batas maksimal ukuran gambar adalah 3mb'
        ]);
        foreach ($this->dangerous_tags as $key => $tag) {
            if (strpos($request->isi_konten, $tag) !== false) {
                return redirect()->back()->with('failtocreate', 'Input anda mengandung tag berbahaya');
            }
        }
        // Buat logic agar kode_qr bisa beda.


        $val['kode_qr'] = Str::random(13);
        // $val['teacher_id'] = Auth::user()->id;
        $content = Content::create($val);

        return dd($request);
    }
}
