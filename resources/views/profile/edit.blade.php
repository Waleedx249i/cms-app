<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', $profile->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="input-group mb-2">
                                @if (isset($profile->image))
                                    <img width="100" height="100" src="{{ asset('storage/' . $profile->image) }}"
                                        alt="">
                                @endif
                                <input name="image" type="file" class="form-control">



                            </div>

                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea id="about" class="form-control" name="about" rows="4">{{ $profile->about }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input id="facebook" type="text" class="form-control" name="facebook"
                                    value="{{ $profile->facebook }}">
                            </div>
                            <div class="form-group">
                                <label for="insta">Instagram</label>
                                <input id="insta" type="text" class="form-control" name="insta"
                                    value="{{ $profile->insta }}">
                            </div>

                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input id="twitter" type="text" class="form-control" name="twitter"
                                    value="{{ $profile->twitter }}">
                            </div>
                            <div class="mt-5" style="text-align: center">
                                <button type="submit" class="btn btn-primary">Update
                                    Profile</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
