<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ContentController extends Controller
{
    public $title = 'konten';

    public $dangerous_tags;

    public function __construct() {
        $this->dangerous_tags = [
            '&lt;/script&gt;' => '</script>',
            '&lt;/iframe&gt;' => '</iframe>',
            '&lt;/object&gt;' => '</object>',
            '&lt;/embed&gt;' => '</embed>',
            '&lt;/applet&gt;' => '</applet>',
            '&lt;/link&gt;' => '</link>',
            '&lt;/style&gt;' => '</style>',
            '&lt;/meta&gt;' => '</meta>',
            '&lt;/img&gt;' => '</img>',
            '&lt;/form&gt;' => '</form>',
            '</script>' => '</script>',
            '</iframe>' => '</iframe>',
            '</object>' => '</object>',
            '</embed>' => '</embed>',
            '</applet>' => '</applet>',
            '</link>' => '</link>',
            '</style>' => '</style>',
            '</meta>' => '</meta>',
            '</img>' => '</img>',
            '</form>' => '</form>',
        ];
    }
    public function index()
    {
        return view('UI.pages.admin.content', [
            'title' => $this->title,
            'navigation' => [$this->title,'Data konten']
        ]);
    }

    public function store(Request $request)
    {
        $val = Validator::make($request->all(),[
            'judul_post' => 'required|max:35',
            'gambar_post' => 'required|image|max:5120|mimes:png',
            'isi_konten_post' => 'required'
        ], [
            'judul_post.required' => 'Judul wajib diisi !',
            'judul_post.max' => 'Batas maksimal karakter tercapai',
            'isi_konten_post' => 'Isi konten wajib diisi',
            'gambar_post.required' => 'Gambar wajib diisi',
            'gambar_post.max' => 'Batas maksimal ukuran gambar adalah 5mb'
        ]);

        if ($val->fails()) {
            return redirect()->back()->withErrors($val)->withInput();
        }
        foreach ($this->dangerous_tags as $key => $tag) {
            if (strpos($request->isi_konten_post, $key) !== false) {
                $val->errors()->add('isi_konten_post','Input anda mengandung tag yang berbahaya : '.$tag);
                return redirect()->back()->withErrors($val)->withInput();
            }
        }
        return dd($request);
    }
}
