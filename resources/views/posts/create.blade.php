@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">posts</div>

                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <label for="formGroupExampleInput" class="form-label">post name</label>
                                <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                                    placeholder="Example input placeholder">
                            </div>
                            <div class="mb-2">
                                <label for="formGroupExampleInput2" class="form-label">post discription</label>
                                <input type="text" name="discription" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Another input placeholder">
                            </div>
                            <div class="mb-2">
                                <label for="content"></label>
                                <textarea class="form-control" name="content" id="content" rows="5"></textarea>
                            </div>
                            <div class="input-group mb-2">

                                <input name="image" type="file" class="form-control">
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
