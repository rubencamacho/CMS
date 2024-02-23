<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $posts = Post::all();
        return view('home', compact('posts'));
    }

    function view($slug) {
        $post = Post::where('slug', $slug)->first();
        return view('view', compact('post'));
    }
}
