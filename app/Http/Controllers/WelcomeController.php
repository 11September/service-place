<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->with('user')->paginate(20);

        return view('index', compact('posts'));
    }

    public function post($id = null)
    {
        $post = Post::with('user')->whereId($id)->first();

        return view('post', compact('post'));
    }

    public function search(Request $request)
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
}
