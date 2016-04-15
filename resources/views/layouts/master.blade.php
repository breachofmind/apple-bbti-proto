<!DOCYTPE html>
<html>
<head>
    <title>Apple BBTI Prototype</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/app.css">

    <script src="/static/lib.js"></script>
    <script src="/static/src.js"></script>

    @if ( Config::get('app.debug') )
        <script type="text/javascript">
            document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
        </script>
    @endif
</head>
<body>

    <main ng-app="app" ng-controller="AppController as ctrl" class="container">

        @yield('content')

    </main>

</body>
</html>