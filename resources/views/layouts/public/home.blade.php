<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="Bold challenge for the São Paulo fair in 06/2018">
        <meta name="author" content="Guiherme Maciel">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}@hasSection('title') - @yield('title') @endif</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet"> --}}
        <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/theme.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/themify-icons.css') }}" rel="stylesheet">
        {{-- <link href="{{ URL::asset('css/font-awesome./css') }}" rel="stylesheet"> --}}
        <link href="{{ URL::asset('components/datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        {{-- <link href="{{ URL::asset('components/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}

        <!--  Font-Awesome  -->
        <link href="{{ URL::asset('components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <link rel="icon" type="image/png" href="{{ URL::asset('images/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ URL::asset('images/favicon-16x16.png') }}" sizes="16x16">
        <meta name="theme-color" content="#DE3626">
        @stack('styles')
    </head>
    <body>
        @include('layouts.public.headerbar')
        <main class="main-container">
            @yield('content')
            @include('layouts.public.footer')
        </main><!-- mainpanel -->

        <!-- jQuery v3.3.1 (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ URL::asset('components/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('components/bootstrap/js/bootstrap.min.js') }}"></script>

        <script src="{{ URL::asset('js/common.js') }}"></script>

        {{-- <script src="{{ URL::asset('js/parallax.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('js/flexslider.min.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('js/jquery.min.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('js/scripts.js') }}"></script> --}}
        @stack('scripts')
    </body>
</html>
