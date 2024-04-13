<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->whereBelongsTo(Auth::user())->paginate(10);

        return view('dashboard.blog.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $data = $request->validated();
        if($request->validated('cover')){
            /** @var UploadedFile $cover */
            $image = $request->validated('cover');
            $data['cover'] = $image->store('blog/cover', 'public');
        }
        $data['user_id'] = Auth::user()->id; // ajouter la cle user_id
        $post = Post::create($data);

        return redirect()->route('dashboard.posts.index')->with('success', 'post created');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.blog.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        if($image = $request->validated('cover')){
            $data['cover'] = $image->store('blog/cover', 'public');
        }
        $post->update($data);
        return redirect()->route('dashboard.posts.index')->with('success', 'post updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard.posts.index')->with('success', 'post deleted');
    }
}
