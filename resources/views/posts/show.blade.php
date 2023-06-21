@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="">

            <div class="card-body">
                <h5 class="card-title">{{ $post->name }}</h5>

            </div>
            <div class="card-body" style="display:flex" style="justify-content: space-around">
                <span class="card-link" style="display: inline"><a style="text-decoration: none;color:white"
                        class="btn btn-primary "href="{{ route('post.index') }}" role="button">back</a></span>
                <span class="card-link" style="display: inline"><a style="text-decoration: none;color:white"
                        class="btn btn-info "href="{{ route('post.edit', $post->id) }}" role="button">edit</a></span>

                <span class="card-link" style="display: inline">
                    <form method="POST" action="{{ route('post.destroy', $post) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                </span>
            </div>
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">{{ $post->discription }}</p>
                <p class="card-text">{{ $post->content }}</p>
            </div>
        </div>
    </div>
@endsection
