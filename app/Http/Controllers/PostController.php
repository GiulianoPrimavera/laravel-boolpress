<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index(){

        $allPosts = Post::all();
        
        return $allPosts;
    }
}
