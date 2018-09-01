<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function profile()
    {
        return view('profile');
    }

    public function social()
    {
        return view('social');
    }

    public function new_post()
    {
        return view('new_post');
    }

    public function post()
    {
        return view('post');
    }
}
