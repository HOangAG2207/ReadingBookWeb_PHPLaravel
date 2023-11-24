<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('assets\images\logos\book_logo.png')}}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <!-- link css -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <!-- carousel -->
    <link href="{{ asset('owl-carousel/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('owl-carousel/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <!-- virtual select -->
    <link rel="stylesheet" href="/virtual-select/virtual-select.min.css" />
    <script src="/virtual-select/virtual-select.min.js"></script>

    <!-- SCRIPT -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- MDB -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script> -->
    <!-- carousel -->
    <script src="{{ asset('owl-carousel/js/owl.carousel.js') }}"></script>
    <style>
        .navbar-2 {
            /* Style for the second navbar */
            /* position: fixed; */
            /* top: 0; */
            width: 100%;
            z-index: 100;
            /* Ensure it's above other content */
        }

        .title {
            color: darkcyan;
        }

        .content .top-title {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-align: center;
        }

        .content .top-title a {
            font-size: 18px;
            text-decoration: none;
            font-weight: bold;
            color: lightcyan;
        }

        .content .book_content a {
            font-size: 14px;
            text-decoration: none;
            color: white;
        }

        .content .chapter a {
            font-size: 14px;
            text-decoration: none;
            color: black;
        }

        .chapter-time {
            font-style: italic;
        }

        .list-group a:hover {
            background: darkcyan;
            color: white;
        }

        #multi-select {
            display: block;
            max-width: 80%;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 3px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .vscomp-toggle-button {
            border-radius: 0.375rem;
            border: none;
        }
    </style>
</head>

<body>
    <header>

    </header>
    <!-- Header -->
    @include('frontend.includes.header')
    <!-- Navbar -->
    @yield('slide_carousel')
    <!-- main content -->
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Script -->
    <script>
        const navbar2 = document.querySelector(".navbar-2");
        const navbar1 = document.querySelector(".navbar-1");
        const navbar1Height = navbar1.offsetHeight;

        window.addEventListener("scroll", () => {
            if (window.pageYOffset >= navbar1Height) {
                navbar2.style.position = "fixed";
                navbar2.style.top = 0;
                navbar2.style.opacity = 0.95;
            } else {
                navbar2.style.position = "static";
                navbar2.style.opacity = 1;
            }
        });
    </script>
</body>

</html>