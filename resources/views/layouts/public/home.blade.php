<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Bold challenge for the São Paulo fair in 06/2018">
        <meta name="author" content="Guiherme Maciel">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}@hasSection('title') - @yield('title') @endif</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('components/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!--  Font-Awesome  -->
        <link href="{{ URL::asset('components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        @stack('styles')
    </head>
    <body>
        <section>
            {{-- @include('layouts.leftpanel') --}}
            <div class="mainpanel">
                {{-- @include('layouts.headerbar') --}}
                {{-- @include('layouts.shared.alert') --}}
                @yield('content')
            </div><!-- mainpanel -->
            {{-- @include('layouts.rightpanel') --}}
        </section>

        {{-- <script src="{{ URL::asset('js/jquery-1.10.2.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
        <script src="{{ URL::asset('js/modernizr.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.sparkline.min.js') }}"></script>
        <script src="{{ URL::asset('js/toggles.min.js') }}"></script>
        <script src="{{ URL::asset('js/retina.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.cookies.js') }}"></script>
        <script src="{{ URL::asset('js/morris.min.js') }}"></script>
        <script src="{{ URL::asset('js/raphael-2.1.0.min.js') }}"></script>
        <script src="{{ URL::asset('js/chosen.jquery.min.js') }}"></script>
        <script src="{{ URL::asset('components/bootbox/js/bootbox.min.js') }}"></script>
        <script src="{{ URL::asset('components/momentjs/moment.min.js') }}"></script>
        {{-- <script src="{{ URL::asset('js/flot/flot.min.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('js/flot/flot.resize.min.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('js/dashboard.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('js/dropzone.min.js') }}"></script> --}}

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ URL::asset('components/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('components/bootstrap/js/bootstrap.min.js') }}"></script>
        @stack('scripts')
    </body>
</html>
