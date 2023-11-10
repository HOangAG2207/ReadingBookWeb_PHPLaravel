<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('assets\images\logos\book_logo.png')}}" type="image/x-icon">
    <!-- ***LINK*** -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <!-- toastr message -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
        #text-color {
            color: #f58c02;
        }
        .text-darkcyan {
            color: darkcyan;
        }
    </style>

    <!-- **SCRIPTS** -->
    <!-- fontawsome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- jquery -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- toastr message -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- <script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script> -->
    <!-- ckeditor -->
    <script src="/ckeditor/ckeditor.js"></script>
</head>

<body>
    @include('backend.layouts.component.admin_navbar')
    <div id="layoutSidenav">
        @include('backend.layouts.component.admin_sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('admin_content')
            </main>
            {{-- @include('backend.layouts.include.admin_footer') --}}
        </div>
    </div>
    <!-- yield -->
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
            "timeOut": 4000,
            "closeDuration": 400,
            "preventDuplicates": true,
            "showMethod": 'fadeIn',
            "hideMethod": 'fadeOut',
            "closeMethod": 'fadeOut',
            positionClass: 'top-10 end-0 translate-middle-x'
        }
    </script>
    @if(session('success'))
    <!-- toastr message -->
    <script>
        toastr.success("{{session('success')}}", "Thành công!!!");
    </script>
    @endif
</body>

</html>