@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div>
            <h2>{{ $post->title }}</h2>

            <p>{{ $post->content }}</p>

            <p>{{ $post->category->name }}</p>

            <div classs="my-5">
                <a href="{{ route("admin.posts.edit", $post->id) }}" class="btn btn-success my-2">modifica post</a><br>
                <form action="{{ route("admin.posts.destroy", $post->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger my-2">elimina post</button>
                </form>
                <a href="{{ route("admin.posts.index") }}" class="btn btn-primary my-2">torna alla sezione dei posts</a><br>
            </div>
        </div>
        
    </div>
</div>
@endsection