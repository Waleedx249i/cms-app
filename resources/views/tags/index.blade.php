@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">


            <div class="col-md-6">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('sucsses'))
                    <div class="alert alert-success" role="alert">
                        {{ session('sucsses') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header" style="display: flex;align-content:center;justify-content: space-between">
                        <h1>tags</h1> <span> <a href="{{ route('tag.create') }}" class="btn btn-primary">new
                                tag</a></span>
                    </div>

                    <div class="card-body">

                        <div class="list-group">


                            @foreach ($tags as $tag)
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 style="width: 50%" class="mb-1">{{ $tag->name }}</h5>
                                        <small><a class="btn btn-primary "href="{{ route('tag.edit', $tag) }}"
                                                role="button">EDIT</a></small>
                                        <small>
                                            <form method="POST" action="{{ route('tag.destroy', $tag) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">delete</button>
                                            </form>
                                        </small>

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
