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
                    <div class="card-header">tag</div>

                    <div class="card-body">
                        <form
                            @if (isset($tag)) action="{{ route('tag.update', $tag) }}" method="POST"
                                @else
                                action="{{ route('tag.store') }}" method="POST" @endif>
                            @if (isset($tag))
                                @method('PATCH')
                            @endif
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">tag name</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Example input placeholder" value={{ isset($tag) ? $tag->name : '' }}>
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
