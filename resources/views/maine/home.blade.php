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

<body id="top">
    <header class="short-header">

        <div class="gradient-block"></div>

        <div class="row header-content">

            <div class="logo">
                <a href="{{ route('home') }}">blog</a>
            </div>

            <nav id="main-nav-wrap">
                <ul class="main-navigation sf-menu">
                    <li class="current"><a href="{{ route('home') }}" title="">Home</a></li>
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


                    <li><a href="#about" title="">About</a></li>
                    <li><a href="#contact" title="">Contact</a></li>
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

    </header> <!-- end header -->
    <section id="bricks">
        @if ($posts->count())


            <div class="row masonry">

                <!-- brick-wrapper -->
                <div class="bricks-wrapper" style="position: relative; height: 3920.61px;">

                    <div class="grid-sizer"></div>
                    @if ($posts->count() >= 3)
                        <div class="brick entry featured-grid animate-this"
                            style="position: absolute; left: 0%; top: 0px;">
                            <div class="entry-content">
                                <div id="featured-post-slider" class="flexslider">
                                    <ul class="slides">



                                        @for ($i = 0; $i < 3; $i++)
                                            <li style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;"
                                                class="">
                                                <div class="featured-post-slide">

                                                    <div class="post-background"
                                                        style="background-image:url('{{ asset('storage/' . $posts[$i]->image) }}');">
                                                    </div>

                                                    <div class="overlay"></div>

                                                    <div class="post-content">
                                                        <ul class="entry-meta">
                                                            <li>{{ $posts[$i]->created_at->year . '/' . $posts[$i]->created_at->month . '/' . $posts[$i]->created_at->day }}
                                                            </li>
                                                            <li><a
                                                                    href="{{ route('profile.show', $posts[$i]->user->id) }}">{{ $posts[$i]->user->name }}</a>
                                                            </li>
                                                        </ul>

                                                        <h1 class="slide-title"><a
                                                                href="{{ route('viwopost', $posts[$i]) }}
                                                        title="">{{ $posts[$i]->name }}</a>
                                                        </h1>
                                                    </div>

                                                </div>
                                            </li>
                                        @endfor

                                        <!-- /slide -->

                                        <!-- /slide -->

                                    </ul> <!-- end slides -->
                                    <ul class="flex-direction-nav">
                                        <li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a>
                                        </li>
                                        <li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li>
                                    </ul>
                                </div> <!-- end featured-post-slider -->
                            </div> <!-- end entry content -->
                        </div>
                    @endif

                    @foreach ($posts as $post)
                        <article class="brick entry format-standard animate-this"
                            style="position: absolute; left: 0%; top: 0px;">

                            <div class="entry-thumb">
                                <a href="{{ route('viwopost', $post) }} class="thumb-link">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}">
                                </a>
                            </div>

                            <div class="entry-text">
                                <div class="entry-header">
                                    <h1 class="entry-title">{{ $post->name }}</h1>

                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            @foreach ($post->tags as $tag)
                                                <a>{{ $tag->name }}</a>
                                            @endforeach

                                        </span>

                                    </div>
                                    <div class="entry-excerpt">
                                        {{ $post->discription }}
                                    </div>



                                </div>

                            </div>

                        </article>
                    @endforeach

                </div> <!-- end brick-wrapper -->

            </div><!-- end row -->
        @endif
        {{-- {{ $posts->links() }} --}}
        <div class="row">

        </div>

    </section>
    <section id="about">
        <div class="primary-content">

            <div class="row block-1-2 block-tab-full">
                <div class="bgrid">
                    <h3>Who.</h3>
                    <p>name : Waleed Hashim<br>
                        age: 24 years <br>
                        jop : backend devolper <br>
                        exprians : html,css,js,bootstrap,vue.js,php,laravel, </p>
                </div>

                <div class="bgrid">
                    <img style="border-radius: 25%" width="40%" src="{{ asset('css/home/images/auth.jpg') }}"
                        alt="">
                </div>

                <div class="bgrid">
                    <h3>What.</h3>
                    <p>full blog project with an amizing futchers </p>
                </div>

                <div class="bgrid">
                    <h3>How.</h3>
                    <p>i use in tis project :
                        larvel 8,bootstrap5 <br> </p>
                </div>

            </div>

        </div>
    </section>

    <footer id="contact">

        <div class="footer-bottom">
            <div class="row">
                <div class="col-six tab-full">
                    <h4>Social midea</h4>

                    <p>
                        <a href="https://www.facebook.com/waleedxcrazy"> Facebook</a><br>
                        <a href="https://www.facebook.com/waleedxcrazy"> Twitter</a><br>
                        <a href="https://www.facebook.com/waleedxcrazy"> Inastgram</a>
                    </p>

                </div>

                <div class="col-six tab-full">
                    <h4>Contact Info</h4>

                    <p>SU Sennar ALtagtoa<br>
                        waleed0961140719@gmail.com <br>
                        Phone: (+249) 128 517 891
                    </p>

                </div>

            </div>
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

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- Java Script
   ================================================== -->

    <script src="{{ asset('js/home/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('js/home/js/plugins.js') }}"></script>
    <script src="{{ asset('js/home/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/home/js/main.js') }}"></script>


</body>

</html>
