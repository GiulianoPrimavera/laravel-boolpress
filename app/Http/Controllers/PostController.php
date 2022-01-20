<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index(){

        $allPosts = Post::all();
        $categories = Category::all();
        return (["allPosts" => $allPosts, "categories" => $categories]);
    }
}
