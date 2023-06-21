@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card" style="">
                    <div class="card-header" style="display: flex;align-content:center;justify-content: space-between">
                        <h1>posts</h1>
                        <p><a href="{{ route('post.create') }}" class="btn btn-primary">new
                                post</a></p>
                    </div>

                    <div class="card-body">

                        <div class="list-group">


                            @foreach ($posts as $post)
                                <div class="card" style="">
                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                        style=alt="{{ $post->discription }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->name }}</h5>
                                        <p class="card-text">{{ $post->discription }}</p>
                                    </div>
                                    <div class="card-body" style="display:flex" style="justify-content: space-around">
                                        <span class="card-link" style="display: inline"><a
                                                style="text-decoration: none;color:white"
                                                class="btn btn-success "href="{{ route('post.show', $post) }}"
                                                role="button">show</a></span>
                                        @if ($post->trashed())
                                            <span class="card-link" style="display: inline">
                                                <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">delete</button>
                                                </form>
                                            </span>
                                            <span class="card-link" style="display: inline"><a
                                                    style="text-decoration: none;color:white"
                                                    class="btn btn-info "href="{{ route('trashed.restore', $post->id) }}"
                                                    role="button">restore</a></span>
                                        @else
                                            <span class="card-link" style="display: inline"><a
                                                    style="text-decoration: none;color:white"
                                                    class="btn btn-info "href="{{ route('post.edit', $post) }}"
                                                    role="button">edit</a></span>


                                            <span class="card-link" style="display: inline">
                                                <form method="POST" action="{{ route('post.destroy', $post) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">trashed</button>
                                                </form>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
