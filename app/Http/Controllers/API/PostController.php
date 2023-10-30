<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Post\StoreRequest;
use App\Http\Requests\API\Post\UpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
        
            $imagePath = $request->file('image')->store('images', 'public/assets/images');
            $data['image'] = $imagePath;
        }
        $post = Post::create($data);
        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image) {
                Storage::disk('public/assets/images')->delete($post->image);
            }
    
            $imagePath = $request->file('image')->store('images', 'public/assets/images');
            $data['image'] = $imagePath;
        }
        $post->update($data);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public/assets/images')->delete($post->image);
        }
        $post->delete();
        return response()->json(['message' => 'Post deleted']);
    }
}
