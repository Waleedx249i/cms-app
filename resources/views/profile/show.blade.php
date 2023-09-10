<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>{{ $profile->user->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="{{ asset('css/profile/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <style>

    </style>

    <header>
        <div style="display: inline-flex">
            <a style="text-decoration: none" href="{{ URL::previous() }}"><i
                    style=" text-decoration: none;margin-left: 10px" class="fas fa-close fa-3x  "></i></a>
        </div>




        <div class="container">


            <div class="profile">

                <div class="profile-image">


                    <img src="{{ asset('storage/' . $profile->image) }}" alt="">

                </div>

                <div class="profile-user-settings">

                    <h1 class="profile-user-name">{{ $profile->user->name }}</h1>
                    <div class="profile-edit-btn">
                        @if (Auth::user()->id == $profile->id)
                            <a href="{{ route('profile.edit', $profile) }}"><i class="fas fa-edit fa-sm  "></i></a>
                        @endif
                    </div>
                    <div class="profile-edit-btn">
                        <p>{{ $profile->about }}</p>

                    </div>




                </div>




                <div class="profile-bio">


                    <div class="social-media">
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                        </span>

                    </div>

                </div>


            </div>
            <!-- End of profile section -->

        </div>
        <!-- End of container -->

    </header>

    <main>
        <div class="wrapper">
            @foreach ($posts as $post)
                <div width="60px" class="card">
                    <div class="poster"><img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}">
                    </div>
                    <div class="details">
                        <h1>{{ $post->name }}</h1>
                        <h2>{{ $post->created_at }}</h2>
                        <div class="rating">
                            <a style="text-decoration: none;color:#77ffe0e0" href="{{ route('viwopost', $post) }}"
                                style="background-color: rgba(128, 255, 0, 0)">see more ...</a>
                        </div>
                        <div class="tags">

                            @foreach ($post->tags as $tag)
                                <span class="tag">{{ $tag->name }}</span>
                            @endforeach

                        </div>
                        <p class="desc">
                            {{ $post->discription }}
                        </p>
                        <div class="cast">
                            <h3>Auth</h3>
                            <ul>

                                <li><a href="{{ route('profile.show', $post->user->id) }}"><img
                                            src="{{ asset('storage/' . $post->user->profile->image) }}"
                                            alt="post auther" title="{{ $post->user->name }}"></a></li>
                                <h2>{{ $post->user->name }}</h2>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container">







        </div>
        <!-- End of gallery -->


        <!-- End of container -->

    </main>
    <!-- partial -->
    <script></script>

</body>

</html>
