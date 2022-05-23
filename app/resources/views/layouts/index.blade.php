<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <title>@yield('title')</title>
    </head>
    <body>
    <main class="container" >
        <div class="row">
        <div class="col-xs-12 col-md-3 col-lg-3">
        @include('common/sidebar')
        </div>
            <div class="col-xs-12 col-md-9 col-lg-9">
                    @yield('panel')

                <div id="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
