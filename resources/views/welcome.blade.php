<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title class="bold-font">Welcome to Bold Reviews!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
        @stack('styles')
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md" class="bold-font">
                    Welcome to Bold Reviews!
                </div>

                <div class="links">
                    <a href="{{ route('reviews.index') }}">Look into our reviews</a>
                </div>
            </div>
        </div>
    </body>
</html>
