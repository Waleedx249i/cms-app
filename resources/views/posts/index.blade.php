@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>posts</h1> <span> <a href="{{ route('post.create') }}" class="badge badge-primary">new
                                post</a></span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="list-group">


                            @foreach ($posts as $post)
                                <a href="{{ route('post.show', $post->id) }}"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $post->name }}</h5>
                                        <small><a class="btn btn-primary "href="{{ route('post.edit', $post->id) }}"
                                                role="button">EDIT</a></small>
                                        <small>
                                            <form method="POST" action="{{ route('post.destroy', $post) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sucsess" type="submit">delete</button>
                                            </form>
                                        </small>

                                    </div>
                                    <p class="mb-1">Paragraph</p>
                                    <small>paragraph footer</small>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
