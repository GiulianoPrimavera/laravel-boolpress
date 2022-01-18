@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div>
            <ul class="list-group">
                @foreach ($postsData as $singlePost)
                    <li class="list-group-item"><a href="{{ route("admin.posts.show", $singlePost->id) }}">{{ $singlePost->title }}</a><br>  {{ $singlePost->content }}</li>
                @endforeach
            </ul>

            <a href="{{ route("admin.home") }}" class="btn btn-primary mt-5">torna alla home</a>
        </div>
        
    </div>
</div>
@endsection