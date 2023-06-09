@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">category</div>

                    <div class="card-body">
                        <form
                            @if (isset($category)) action="{{ route('category.update', $category) }}" method="POST"
                                @else
                                action="{{ route('category.store') }}" method="POST" @endif>
                            @if (isset($category))
                                @method('PATCH')
                            @endif
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">category name</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Example input placeholder"
                                    value={{ isset($category) ? $category->name : '' }}>
                            </div>

                            <div class="mb-5" style="text-align: center">
                                <button type="submit" class="btn btn-primary">submite</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
