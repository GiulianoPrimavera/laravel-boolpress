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

        <div class="form-group">
            <label for="category">Categoria</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success" type="submit">Modifica</button>
    </form>

</div>
@endsection