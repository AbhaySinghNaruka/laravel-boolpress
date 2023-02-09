<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();

        return response()->json([
            'success' => true,
            'results' => $posts,
        ]);
    }
    public function show(Post $post)
    {

        $post = Post::where('id', $post->id)->with(['category', 'tags'])->first();

        return response()->json([
            'success' => true,
            'results' => $post,
        ]);
    }

    public function random()
    {
        $posts = Post::inRandomOrder()->limit(9)->get();

        return response()->json([
            'success' => true,
            'results' => $posts,
        ]);
    }

    // public function everything() {
    //     $posts = Post::all();
    //     $categories = Category::all();
    //     return response()->json([
    //         'posts' => $posts,
    //         'categories'=> $categories,
    //     ]);
    // }
}
