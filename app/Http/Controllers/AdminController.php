<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $dashboard = 'dashboard';
    public function index()
    {
        return view('UI.pages.admin.homepage', [
            'title' => $this->dashboard,
            'navigation' => [$this->dashboard,'petunjuk umum']
        ]);
    }
}
