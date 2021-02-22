<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\PostController;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2); //creara una coleccion de todos los posts que estan almacenados en el sitio

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }
}
