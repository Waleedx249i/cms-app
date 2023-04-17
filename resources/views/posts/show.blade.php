@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="jumbotron">
                    <h1 class="display-1">{{ $post->name }}</h1>
                    <hr class="my-2">
                    <p>{{ $post->discription }}</p>
                    <p class="lead">
                        {{ $post->content }}
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
