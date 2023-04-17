@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">posts</div>

                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="formGroupExampleInput" class="form-label">category name</label>
                                <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                                    placeholder="Example input placeholder">
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
