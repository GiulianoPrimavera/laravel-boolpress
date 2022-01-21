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

        <form action="{{ route("admin.posts.store") }}" method="post">
            @csrf

            <div class="form-group">
                <label for="title">Inserisci il titolo del post</label>
                <input type="text" id="title" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label for="content">Inserisci il contenuto del post</label>
                <input type="text" id="content" class="form-control" name="content">
            </div>

            <div class="form-group">
                <label for="category">Categoria</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-check">
                @foreach ($tags as $tag)    
                <input class="form-check-input" type="checkbox" name="tags[]" id="tag" value="{{ $tag->id }}">
                <label class="form-check-label" for="tag">
                    {{ $tag->name }}
                </label>
                <br>
                @endforeach
            </div>
            
            <button class="btn btn-success mt-4" type="submit">Crea</button>
        </form>

    </div>
@endsection