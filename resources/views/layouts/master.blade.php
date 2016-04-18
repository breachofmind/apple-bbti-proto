<!DOCYTPE html>
<html>
<head>
    <title>Apple BBTI Prototype</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <header id="Header">
        <div class="container">
            <div class="col-xs-12 col-sm-4">
                <img src="/images/logo.png" alt="Brightstar Logo" class="logo">
            </div>

            <div class="col-xs-12 col-sm-8">
                <h1 class="app-title">Re-use & Recycle Portal</h1>
            </div>
        </div>
    </header>

    <main ng-app="app" ng-controller="AppController as ctrl" class="container">

        @yield('content')

    </main>


    <footer id="Footer">
        <div class="container">
            <ul class="link-list object-list">
                <li><a href="#">About Brightstar</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>

            <div class="fine-print">
                <p>Copyright © {{date('Y')}} Brightstar US, Inc. Brightstar is a registered trademark of Brightstar Corp. Inc. All rights reserved.</p>
                <p>Service provided by Brightstar US, Inc.</p>
            </div>
        </div>

    </footer>

</body>
</html>