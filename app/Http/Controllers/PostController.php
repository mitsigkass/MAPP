<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\PostUpdateRequest;


class PostController extends Controller
{
    /**
     * Display all posts.
     */
    public function index(): View
    {   
        $posts = Post::paginate(10);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

      /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }


     /**
     * Update the post's status.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
      
        $post->update($request->validated());
        return redirect()->route('posts.index');
    }
     
}
