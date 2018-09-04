<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function user($id = null)
    {
        $user = User::findOrFail($id)->with('social', 'posts')->first();

        return view('user', compact('user'));
    }

    public function profile()
    {
        $user = User::where('id', Auth::id())->with('social', 'posts')->first();

        return view('profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('editProfile', compact('user'));
    }

    public function updateProfile(User $user, Request $request)
    {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')){
            $profileImage = $request->file('avatar');
            $profileImageSaveAsName = time() . "-profile." . $request->file('avatar')->getClientOriginalExtension();

            $upload_path = 'storage/users/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);

            $user->avatar = $profile_image_url;
        }

        $user->name = request('name');
        $user->lastName = request('lastName');
//        $user->password = bcrypt(request('password'));

        $user->save();

        return redirect()->to('/profile');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
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
