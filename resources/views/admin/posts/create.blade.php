@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- show errors --}}
        <div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}<br>
                    </div>
                @endforeach
            @endif 
            
        </div>

        <form action="{{ route("admin.posts.store") }}" method="post"  enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Inserisci il titolo del post</label>
                <input type="text" id="title" class="form-control" name="title" value="{{ old("title") }}">
            </div>

            <div class="form-group">
                <label for="content">Inserisci il contenuto del post</label>
                <input type="text" id="content" class="form-control" name="content" value="{{ old("content") }}">
            </div>

            {{-- IMMAGINE --}}
            <div class="form-group">
                <label for="content">Inserisci un'immagine</label>
                <input type="file" id="content" class="form-control" name="coverImg">
            </div>


            <div class="form-group">
                <label for="category">Categoria</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <p class="mb-0">Aggiungi un tag</p>
            <p class="small mb-0">devi aggiungere almeno un tag</p>
            <div class="form-check">
                @foreach ($tags as $tag)    
                <input class="form-check-input" type="checkbox" name="tags[]" id="tag" value="{{ $tag->id }}">
                <label class="form-check-label" for="tag">
                    {{ $tag->name }}
                </label>
                <br>
                @endforeach
            </div>
            
            <button class="btn btn-success my-4 text-white" type="submit">Crea</button>
            <br>
            <a href="{{ route("admin.posts.index") }}" class="btn btn-primary text-white">Torna alla pagina dei post</a>
        </form>

    </div>
@endsection