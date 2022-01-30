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
    private function getSlug($string){
        $slug = Str::slug($string);
        // $postData = Post::all();
        
        //cerco nei post un post dove lo "slug" è uguale allo $slug appena generato
        $doubleSlug = Post::where("slug", $slug)->first();
        $counter = 1;

        //se è statp trovato uno "slug" doppione entra in questo ciclo
        while($doubleSlug){
            //modifica lo $slug appena generato in uno "slug" diverso  
            $newSlug = $slug . "-" . $counter;

            //dopo che ho generato il nuovo "slug", cerco se ce ne è uno uguale nel database 
            $doubleSlug = Post::where("slug", $newSlug)->first();

            $counter++;
            //se non esiste uno "slug" doppione allora
            if(!$doubleSlug){
                $slug = $newSlug;
            }
        }
        //se non esiste uno "slug" doppione pusho lo $slug appena generato 
        return $slug;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsData = Post::orderBy("updated_at", "desc")->paginate(2);

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
            "content" => "required|min:5",
            "tags" => "required"
        ]);
        
        $data = $request->all();

        //questo funziona
        // $slug = Str::slug($data["title"]);

        $newPost = new Post();

        $newPost->fill($data);
        $newPost->user_id = Auth::user()->id;
        $newPost->category_id = $data["category_id"];
        $newPost->slug = $this->getSlug($newPost["title"]);
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
    public function show($slug)
    {
        $post = Post::where("slug", $slug)->first();

        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where("slug", $slug)->first();

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
    public function update(Request $request, $slug)
    {
        $post = Post::where("slug", $slug)->first();
        /* dump($post);
        exit; */
        
        $request->validate([
            "title" => "required|min:5",
            "content" => "required|min:5"
        ]);

        $updatedData = $request->all();

        $post->update($updatedData);
        $post->category_id = $updatedData["category_id"];
        $post->tags()->sync($updatedData["tags"]);
        $post->slug = $this->getSlug($updatedData["title"]);
        $post->save();

        return redirect()->route("admin.posts.index")->with("msg", "post modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where("slug", $slug)->first();

        $post->delete();

        return redirect()->route("admin.posts.index");
    }
}
