<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:32:04 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>HONO - @yield('title')</title>

        {{-- load css using for web service client --}}
        @yield('css')

        <!-- Link Swiper's CSS -->
    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css"
  />

        <!-- ::::::::::::::Favicon icon::::::::::::::-->
        <link rel="shortcut icon" href="{{ url('public/client') }}/images/favicon.ico" type="image/png">

        <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ url('public/client') }}/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="{{ url('public/client') }}/css/vendor/ionicons.css">
        <link rel="stylesheet" href="{{ url('public/client') }}/css/vendor/simple-line-icons.css">
        <link rel="stylesheet" href="{{ url('public/client') }}/css/vendor/jquery-ui.min.css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="{{ url('public/client') }}/css/plugins/swiper-bundle.min.css">
        <link rel="stylesheet" href="{{ url('public/client') }}/css/plugins/animate.min.css">
        <link rel="stylesheet" href="{{ url('public/client') }}/css/plugins/nice-select.css">
        <link rel="stylesheet" href="{{ url('public/client') }}/css/plugins/venobox.min.css">
        <link rel="stylesheet" href="{{ url('public/client') }}/css/plugins/jquery.lineProgressbar.css">
        <link rel="stylesheet" href="{{ url('public/client') }}/css/plugins/aos.min.css">

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ url('public/client') }}/css/style.css">

        <!-- Use the minified version files listed below for better performance and remove the files listed above -->
        <!-- <link rel="stylesheet" href="{{ url('public/client') }}/css/vendor/vendor.min.css">
        <link rel="stylesheet" href="{{ url('public/client') }}/css/plugins/plugins.min.css">
        <link rel="stylesheet" href="{{ url('public/client') }}/css/style.min.css"> -->

    </head>

    <body>
        <!-- Start Header Area -->
        <header class="header-section d-none d-xl-block">
            <div class="header-wrapper">
                <div class="header-bottom header-bottom-color--black section-fluid sticky-header sticky-color--black">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 d-flex align-items-center justify-content-between">
                                <!-- Start Header Logo -->
                                <div class="header-logo">
                                    <div class="logo">
                                        <a href=""><img src="{{ url('public/client') }}/images/logo/logo_white.png"
                                                alt=""></a>
                                    </div>
                                </div>
                                <!-- End Header Logo -->

                                <!-- Start Header Main Menu -->
                                <div class="main-menu menu-color--white menu-hover-color--pink">
                                    <nav>
                                        <ul>
                                            <li class="">
                                                <a class="active main-menu-link"
                                                    href=" {{ route('client.index') }} ">Home</i></a>
                                            </li>
                                            <li class="has-dropdown has-megaitem">
                                                <a href="{{ route('client.shop') }}">Shop <i
                                                        class="fa fa-angle-down"></i></a>
                                                <!-- Mega Menu -->
                                                <div class="mega-menu">
                                                    <ul class="mega-menu-inner d-flex justify-content-around m-auto">
                                                        <!-- Mega Menu Sub Link -->
                                                        <li class="mega-menu-item">
                                                            <a href="#" class="mega-menu-item-title">Please Visit Shop</a>
                                                            <ul class="mega-menu-sub">
                                                                <li><a href="{{ route('client.shop') }}">Go To Shop
                                                                        Now</a></li>
                                                                <li><a href="{{ route('client.wishlist') }}">wishlist</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <!-- Mega Menu Sub Link -->
                                                        <li class="mega-menu-item">
                                                            <a href="#" class="mega-menu-item-title">Your Activities At The
                                                                Shop</a>
                                                            <ul class="mega-menu-sub">
                                                                <li><a href="{{ route('cart.index') }}">Cart</a></li>
                                                                <li><a href="{{ route('client.checkout') }}">Checkout</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="menu-banner">
                                                        <a href="#" class="menu-banner-link">
                                                            <img class="menu-banner-img"
                                                                src="{{ url('public/client') }}/images/banner/menu-banner.jpg"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('client.blog') }}">Blog</i></a>
                                            </li>
                                            <li>
                                                <a href="{{ route('client.about') }}">About Us</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('client.contact') }}">Contact Us</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.index') }}">Account</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- End Header Main Menu Start -->

                                <!-- Start Header Action Link -->
                                <ul class="header-action-link action-color--white action-hover-color--pink">
                                    <li>
                                        <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                            <i class="icon-heart"></i>
                                            @if (Session::has('wishlist'))
                                                <?php $count_wl = 0; ?>
                                                @foreach (Session::get('wishlist') as $key=>$value)
                                                    <?php $count_wl +=1; ?>
                                                @endforeach
                                            <span class="item-count">{{$count_wl}}</span>
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                            <i class="icon-bag"></i>
                                            <span class="item-count">{{Cart::count()}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#search">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                            <i class="icon-menu"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Header Action Link -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Start Header Area -->

        <!-- Start Mobile Header -->
        <div class="mobile-header  mobile-header-bg-color--black section-fluid d-lg-block d-xl-none">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Start Mobile Left Side -->
                        <div class="mobile-header-left">
                            <ul class="mobile-menu-logo">
                                <li>
                                    <a href="{{route('client.index')}}">
                                        <div class="logo">
                                            <img src="{{ url('public/client') }}/images/logo/logo_white.png" alt="">
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Mobile Left Side -->

                        <!-- Start Mobile Right Side -->
                        <div class="mobile-right-side">
                            <ul class="header-action-link action-color--white action-hover-color--pink">
                                <li>
                                    <a href="#search">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                        <i class="icon-heart"></i>
                                        @if (Session::has('wishlist'))
                                            <?php $count_wl = 0; ?>
                                            @foreach (Session::get('wishlist') as $key=>$value)
                                                <?php $count_wl +=1; ?>
                                            @endforeach
                                            <span class="item-count">{{$count_wl}}</span>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <i class="icon-bag"></i>
                                        <span class="item-count">{{Cart::count()}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#mobile-menu-offcanvas"
                                        class="offcanvas-toggle offside-menu offside-menu-color--black">
                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Mobile Right Side -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mobile Header -->

        <!--  Start Offcanvas Mobile Menu Section -->
        <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header text-right">
                <button class="offcanvas-close"><i class="ion-android-close"></i></button>
            </div> <!-- End Offcanvas Header -->
            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <div class="offcanvas-mobile-menu-wrapper">
                <!-- Start Mobile Menu  -->
                <div class="mobile-menu-bottom">
                    <!-- Start Mobile Menu Nav -->
                    <div class="offcanvas-menu">
                        <ul>
                            <li>
                                <a href="{{ route('client.index') }} "><span>Home</span></a>
                            </li>
                            <li>
                                <a href="#"><span>Shop</span></a>
                                <ul class="mobile-sub-menu">
                                    <li>
                                        <a href="#">Please Visit Shop</a>
                                        <ul class="mobile-sub-menu">
                                            <li><a href="{{ route('client.shop') }}">Go To Shop Now</a></li>
                                            <li><a href="{{ route('client.wishlist') }}">wishlist</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="mobile-sub-menu">
                                    <li>
                                        <a href="#">Your Activities At The Shop</a>
                                        <ul class="mobile-sub-menu">
                                            <li><a href="{{ route('cart.index') }}">Cart</a></li>
                                            <li><a href="{{ route('client.checkout') }}">Checkout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('client.blog') }}"><span>Blogs</span></a>
                            </li>
                            <li><a href="{{ route('client.about') }}">About Us</a></li>
                            <li><a href="{{ route('client.contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('customer.index') }}">Account</a></li>
                        </ul>
                    </div> <!-- End Mobile Menu Nav -->
                </div> <!-- End Mobile Menu -->

                <!-- Start Mobile contact Info -->
                <div class="mobile-contact-info">
                    <div class="logo">
                        <a href="{{route('client.index')}}"><img src="{{ url('public/client') }}/images/logo/logo_white.png" alt=""></a>
                    </div>

                    <address class="address">
                        <span>Address: 23 Le Van Thinh St, Da Nang</span>
                        <span>Call Us: (+0987) 862 634 , (+0987) 862 634</span>
                        <span>Email: dovanvinhwao@mail.com</span>
                    </address>

                    <ul class="social-link">
                        <li><a href="https://www.facebook.com/dovanvinhwao/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://github.com/WAIMC"><i class="fa fa-github"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/vinh-%C4%91%E1%BB%97-v%C4%83n-838481217/"><i
                                    class="fa fa-linkedin"></i></a></li>
                    </ul>

                    <ul class="user-link">
                        <li><a href="{{ route('client.wishlist') }}">Wishlist</a></li>
                        <li><a href="{{ route('cart.index') }}">Cart</a></li>
                        <li><a href="{{ route('client.checkout') }}">Checkout</a></li>
                    </ul>
                </div>
                <!-- End Mobile contact Info -->

            </div> <!-- End Offcanvas Mobile Menu Wrapper -->
        </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

        <!-- Start Offcanvas Mobile Menu Section -->
        <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header text-right">
                <button class="offcanvas-close"><i class="ion-android-close"></i></button>
            </div> <!-- End Offcanvas Header -->
            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    <a href="{{route('client.index')}}"><img src="{{ url('public/client') }}/images/logo/logo_white.png" alt=""></a>
                </div>

                <address class="address">
                    <span>Address: 23 Le Van Thinh St, Da Nang</span>
                    <span>Call Us: (+0987) 862 634 , (+0987) 862 634</span>
                    <span>Email: dovanvinhwao@mail.com</span>
                </address>

                <ul class="social-link">
                    <li><a href="https://www.facebook.com/dovanvinhwao/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://github.com/WAIMC"><i class="fa fa-github"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/vinh-%C4%91%E1%BB%97-v%C4%83n-838481217/"><i
                                class="fa fa-linkedin"></i></a></li>
                </ul>

                <ul class="user-link">
                    <li><a href="{{ route('client.wishlist') }}">Wishlist</a></li>
                    <li><a href="{{ route('cart.index') }}">Cart</a></li>
                    <li><a href="{{ route('client.checkout') }}">Checkout</a></li>
                </ul>
            </div>
            <!-- End Mobile contact Info -->
        </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

        <!-- Start Offcanvas Addcart Section -->
        <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header text-right">
                <button class="offcanvas-close"><i class="ion-android-close"></i></button>
            </div> <!-- End Offcanvas Header -->

            <!-- Start  Offcanvas Addcart Wrapper -->
            <div class="offcanvas-add-cart-wrapper">
                <h4 class="offcanvas-title">Shopping Cart</h4>
                <ul class="offcanvas-cart">
                    @if (Cart::count()>0)
                    <?php $pv_cart = Cart::content(); ?>
                        @foreach ($pv_cart as $v_cart)
                            <li class="offcanvas-cart-item-single">
                                <div class="offcanvas-cart-item-block">
                                    <a href="#" class="offcanvas-cart-item-image-link">
                                        <img src="{{ url('public/uploads/product/',$v_cart->options->image) }}" alt=""
                                            class="offcanvas-cart-image">
                                    </a>
                                    <div class="offcanvas-cart-item-content">
                                        <a href="#" class="offcanvas-cart-item-link">{{$v_cart->name}}</a>
                                        <div class="offcanvas-cart-item-details">
                                            <span class="offcanvas-cart-item-details-quantity">{{$v_cart->qty}} x </span>
                                            <span class="offcanvas-cart-item-details-price">${{$v_cart->price}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="offcanvas-cart-item-delete text-right">
                                    <a href="{{route('cart.destroy',['id_cart'=>$v_cart->rowId])}}" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="offcanvas-cart-total-price">
                    <span class="offcanvas-cart-total-price-text">Subtotal:</span>
                    <span class="offcanvas-cart-total-price-value">${{Cart::subtotal()}}</span>
                </div>
                <ul class="offcanvas-cart-action-button">
                    <li><a href="{{ route('cart.index') }}" class="btn btn-block btn-pink">View Cart</a></li>
                    <li><a href="{{ route('client.checkout') }}" class=" btn btn-block btn-pink mt-5">Checkout</a></li>
                </ul>
            </div> <!-- End  Offcanvas Addcart Wrapper -->

        </div> <!-- End  Offcanvas Addcart Section -->

        <!-- Start Offcanvas Mobile Menu Section -->
        <div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header text-right">
                <button class="offcanvas-close"><i class="ion-android-close"></i></button>
            </div> <!-- ENd Offcanvas Header -->

            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <div class="offcanvas-wishlist-wrapper">
                <h4 class="offcanvas-title">Wishlist</h4>
                <ul class="offcanvas-wishlist">
                    @if (Session::has('wishlist'))
                        @foreach (Session::get('wishlist') as $key=>$value)
                            @foreach ($value as $show_wl)
                                <li class="offcanvas-wishlist-item-single">
                                    <div class="offcanvas-wishlist-item-block">
                                        <a href="#" class="offcanvas-wishlist-item-image-link">
                                            <img src="{{ url('public/uploads/product/',$show_wl['image']) }}" alt=""
                                                class="offcanvas-wishlist-image">
                                        </a>
                                        <div class="offcanvas-wishlist-item-content">
                                            <a href="#" class="offcanvas-wishlist-item-link">{{$show_wl['name']}}</a>
                                            <div class="offcanvas-wishlist-item-details">
                                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                                <span class="offcanvas-wishlist-item-details-price">${{$show_wl['price']}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offcanvas-wishlist-item-delete text-right">
                                        <a href="{{route('client.destroyWishlist',['id_vp' => $show_wl['id_vp']])}}" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </li>   
                            @endforeach
                        @endforeach
                    @endif
                </ul>
                <ul class="offcanvas-wishlist-action-button">
                    <li><a href="{{ route('client.wishlist') }}" class="btn btn-block btn-pink">View wishlist</a></li>
                </ul>
            </div> <!-- End Offcanvas Mobile Menu Wrapper -->

        </div> <!-- End Offcanvas Mobile Menu Section -->

        <!-- Start Offcanvas Search Bar Section -->
        <div id="search" class="search-modal">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-lg btn-pink">Search</button>
            </form>
        </div>
        <!-- End Offcanvas Search Bar Section -->

        <!-- Offcanvas Overlay -->
        <div class="offcanvas-overlay"></div>



        {{-- *********************************  start content  ******************************************** --}}


        @yield('main')




        {{-- *********************************  end content  ******************************************** --}}


        <!-- /.card -->

        <!-- Start Footer Section -->
        <footer class="footer-section footer-bg section-top-gap-100">
            <div class="footer-wrapper">
                <!-- Start Footer Top -->
                <div class="footer-top">
                    <div class="container">
                        <div class="row mb-n6">
                            <div class="col-lg-3 col-sm-6 mb-6">
                                <!-- Start Footer Single Item -->
                                <div class="footer-widget-single-item footer-widget-color--pink" data-aos="fade-up"
                                    data-aos-delay="0">
                                    <h5 class="title">INFORMATION</h5>
                                    <ul class="footer-nav">
                                        <li><a href="{{route('customer.index')}}">Delivery Information</a></li>
                                        <li><a href="{{route('client.about')}}">Terms & Conditions</a></li>
                                        <li><a href="{{ route('client.contact') }}">Contact</a></li>
                                        <li><a href="#">Returns</a></li>
                                    </ul>
                                </div>
                                <!-- End Footer Single Item -->
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-6">
                                <!-- Start Footer Single Item -->
                                <div class="footer-widget-single-item footer-widget-color--pink" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <h5 class="title">MY ACCOUNT</h5>
                                    <ul class="footer-nav">
                                        <li><a href="{{route('customer.index')}}">My account</a></li>
                                        <li><a href="{{ route('client.wishlist') }}">Wishlist</a></li>
                                        <li><a href="{{route('client.about')}}">Privacy Policy</a></li>
                                        <li><a href="{{route('client.contact')}}">Frequently Questions</a></li>
                                        <li><a href="{{route('customer.index')}}">Order History</a></li>
                                    </ul>
                                </div>
                                <!-- End Footer Single Item -->
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-6">
                                <!-- Start Footer Single Item -->
                                <div class="footer-widget-single-item footer-widget-color--pink" data-aos="fade-up"
                                    data-aos-delay="400">
                                    <h5 class="title">CATEGORIES</h5>
                                    <ul class="footer-nav">
                                        <li><a href="{{route('client.shop')}}">Decorative</a></li>
                                        <li><a href="{{route('client.shop')}}">Kitchen utensils</a></li>
                                        <li><a href="{{route('client.shop')}}">Chair & Bar stools</a></li>
                                        <li><a href="{{route('client.shop')}}">Sofas and Armchairs</a></li>
                                        <li><a href="{{route('client.shop')}}">Interior lighting</a></li>
                                    </ul>
                                </div>
                                <!-- End Footer Single Item -->
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-6">
                                <!-- Start Footer Single Item -->
                                <div class="footer-widget-single-item footer-widget-color--pink" data-aos="fade-up"
                                    data-aos-delay="600">
                                    <h5 class="title">ABOUT US</h5>
                                    <div class="footer-about">
                                        <p>I am a designers and developers that create high quality MC Wai.</p>

                                        <address>
                                            <span>Address: 0987 862 634 Da Nang City</span>
                                            <span>Email: dovanvinhwao@mail.com</span>
                                        </address>
                                    </div>
                                </div>
                                <!-- End Footer Single Item -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Footer Top -->

                <!-- Start Footer Center -->
                <div class="footer-center">
                    <div class="container">
                        <div class="row mb-n6">
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-6">
                                <div class="footer-social" data-aos="fade-up" data-aos-delay="0">
                                    <h4 class="title">FOLLOW US</h4>
                                    <ul class="footer-social-link">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-6 mb-6">
                                <div class="footer-newsletter" data-aos="fade-up" data-aos-delay="200">
                                    <h4 class="title">DON'T MISS OUT ON THE LATEST</h4>
                                    <div class="form-newsletter">
                                        <form action="#" method="post">
                                            <div class="form-fild-newsletter-single-item input-color--pink">
                                                <input type="email" placeholder="Your email address..." required>
                                                <button type="submit">SUBSCRIBE!</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Footer Center -->

                <!-- Start Footer Bottom -->
                <div class="footer-bottom">
                    <div class="container">
                        <div
                            class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                            <div class="col-auto mb-6">
                                <div class="footer-copyright">
                                    <p> COPYRIGHT &copy; <a href="https://github.com/WAIMC" target="_blank">MC Wai</a>. ALL
                                        RIGHTS RESERVED.</p>
                                </div>
                            </div>
                            <div class="col-auto mb-6">
                                <div class="footer-payment">
                                    <div class="image">
                                        <img src="{{ url('public/client') }}/images/company-logo/payment.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Footer Bottom -->
            </div>
        </footer>
        <!-- End Footer Section -->

        <!-- material-scrolltop button -->
        <button class="material-scrolltop" type="button"></button>


        <!-- Start Modal Quickview cart -->
        @foreach ($product as $qv_pd)

            <?php
            // get all variant product presentative, with status == 0
            $quick_view_variant_product = $qv_pd
                ->product_variantProduct()
                ->where('status', 0)
                ->get();
            ?>

            {{-- show an variant product presentative --}}
            @foreach ($quick_view_variant_product as $qv)
                {{-- convert string gallery to string json --}}
                <?php
                $json_gallery = json_decode($qv->gallery);
                ?>

                <div class="modal fade" id="modalQuickview_{{ $qv_pd->id }}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="product-details-gallery-area mb-7">

                                                <!-- Start Large Image    modal-product-image-large-->
                                                <div class="product-large-image swiper-container gallery_top">
                                                    <div class="swiper-wrapper">
                                                        @if (is_array($json_gallery) || is_object($json_gallery))
                                                            @foreach ($json_gallery as $sl_image)
                                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                                    <img src="{{ url('public/uploads/product/' . $sl_image) }}" alt="">
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- End Large Image -->

                                                <!-- Start Thumbnail Image -->
                                                <div
                                                    class="product-image-thumb modal-product-image-thumb swiper-container pos-relative mt-5 gallery_thumbs">
                                                    <div class="swiper-wrapper">
                                                        @if (is_array($json_gallery) || is_object($json_gallery))
                                                            @foreach ($json_gallery as $st_image)
                                                                <div class="product-image-thumb-single swiper-slide">
                                                                    <img class="img-fluid"
                                                                        src="{{ url('public/uploads/product/', $st_image) }}"
                                                                        alt="">
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <!-- Add Arrows -->
                                                    <div class="gallery-thumb-arrow swiper-button-next"></div>
                                                    <div class="gallery-thumb-arrow swiper-button-prev"></div>
                                                </div>
                                                <!-- End Thumbnail Image -->

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="modal-product-details-content-area">
                                                <!-- Start  Product Details Text Area-->
                                                <div class="product-details-text">
                                                    <h4 class="title">{{ $qv_pd->name }}</h4>
                                                    <div class="price">
                                                        <del>${{ $qv->price }}</del>-${{ $qv->discount }}</div>
                                                </div> <!-- End  Product Details Text Area-->
                                                <!-- Start Product Variable Area -->
                                                <div class="product-details-variable">
                                                    <!-- Product Variable Single Item -->
                                                    <div class="variable-single-item">
                                                        <span>Color</span>
                                                        <div class="product-variable-color">
                                                            <label for="modal-product-color-red">
                                                                <input name="modal-product-color"
                                                                    id="modal-product-color-red" class="color-select"
                                                                    type="radio" checked>
                                                                <span class="product-color-red" style="background: {{$qv->color_code}}"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!-- Product Variable Single Item -->
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <div class="variable-single-item ">
                                                            <span>Quantity</span>
                                                            <div class="product-variable-quantity">
                                                                <input min="1" max="10" value="1" type="number">
                                                            </div>
                                                        </div>

                                                        <div class="product-add-to-cart-btn">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#modalAddcart_{{ $qv_pd->id }}">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Variable Area -->
                                                <div class="modal-product-about-text">
                                                    <p>Apple Inc. designs, manufactures and markets smartphones, personal computers, tablets, wearables and accessories, and sells a variety of related services. The Company’s products include iPhone, Mac, iPad, and Wearables, Home and Accessories.</p>
                                                </div>
                                                <!-- Start  Product Details Social Area-->
                                                <div class="modal-product-details-social">
                                                    <span class="title">SHARE THIS PRODUCT</span>
                                                    <ul>
                                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                                        </li>
                                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                                        </li>
                                                        <li><a href="#" class="pinterest"><i
                                                                    class="fa fa-pinterest"></i></a></li>
                                                        <li><a href="#" class="google-plus"><i
                                                                    class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                                        </li>
                                                    </ul>

                                                </div> <!-- End  Product Details Social Area-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        @endforeach
        <!-- End Modal Quickview cart -->

        <!-- ::::::::::::::All JS Files here :::::::::::::: -->
        <!-- Global Vendor, plugins JS -->
        <script src="{{ url('public/client') }}/js/vendor/modernizr-3.11.2.min.js"></script>
        <script src="{{ url('public/client') }}/js/vendor/jquery-3.5.1.min.js"></script>
        <script src="{{ url('public/client') }}/js/vendor/jquery-migrate-3.3.0.min.js"></script>
        <script src="{{ url('public/client') }}/js/vendor/popper.min.js"></script>
        <script src="{{ url('public/client') }}/js/vendor/bootstrap.min.js"></script>
        <script src="{{ url('public/client') }}/js/vendor/jquery-ui.min.js"></script>

        <!--Plugins JS-->
        <script src="{{ url('public/client') }}/js/plugins/swiper-bundle.min.js"></script>
        <script src="{{ url('public/client') }}/js/plugins/material-scrolltop.js"></script>
        <script src="{{ url('public/client') }}/js/plugins/jquery.nice-select.min.js"></script>
        <script src="{{ url('public/client') }}/js/plugins/jquery.zoom.min.js"></script>
        <script src="{{ url('public/client') }}/js/plugins/venobox.min.js"></script>
        <script src="{{ url('public/client') }}/js/plugins/jquery.waypoints.js"></script>
        <script src="{{ url('public/client') }}/js/plugins/jquery.lineProgressbar.js"></script>
        <script src="{{ url('public/client') }}/js/plugins/aos.min.js"></script>
        <script src="{{ url('public/client') }}/js/plugins/jquery.instagramFeed.js"></script>
        <script src="{{ url('public/client') }}/js/plugins/ajax-mail.js"></script>


        <!-- Use the minified version files listed below for better performance and remove the files listed above -->
        <!-- <script src="{{ url('public/client') }}/js/vendor/vendor.min.js"></script>
        <script src="{{ url('public/client') }}/js/plugins/plugins.min.js"></script> -->

        <!-- Main JS -->
        <script src="{{ url('public/client') }}/js/main.js"></script>

        {{-- load js  --}}
        @yield('js')
        <!-- Swiper JS -->
        {{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}
        <script>
            // <!-- Initialize Swiper -->
            var swiper = new Swiper(".gallery_thumbs", {
                loop: true,
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".gallery_top", {
                loop: true,
                spaceBetween: 10,
                navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
                },
                thumbs: {
                swiper: swiper,
                },
            });
            
        </script>

    </body>

    <!-- Mirrored from htmldemo.hasthemes.com/hono/hono/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:32:12 GMT -->

    </html>
