<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Validator;

class ContentController extends Controller
{
    public $title = 'konten';

    public $thePath;

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
        $this->thePath = "foto_konten";
    }
    public function index()
    {
        $contents = Content::with('teacher')->get();

        return view('UI.pages.admin.content', [
            'title' => $this->title,
            'navigation' => [$this->title,'Data konten'],
            'contents' => $contents
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

        $input_data = $val->getData();
        $input_data['gambar_post'] = $request->file('gambar_post')->store($this->thePath);
        $content_codes = Content::with(['teacher'])->get('kode_qr');
        $qr_code = Str::random(13);
        $percobaan = 0;

        if ($content_codes->count() < 1) {
            $qr_code = Str::random(13);
        } else {
            foreach ($content_codes as $key => $content_code) {
                if ($qr_code === $content_code) {
                    $qr_code = Str::random(13);
                    $percobaan++;
                }
            }
        }

        $content_data = [
            'teacher_id' => 1,
            'kode_qr' => $qr_code,
            'judul' => $input_data['judul_post'],
            'isi_konten' => $input_data['isi_konten_post'],
            'gambar' => $input_data['gambar_post'],
        ];

        $content = Content::create($content_data);

        return redirect(route('contents'))->with('success','Konten berhasil dibuat');
    }

    public function destroy(Request $request)
    {
        $decodedId = base64_decode($request->id_delete);
        $content = Content::find($decodedId);
        if (Storage::exists($content->gambar)) {
            Storage::delete($content->gambar);
        }
        $content->delete();

        return redirect(route('contents'))->with('success','Konten berhasil dihapus');
    }

    public function put(Request $request)
    {
        $val = Validator::make($request->all(), [
            'judul_edit' => 'required|max:35',
            'isi_konten_edit' => 'required',
            'gambar_edit' => 'required|image|max:5120|mimes:png'
        ],[
            'judul_edit.required' => 'Judul wajib diisi !',
            'judul_edit.max' => 'Batas maksimal karakter tercapai',
            'isi_konten_edit' => 'Isi konten wajib diisi',
            'gambar_edit.image' => 'File harus berupa gambar',
            'gambar_edit.max' => 'Batas maksimal ukuran gambar adalah 5mb',
            'gambar_edit.mimes' => 'File harus bertipe PNG'
        ]);

        if ($val->fails()) {
            return redirect()->back()->withErrors($val)->withInput();
        }

        foreach ($this->dangerous_tags as $key => $tag) {
            if (strpos($request->isi_konten_edit, $key) !== false) {
                $val->errors()->add('isi_konten_edit','Input anda mengandung tag yang berbahaya : '.$tag);
                return redirect()->back()->withErrors($val)->withInput();
            }
        }

        $input_data = $val->getData();
        $content = Content::findOrFail(base64_decode($request->update_id));

        $img = "";
        if ($request->file('gambar_edit')) {
            if (Storage::exists($content->gambar)) {
                Storage::delete($content->gambar);
            }

            $img = $request->file('gambar_edit')->store('foto_konten');
        } else {
            $img = $content->gambar;
        }

        $content_data = [
            'judul' => $input_data['judul_edit'],
            'gambar' => $img,
            'isi_konten' => $input_data['isi_konten_edit']
        ];

        $content->update($content_data);

        return redirect(route('contents'))->with('success','Konten berhasil diedit');
    }
}
