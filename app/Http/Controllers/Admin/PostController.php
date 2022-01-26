<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsData = Post::all();

        return view("admin.posts.index", compact("postsData"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.posts.create", [
            "categories" => $categories,
            "tags" => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|min:5",
            "content" => "required|min:5"
        ]);
        
        $data = $request->all();

        //questo funziona
        $slug = Str::slug($data["title"]);

        $newPost = new Post();

        $newPost->fill($data);
        $newPost->user_id = Auth::user()->id;
        $newPost->category_id = $data["category_id"];
        $newPost->slug = $slug;
        $newPost->save();
        
        //attach function
        foreach ($data["tags"] as $tag) {
            $newPost->tags()->attach($tag);
        }

        //sync function
        $newPost->tags()->sync($data["tags"]);


        return redirect()->route("admin.posts.index")->with("msg", "post creato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $category_id = $post->category_id;
        $tags = Tag::all();
        return view("admin.posts.edit", [
            "post" => $post,
            "categories" => $categories,
            "this_post_category" => $category_id,
            "tags" => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => "required|min:5",
            "content" => "required|min:5"
        ]);

        $updatedData = $request->all();

        $post->update($updatedData);
        $post->category_id = $updatedData["category_id"];
        $post->tags()->sync($updatedData["tags"]);
        $post->save();

        return redirect()->route("admin.posts.show", compact("post"))->with("msg", "post modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route("admin.posts.index");
    }
}
