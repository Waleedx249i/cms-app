@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Categorys</h1> <span> <a href="{{ route('category.create') }}" class="btn btn-primary">new
                                Category</a></span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="list-group">


                            @foreach ($categories as $category)
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $category->name }}</h5>
                                        <small><a class="btn btn-primary "href="{{ route('category.edit', $category->id) }}"
                                                role="button">EDIT</a></small>
                                        <small>
                                            <form method="POST" action="{{ route('category.destroy', $category) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sucsess" type="submit">delete</button>
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
