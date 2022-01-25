@extends('layouts.app')


@section('content')
<div class="container">
    
    @if(session("msg"))
        <div class="alert alert-success">{{session("msg")}}</div>
    @endif
    
    <div class="card justify-content-center">
        <div class="text-center">
            @if (count($postsData) === 0)
            <a href="{{ route("admin.posts.create") }}" class="btn btn-success my-3 text-white">Crea nuovo post</a>
            <h3>Non ci sono post al momento</h3>
            @else
            <a href="{{ route("admin.posts.create") }}" class="btn btn-success my-3 text-white">Crea nuovo post</a>

            <ul class="list-group">
                @foreach ($postsData as $singlePost)
                <li class="list-group-item text-left"><a href="{{ route("admin.posts.show", $singlePost->id) }}">{{ $singlePost->title }}</a>
                    <br> {{ $singlePost->content }}
                    <br> <p class="small">{{ $singlePost->category->name }}</p>
                    <br> <p class="small">creato da {{ $singlePost->user->name }}</p>
                </li>
                @endforeach
            </ul>

        </div>
        
    </div>
    @endif
    <a href="{{ route("admin.home") }}" class="btn btn-primary mt-5 text-white">torna alla home</a>
</div>
@endsection