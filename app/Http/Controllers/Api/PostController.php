<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){

        $allPosts = Post::with("category")->with("user")->with("tags")->paginate(2);
        // $categories = Category::all();
        // return (["allPosts" => $allPosts, "categories" => $categories]);
        // return ($allPosts);

        $allCategories = Category::all();

        /* dump($allPosts);
        exit; */

        // sleep(2);
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
