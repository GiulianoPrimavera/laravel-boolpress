@extends('layouts.app')


@section('content')
<div class="container">
    
    @if(session("msg"))
        <div class="alert alert-success">{{session("msg")}}</div>
    @endif

    <div class="row justify-content-center">
        
        <div class="text-center">
            <a href="{{ route("admin.posts.create") }}" class="btn btn-success my-3">Crea nuovo post</a>

            <ul class="list-group">
                @foreach ($postsData as $singlePost)
                    <li class="list-group-item text-left"><a href="{{ route("admin.posts.show", $singlePost->id) }}">{{ $singlePost->title }}</a><br>  {{ $singlePost->content }}</li>
                @endforeach
            </ul>

            <a href="{{ route("admin.home") }}" class="btn btn-primary mt-5">torna alla home</a>
        </div>
        
    </div>
</div>
@endsection