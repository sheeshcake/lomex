<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} | Tires and Accessories</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('css/global.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{url('/img/lomex-logo.png')}}" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="/">Home</a></li></b>
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#products">Products</a></li></b>
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#products">Services</a></li></b>
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#products">News</a></li></b>
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#products">Featured</a></li></b>
                        <!-- <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li></b> -->
                        <!-- @if (Auth::guard('user'))
                            <b><li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-5 fa-shopping-basket" aria-hidden="true"></i>Cart</a></li></b>
                            <b><li class="nav-item"><a href="{{ route('logout') }}" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li></b>
                        @else
                            <b><li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i>Login</a></li></b>
                        @endif -->
                        <!-- <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li></b> -->
                    </ul>
                </div>
            </div>
            
        </nav>

        @yield('content')

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">
                        <p><b>Lomex&trade;</b> Tires and Accesories</p>
                        <p>Powered By <a href="https://www.pylonglobal.com/">Pylon&copy;</a> <?php echo date("Y"); ?><p>
                    </div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <!-- <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a> -->
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/LXCarTires/"><i class="fab fa-facebook-f"></i></a>
                        <!-- <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a> -->
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ URL::asset('js/scripts.js') }}"></script>
        <script>
        </script>
    </body>
</html>
