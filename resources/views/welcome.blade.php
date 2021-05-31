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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <div class="overlay">
            <h6>(SCROLL DOWN)</h6>
            <a href="#products" class="js-scroll-trigger">
                <svg class="arrows">
                    <path class="a1" d="M0 0 L30 32 L60 0"></path>
                    <path class="a2" d="M0 20 L30 52 L60 20"></path>
                    <path class="a3" d="M0 40 L30 72 L60 40"></path>
                </svg>
            </a>

        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ url('/') }}/img/bridgestone.jpg" alt="Bridgestone">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/Continental.jpg" alt="Continental">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/dunlop.jpg" alt="Dunlop">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/falken.jpg" alt="Falken">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/linglong.jpg" alt="Linglong">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/Hankook.jpg" alt="Hankook">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/kumho.jpg" alt="Kumho">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/yokohama.jpg" alt="Yokohama">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/Toyo.jpg" alt="Toyo">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/firestone.jpg" alt="Firestone">
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{url('/img/lomex-logo.png')}}" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="#products">Products</a></li></b>
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li></b>
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="#news">News</a></li></b>
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="#appreciation">Featured</a></li></b>
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
        
        <!-- Products Grid-->
        @include('includes/products')
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="hover hover-2 text-white rounded mb-4"><img src="{{ url('/') }}/img/services/changetire.jpg" alt="">
                            <div class="hover-overlay"></div>
                            <div class="hover-2-content px-5 py-4">
                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">Change </span>Tire</h3>
                                <p class="hover-2-description text-uppercase mb-0">Losing your grip? <br>Find new tires today here at Lomex.</p>
                            </div>
                        </div>
                        <div class="hover hover-2 text-white rounded mt-4"><img src="{{ url('/') }}/img/services/vulcanizing.jpg" alt="">
                            <div class="hover-overlay"></div>
                            <div class="hover-2-content px-5 py-4">
                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">Tire </span>Vulcanizing</h3>
                                <p class="hover-2-description text-uppercase mb-0">Vulcanizing in professional way. <br>We guarantee the safety of your tires here at Lomex.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="hover hover-2 text-white rounded mb-4"><img src="{{ url('/') }}/img/services/wheelbalance.jpg" alt="">
                            <div class="hover-overlay"></div>
                            <div class="hover-2-content px-5 py-4">
                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">Wheel </span>Balancing</h3>
                                <p class="hover-2-description text-uppercase mb-0">Don't reinvent the wheel <br>just balance it here at Lomex.</p>
                            </div>
                        </div>
                        <div class="hover hover-2 text-white rounded mt-4"><img src="{{ url('/') }}/img/services/nitrogeninflation.jpg" alt="">
                            <div class="hover-overlay"></div>
                            <div class="hover-2-content px-5 py-4">
                                <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">Nitrogen </span>Inflation <span class="font-weight-bold">System</span></h3>
                                <p class="hover-2-description text-uppercase mb-0">Extend tire life <br>Save money and fuel, Drive more safely.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- News -->
        <section class="page-section" id="news">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">News</h2>
                    <h3 class="section-subheading text-muted">Get the latest news and updates.</h3>
                    <div class="row">
                        @foreach($data['news'] as $news)
                        <div class="col">
                            <div class="card">
                                <img class="card-img-top" height="300px" src="{{ url('/') }}/img/news/{{ $news['news_image'] }}" alt="Card image cap">
                                <div class="card-body">
                                    <a href="{{ $news['news_url'] }}">{{ $news['news_title'] }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="my-3 d-flex justify-content-center">
                        {!! $data['news']->links("pagination::bootstrap-4") !!}
                </div>
            </div>
        </section>
        <section class="page-section" id="appreciation">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Featured</h2>
                    <h3 class="section-subheading text-muted">We are very pleased in every purchase of our products!</h3>
                    <div class="row">
                        @foreach($data['featured'] as $featured)
                        <div class="col-md-6 embed-responsive" style="height: 600px">
                            <iframe class="embed-responsive-item" src="{{ $featured['featured_link'] }}" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                            </iframe>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="my-3 d-flex justify-content-center">
                        {!! $data['featured']->links("pagination::bootstrap-4") !!}
                </div>
            </div>
        </section>          
        <!-- About-->
        <!-- Team-->
        <!-- Clients-->
        @include('includes/clients')
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lomex is here to answer your queries.</h3>
                </div>
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
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
            $(document).ready(function(){
                var url_string = window.location.href;
                var url = new URL(url_string);
                var page = url.searchParams.get("page");
                if(page){
                    document.getElementById("news").scrollIntoView();
                }
            })
        </script>
    </body>
</html>
