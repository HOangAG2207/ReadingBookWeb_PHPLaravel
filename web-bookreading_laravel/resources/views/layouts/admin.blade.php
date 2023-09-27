<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.include.admin_navbar')
    <div id="layoutSidenav">
        @include('layouts.include.admin_sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('admin_content')
            </main>
            <!-- @include('layouts.include.admin_footer') -->
        </div>
    </div>
<<<<<<< HEAD
    <!-- yield -->
    @yield('image_zoom')
    @yield('deleteConfirm');
=======
>>>>>>> 54660d33b2df892d825845612208dd80d6dbef08
</body>

</html>