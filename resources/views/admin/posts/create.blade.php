@extends('layouts.app')

@section('content')
    <div class="container">

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

            <button class="btn btn-success" type="submit">Crea</button>
        </form>

    </div>
@endsection