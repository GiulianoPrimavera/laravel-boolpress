@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route("admin.posts.update", $post->slug) }}" method="post" enctype="multipart/form-data">
        @csrf

        @method("PUT")
        {{-- TITOLO --}}
        <div class="form-group">
            <label for="title">Inserisci il nuovo titolo del post</label>
            <input type="text" id="title" class="form-control" name="title" value="{{ $post->title }}">
        </div>

        {{-- IMMAGINE --}}
        <div class="form-group">
            <label for="content">Inserisci un'immagine</label>
            <input type="file" id="content" class="form-control" name="coverImg">
        </div>

        {{-- CONTENUTO --}}
        <div class="form-group">
            <label for="content">Inserisci il nuovo contenuto del post</label>
            <input type="text" id="content" class="form-control" name="content" value="{{ $post->content }}">
        </div>

        {{-- CATEGORIA --}}
        <div class="form-group">
            <label for="category">Categoria</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id === $this_post_category ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- TAGS --}}
        <p class="mb-0">Aggiungi un tag</p>
        <p class="small mb-0">devi aggiungere almeno un tag</p>
        <div class="form-check">
            @foreach ($tags as $tag)    
            <input class="form-check-input" 
            type="checkbox" 
            name="tags[]" 
            id="tag" 
            value="{{ $tag->id }}"  
            @if ($post->tags->contains($tag)) checked @endif
            >
            <label class="form-check-label" for="tag" checked>
                {{ $tag->name }}
            </label>
            <br>
            @endforeach
        </div>

        <button class="btn btn-success text-white" type="submit">Modifica</button>
    </form>
    <a href="{{ route("admin.posts.show", $post->slug) }}" class="btn btn-primary text-white my-3">torna al post</a>

</div>
@endsection