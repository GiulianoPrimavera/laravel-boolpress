@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <span>Click to see the posts</span>

                    <a href="{{ route("admin.posts.index") }}" class="btn btn-primary">Posts</a>
                </div>
                <br>
            </div>
            <a href="{{ url("guests/home") }}" class="btn btn-primary mt-5">vai alla sezione guests</a>
        </div>
    </div>
</div>
@endsection