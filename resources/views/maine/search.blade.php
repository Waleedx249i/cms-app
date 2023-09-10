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
                    @if (Auth::user->role == 'admin')
                        <li class="current"><a href="{{ route('dashbord') }}" title="">Dashbord</a></li>
                    @endif
                    <li class="has-children">
                        <a title="">Categories</a>
                        <ul class="sub-menu">



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



    <section id="page-header">
        <div class="row current-cat">
            <div class="col-full">

            </div>
        </div>
    </section>
    <div class="bricks-wrapper" style="position: relative; height: 3920.61px;">

        <div class="grid-sizer"></div>



        @foreach ($posts as $post)
            <article class="brick entry format-standard animate-this" style="position: absolute; left: 0%; top: 0px;">

                <div class="entry-thumb">
                    <a href="single-standard.html" class="thumb-link">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="ferris wheel">
                    </a>
                </div>

                <div class="entry-text">
                    <div class="entry-header">

                        <div class="entry-meta">
                            <span class="cat-links">
                                @foreach ($post->tags as $tag)
                                    <a>{{ $tag->name }}</a>
                                @endforeach

                            </span>
                        </div>

                        <h1 class="entry-title"><a href="single-standard.html">{{ $post->name }}</a></h1>

                    </div>
                    <div class="entry-excerpt">
                        {{ $post->discription }}
                    </div>
                </div>

            </article>
        @endforeach

    </div>





    <footer>

        <div class="footer-bottom">
            <div class="row">

                <div class="col-twelve">
                    <div class="copyright">
                        <span>© Copyright waleed Hashim 2023</span>
                        <span>Design by <a href="https://t.me/Waleedxcrazy">@waleedxcrazy</a></span>
                    </div>

                    <div id="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"><i
                                class="icon icon-arrow-up"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </footer>



    <script src="{{ asset('js/home/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('js/home/js/plugins.js') }}"></script>
    <script src="{{ asset('js/home/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/home/js/main.js') }}"></script>


</body>

</html>
