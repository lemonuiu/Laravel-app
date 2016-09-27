<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Q</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Q
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                   <li><a href="{{ url('/') }}">Home</a></li>
                   
                   <li><a href="{{ url('/') }}">Product</a></li>
                   
                </ul>

<!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        <li><a href="{{url('/cart/add-to-cart')}}"><i class="glyphicon glyphicon-off" area-hidden="true"></i>Cart <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty: ''}}</span></a></li>

                    @endif
                </ul>
               
            </div>
        </div>
    </nav>
<div class="container">
    @yield('content')

</div>
<hr>
        <footer class="footer">
          <div class="container">
            <p class="text-muted pull-right">Copyright@2016  </p>
          </div>
        </footer>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
