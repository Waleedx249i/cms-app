<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>walecom</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background:linear-gradient(90deg,#cf47f1,#cfc2c2)" class="d-flex h-100 text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <main class="px-2" style="padding-top:15%">
            <h1 style="font-size: 90px;font-weight: 900 ;color: #5c7bd1cc">Welcome :)</h1>
            <h1 style="color: #9154546"></h1>

            <p class="lead">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-1 sm:block">
                        @auth
                            <p style="font-size: 20px;font-weight: 100 ;color: #646568cc">Hi {{ Auth::user()->name }}
                                lets continue to home....</p>
                            <a style="background-color: #e96ed4af; color:#ffffff ;font-weight: 200"
                                href="{{ url('/home') }}" class="btn">Home</a>
                        @else
                            <p style="font-size: 20px;font-weight: 100 ;color: #646568cc"><br> you need to login or register
                            </p>
                            <a style="background-color: #100d13af; color:#ffffff;font-weight: 200"
                                href="{{ route('login') }}" class="btn">Log
                                in</a>

                            @if (Route::has('register'))
                                <a style="background-color: #e96ed4af; color:#ffffff;font-weight: 200"
                                    href="{{ route('register') }}" class="btn">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </p>
        </main>
    </div>
</body>

</html>
