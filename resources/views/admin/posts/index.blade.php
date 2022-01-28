@extends('layouts.app')


@section('content')
<div class="container">
    
    @if(session("msg"))
        <div class="alert alert-success">{{session("msg")}}</div>
    @endif
    
    <div class="container justify-content-center">
        @if (count($postsData) === 0)
        <a href="{{ route("admin.posts.create") }}" class="btn btn-success my-3 text-white">Crea nuovo post</a>
        <h3>Non ci sono post al momento</h3>
        @else
        <a href="{{ route("admin.posts.create") }}" class="btn btn-success my-3 text-white">Crea nuovo post</a>
        <div class="row">

            <ul class="list-group">
                @foreach ($postsData as $singlePost)
                {{-- @dump($singlePost->slug) --}}
                <li class="list-group-item text-left"><a href="{{ route("admin.posts.show", $singlePost->id) }}">{{ $singlePost->title }}</a>
                    <br> <p>{{ $singlePost->content }}</p>
                    <p class="small m-0">{{ $singlePost->category->name }}</p>
                    <p class="small m-0">{{ $singlePost->created_at->format("d/m/y H:i") }}</p>
                    <p class="small m-0">creato da {{ $singlePost->user->name }}</p>
                </li>
                @endforeach
            </ul>

        </div>
        
    </div>
    @endif
    <a href="{{ route("admin.home") }}" class="btn btn-primary mt-5 text-white">torna alla home</a>
</div>
@endsection