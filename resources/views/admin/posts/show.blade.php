@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div>
            <h2>{{ $post->title }}</h2>

            <p>{{ $post->content }}</p>

            <a href="{{ route("admin.posts.index") }}" class="btn btn-primary mt-5">torna alla sezione dei posts</a>
        </div>
        
    </div>
</div>
@endsection