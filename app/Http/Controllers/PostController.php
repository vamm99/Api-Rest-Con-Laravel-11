<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use function Pest\Laravel\delete;
use function Pest\Laravel\post;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;

        $post->save();

        return response()->json([
            'message'=> 'Registrado correctamente'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;

        $post->save();

        return response()->json([
            'message'=> 'Actualizado correctamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'message'=>'Post borrado correctamente !'
        ]);
    }
}
