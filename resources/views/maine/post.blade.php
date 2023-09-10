<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>


    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>blog</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
   ================================================== -->

    <link rel="stylesheet" href="{{ asset('css/home/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/css/main.css') }}">



    <!-- script
   ================================================== -->
    <script src="{{ asset('js/home/js/modernizr.js') }}"></script>

    <script src="{{ asset('js/home/js/pace.min.js') }}"></script>


    <!-- favicons
 ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">

</head>

<body>
    <header class="short-header">

        <div class="gradient-block"></div>

        <div class="row header-content">

            <div class="logo">
                <a href="{{ route('home') }}">blog</a>
            </div>

            <nav id="main-nav-wrap">
                <ul class="main-navigation sf-menu">
                    <li><a href="{{ route('home') }}" title="">Home</a></li>
                    @if (Auth::user()->role == 'admin')
                        <li><a href="{{ route('dashbord') }}" title="">Dashbord</a></li>
                    @endif
                    <li class="has-children">
                        <a title="">Categories</a>
                        <ul class="sub-menu">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('showcategory', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach


                        </ul>
                    </li>

                    <li class="has-children">
                        <a href="{{ route('profile.show', Auth::user()->id) }}" title="">profile</a>
                        <ul class="sub-menu">

                            <li><a href="{{ route('profile.edit', Auth::user()->id) }}">edit profile</a></li>
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>



                        </ul>
                    </li>


                    <li><a href="about.html" title="">About</a></li>
                    <li><a href="contact.html" title="">Contact</a></li>
                </ul>
            </nav> <!-- end main-nav-wrap -->

            <div class="search-wrap">

                <form role="search" method="get" class="search-form" action="/search">
                    <label>
                        <span class="hide-content">Search for:</span>
                        <input type="search" class="search-field" placeholder="Type Your Keywords" value=""
                            name="search" title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>

                <a href="#" id="close-search" class="close-btn">Close</a>

            </div> <!-- end search wrap -->

            <div class="triggers">
                <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
                <a class="menu-toggle" href="#"><span>Menu</span></a>
            </div> <!-- end triggers -->

        </div>

    </header>
    <section id="content-wrap" class="site-page">
        <div class="row">
            <div class="col-twelve">
                <section>
                    <div class="content-media">
                        <h1>Category : {{ $post->category->name }}</h1>
                        <h1 class="entry-title add-bottom">Name:{{ $post->name }}</h1>

                        <p class="lead">{{ $post->discription }}</p>
                    </div>
                    <div class="content-media">
                        <img src="{{ asset('storage/' . $post->image) }}">
                    </div>
                    <div>
                        <table>
                            <thead>

                                <tr style="align-content: space-around">
                                    @foreach ($post->tags as $tag)
                                        <th>#{{ $tag->name }}</th>
                                    @endforeach
                                </tr>

                            </thead>
                        </table>
                    </div>

                    <div class="primary-content">


                        <p>{{ $post->content }}</p>



                    </div>

                </section>
            </div>
        </div>
    </section>


</body>
