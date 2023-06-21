@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        @if (isset($post))
                            updating a post
                        @else
                            create a post
                        @endif
                    </div>

                    <div class="card-body">
                        <form
                            @if (isset($post)) action="{{ route('post.update', $post) }}"  
                        @else
                        action="{{ route('post.store') }}" @endif
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($post))
                                @method('PUT')
                            @endif

                            <div class="mb-2">
                                <label for="formGroupExampleInput" class="form-label">post name</label>
                                <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                                    placeholder="Example input placeholder" value={{ isset($post) ? $post->name : '' }}>
                            </div>
                            <div class="mb-2">
                                <label for="formGroupExampleInput2" class="form-label">post discription</label>
                                <input type="text" name="discription" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Another input placeholder"
                                    value={{ isset($post) ? $post->discription : '' }}>
                            </div>
                            <div class="mb-2">
                                <label for="content"></label>
                                <textarea class="form-control" name="content" id="content" rows="5">{{ isset($post) ? $post->content : '' }}</textarea>
                            </div>
                            <div class="input-group mb-2">
                                @if (isset($post))
                                    <img style="width: 100%" src="{{ asset('storage/' . $post->image) }}" alt="">
                                @endif
                                <input name="image" type="file" class="form-control">



                            </div>

                            <div class="form-group">
                                <label for=""> category </label>
                                <select name="category_id" class="form-control" name="" id="">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""> tags </label>
                                <select name="tags[]" class="form-control" multiple>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                                    @endforeach
                                </select>
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
