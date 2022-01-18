@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route("admin.posts.update", $post->id) }}" method="post">
        @csrf

        @method("PUT")
        <div class="form-group">
            <label for="title">Inserisci il nuovo titolo del post</label>
            <input type="text" id="title" class="form-control" name="title" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="content">Inserisci il nuovo contenuto del post</label>
            <input type="text" id="content" class="form-control" name="content" value="{{ $post->content }}">
        </div>

        <button class="btn btn-success" type="submit">Modifica</button>
    </form>

</div>
@endsection