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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <div class="overlay">
            <h1>Start Shopping</h1>
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
                    <img class="d-block w-100" src="{{ url('/') }}/img/dunlop.jpg" alt="Dunlop">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/Continental.jpg" alt="Continental">
                </div>
                <div class="carousel-item">
                 <img class="d-block w-100" src="{{ url('/') }}/img/linglong.jpg" alt="Linglong">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/Hankook.jpg" alt="Hankook">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ url('/') }}/img/Toyo.jpg" alt="Toyo">
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
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li></b>
                        <b><li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li></b>
                    </ul>
                </div>
            </div>
            
        </nav>
        
        <!-- Masthead-->
        <!-- <header class="masthead"> -->
            <!-- <div class="container">
                <div class="masthead-subheading ">Welcome To</div>
                <div class="masthead-heading text-uppercase mb-4">Lomex Car Tires and Accessories</div>
                <h3 class="masthead-sub">Car Tires and Accessories</h3>
                
            </div> -->
        <!-- </header> -->
        <!-- Products Grid-->
        @include('includes/products')
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
        </section>
        <!-- News -->
        <section class="page-section" id="news">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">News</h2>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <img class="card-img-top" srcset="https://bridgestonetires.com.ph/wp-content/uploads/2021/04/Bridgestone-April29-v1.jpeg 1200w, https://bridgestonetires.com.ph/wp-content/uploads/2021/04/Bridgestone-April29-v1-980x513.jpeg 980w, https://bridgestonetires.com.ph/wp-content/uploads/2021/04/Bridgestone-April29-v1-480x251.jpeg 480w" alt="Card image cap">
                                <div class="card-body">
                                    <a href="https://bridgestonetires.com.ph/how-to-prevent-your-car-from-overheating/">How to prevent your car from overheating</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img class="card-img-top" srcset="https://bridgestonetires.com.ph/wp-content/uploads/2021/04/Bridgestone-April19-v4.jpeg 1200w, https://bridgestonetires.com.ph/wp-content/uploads/2021/04/Bridgestone-April19-v4-980x513.jpeg 980w, https://bridgestonetires.com.ph/wp-content/uploads/2021/04/Bridgestone-April19-v4-480x251.jpeg 480w" alt="Card image cap">
                                <div class="card-body">
                                    <a href="https://bridgestonetires.com.ph/safer-road-for-all-2021/">Bridgestone Philippines’ Safer Road for All: Always in All Ways 2021 Campaign</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section" id="appreciation">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Featured</h2>
                    <h3 class="section-subheading text-muted">We are very pleased in every purchase of our products!</h3>
                    <div class="row">
                        <div class="col">
                            <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FLXCarTires%2Fposts%2F988095655334556&width=500&show_text=true&height=608&appId" width="500" height="608" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                            </iframe>
                        </div>
                        <div class="col">
                            <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FLXCarTires%2Fposts%2F988002112010577&width=500&show_text=true&height=589&appId" width="500" height="589" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>          
        <!-- About-->
        @include('includes/about')
        <!-- Team-->
        <!-- Clients-->
        @include('includes/clients')
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
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
        </script>
    </body>
</html>
