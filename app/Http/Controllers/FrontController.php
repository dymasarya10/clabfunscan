<?php

namespace App\Http\Controllers;

use App\Models\Content;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $contents = Content::with(['teacher','teacher.user','teacher.education_level'])->get();
        return view('UI.pages.front.homepage',[
            'contents' => $contents
        ]);
    }

}
