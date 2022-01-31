@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div>
            <h2>{{ $post->title }}</h2>

            <img src="{{ asset('storage/' . $post->coverImg) }}" alt="{{ $post->title }}">

            <p>{{ $post->content }}</p>

            <p>{{ $post->category->name }}</p>


            @foreach($post->tags as $tag)
            <p class="badge bg-primary text-white">{{$tag->name}}</p>
            @endforeach
            {{-- @dump($post->tags) --}}

            <div classs="my-5">
                <a href="{{ route("admin.posts.edit", $post->slug) }}" class="btn btn-success my-2 text-white">modifica post</a><br>
                <form action="{{ route("admin.posts.destroy", $post->slug) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger my-2 text-white">elimina post</button>
                </form>
                <a href="{{ route("admin.posts.index") }}" class="btn btn-primary my-2 text-white">torna alla sezione dei posts</a><br>
            </div>
        </div>
        
    </div>
</div>
@endsection