@extends('layouts.app')

@section('content')
    <div class="container">
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

            <button class="btn btn-success" type="submit">Crea</button>
        </form>

    </div>
@endsection