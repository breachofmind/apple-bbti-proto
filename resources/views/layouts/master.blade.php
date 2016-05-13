<!DOCYTPE html>
<html>
<head>
    <title>Apple BBTI Prototype</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{csrf_token()}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/app.css">

    <script src="{{cache_bust('static/lib.js')}}"></script>
    <script src="{{elixir('static/src.js')}}"></script>

    @if ( Config::get('app.debug') )
        <script type="text/javascript">
            document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
        </script>
    @endif
</head>
<body ng-app="app" ng-controller="MenuController as menu" ng-class="{'menu-open':isOpen}">

    @include('common.header')


    <main ng-controller="AppController as ctrl" class="container">

        @yield('content')

    </main>

    @include('common.footer')

</body>
</html>