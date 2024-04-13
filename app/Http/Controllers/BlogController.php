<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('user');
        if($title = $request->query('q')){
            $query->where('title', 'like', '%'.$title.'%');
        }

        $posts = $query->paginate(10);

        return view('blog.index', ['posts' => $posts]);
    }

    public function show(Request $request, string $slug, Post $post){

        if($post->slug != $slug){
           return  redirect()->route('blog.show', ['post' => $post->id, 'slug' => $post->slug]);
        }

        return view('blog.single', ['post' => $post ]);
    }
}
