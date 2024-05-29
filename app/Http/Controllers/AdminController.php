<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $dashboard = 'dashboard';
    public $content = 'konten';
    public function index()
    {
        return view('UI.pages.admin.homepage', [
            'title' => $this->dashboard,
            'navigation' => [$this->dashboard, 'petunjuk umum']
        ]);
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
}
