<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){

        $allPosts = Post::with("category")->with("user")->with("tags")->get();
        // $categories = Category::all();
        // return (["allPosts" => $allPosts, "categories" => $categories]);
        // return ($allPosts);

        return response()->json($allPosts);
    }

    public function show(Post $post){
        $singlePostData = Post::where("id", $post->id)->get();
        
        return response()->json($singlePostData);
    }
}
