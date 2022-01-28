<?php

namespace App\Http\Controllers\Api;

use App\Category;
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

        $allCategories = Category::all();

        return response()->json([
            "allPosts" => $allPosts,
            "allCategories" => $allCategories
        ]);
    }

    public function show($id){
        $singlePostData = Post::where("id", $id)->with("category")->with("tags")->first();
        
        return response()->json($singlePostData);
    }
}
