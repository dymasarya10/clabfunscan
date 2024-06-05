<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public $title = 'konten';
    public function index()
    {
        return view('UI.pages.admin.content', [
            'title' => $this->title,
            'navigation' => [$this->title,'Data konten']
        ]);
    }
}
