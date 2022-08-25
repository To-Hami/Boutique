<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{config('app.name')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="robots" content="all,follow">--}}
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="{{   asset('frontend/vendor/glightbox/css/glightbox.min.css')}}">
    <link rel="stylesheet" href="{{   asset('frontend/vendor/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{   asset('frontend/vendor/choices.js/public/assets/styles/choices.min.css')}}">
    <link rel="stylesheet" href="{{   asset('frontend/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{   asset('frontend/vendor/owl/animate.css')}}">
    <link rel="stylesheet" href="{{   asset('frontend/vendor/owl/owl.carousel.min.css')}}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">

    <link rel="stylesheet" href="{{asset('frontend/css/style.default.css')}}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{   asset('frontend/css/custom.css')}}">
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.png')}}">


    <livewire:styles />

@yield('style')

</head>
<body>
<div class="page-holder {{request()->routeIs('detail')?' bg-light':null}}">

    <header class="header bg-white">
        <div class="container px-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand"
                                                                              href="{{route('index')}}"><span
                        class="fw-bold text-uppercase text-dark">Boutique</span></a>
                <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link active" href="{{route('index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="{{route('shop')}}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="{{route('detail')}}">Product detail</a>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#"
                                                         data-bs-toggle="dropdown" aria-haspopup="true"
                                                         aria-expanded="false">Pages</a>
                            <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a
                                    class="dropdown-item border-0 transition-link"
                                    href="{{route('index')}}">Homepage</a><a
                                    class="dropdown-item border-0 transition-link" href="{{route('shop')}}">Category</a><a
                                    class="dropdown-item border-0 transition-link" href="{{route('detail')}}">Product
                                    detail</a><a class="dropdown-item border-0 transition-link"
                                                 href="{{route('cart')}}">Shopping cart</a><a
                                    class="dropdown-item border-0 transition-link"
                                    href="{{route('checkout')}}">Checkout</a></div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('cart')}}"> <i
                                    class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small
                                    class="text-gray fw-normal">(2)</small></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"> <i class="far fa-heart me-1"></i><small
                                    class="text-gray fw-normal"> (0)</small></a></li>
                        @guest()
                            <li class="nav-item"><a class="nav-link" href="{{route('login')}}"> <i
                                        class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li>

                            <li class="nav-item"><a class="nav-link" href="{{route('register')}}"> <i
                                        class="fas fa-user me-1 text-gray fw-normal"></i>register</a></li>

                        @endguest
                        @auth()
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle nav-link dropdown-toggle" id="authDropdown"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Welcome {{ auth()->user()->full_name  }}
                                </a>
                                <div class="dropdown-menu mt-3" aria-labelledby="authDropdown">
                                    <a href="{{route('admin.dashboard')}}" class="dropdown-item border-0">Dashboard</a>
                                    <a href="javascript:void(0);" class="dropdown-item border-0"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form action="{{ route('logout') }}" method="post" id="logout-form" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--  Modal -->
    <div class="container">
        @yield('content')
    </div>
    <footer class="bg-dark text-white">
        <div class="container py-4">
            <div class="row py-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase mb-3">Customer services</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#!">Help &amp; Contact Us</a></li>
                        <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
                        <li><a class="footer-link" href="#!">Online Stores</a></li>
                        <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase mb-3">Company</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#!">What We Do</a></li>
                        <li><a class="footer-link" href="#!">Available Services</a></li>
                        <li><a class="footer-link" href="#!">Latest Posts</a></li>
                        <li><a class="footer-link" href="#!">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="text-uppercase mb-3">Social media</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#!">Twitter</a></li>
                        <li><a class="footer-link" href="#!">Instagram</a></li>
                        <li><a class="footer-link" href="#!">Tumblr</a></li>
                        <li><a class="footer-link" href="#!">Pinterest</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-top pt-4" style="border-color: #1d1d1d !important">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor"
                                                                                 href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Bootstrapious</a>
                        </p>
                        <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- JavaScript files-->

<script src="{{   asset('frontend/vendor/jquery/jquery.min.js')}}"></script>

<script src="{{   asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{   asset('frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{   asset('frontend/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{   asset('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{   asset('frontend/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>


<script src="{{   asset('frontend/js/front.js')}}"></script>
<script src="{{  asset('js/app.js') }}"></script>
{{--<script>--}}
{{--    var range = document.getElementById('range');--}}
{{--    noUiSlider.create(range, {--}}
{{--        range: {--}}
{{--            'min': 0,--}}
{{--            'max': 2000--}}
{{--        },--}}
{{--        step: 5,--}}
{{--        start: [100, 1000],--}}
{{--        margin: 300,--}}
{{--        connect: true,--}}
{{--        direction: 'ltr',--}}
{{--        orientation: 'horizontal',--}}
{{--        behaviour: 'tap-drag',--}}
{{--        tooltips: true,--}}
{{--        format: {--}}
{{--            to: function (value) {--}}
{{--                return '$' + value;--}}
{{--            },--}}
{{--            from: function (value) {--}}
{{--                return value.replace('', '');--}}
{{--            }--}}
{{--        }--}}
{{--    });--}}

{{--</script>--}}
<script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function (e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }

    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous">

<livewire:scripts />
@yield('script')
</body>
</html>
