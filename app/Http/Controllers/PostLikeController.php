<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostLikeController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $post->likes()->create(
            [
                'user_id' => $request->user()->id,
            ]
        );

        return back();
    }
}
