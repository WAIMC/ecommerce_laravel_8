{{-- extends master layout --}}
@extends('layouts.client')

{{-- define item for master layout --}}
@section('title', 'Home')
@section('directory', 'Dashboard')
@section('action', 'Admin')


    {{-- main section for master layout --}}
@section('main')

    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach ($slider as $sli)
                    <!-- Start Hero Single Slider Item -->
                    <div class="hero-single-slider-item swiper-slide">
                        <!-- Hero Slider Image -->
                        <div class="hero-slider-bg">
                            <img src="{{ url('public/uploads/product/' . $sli->image) }}" alt="">
                        </div>
                        <!-- Hero Slider Content -->
                        <div class="hero-slider-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="hero-slider-content">
                                            <h4 class="subtitle">{{ $sli->subtitle }}</h4>
                                            <h1 class="title">{{ $sli->title_first }} <br> {{ $sli->title_second }} </h1>
                                            <a href="{{route('client.shop')}}" class="btn btn-lg btn-pink">shop now </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Hero Single Slider Item -->
                @endforeach
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-pink"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>
    <!-- End Hero Slider Section-->
    <!-- Start Service Section -->
    <div class="service-promo-section section-top-gap-100">
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="{{ url('public/client') }}/images/icons/service-promo-5.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">FREE SHIPPING</h6>
                                <p>Get 10% cash back, free shipping, free returns, and more at 1000+ top retailers!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="image">
                                <img src="{{ url('public/client') }}/images/icons/service-promo-6.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">30 DAYS MONEY BACK</h6>
                                <p>100% satisfaction guaranteed, or get your money back within 30 days!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="image">
                                <img src="{{ url('public/client') }}/images/icons/service-promo-7.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">SAFE PAYMENT</h6>
                                <p>Pay with the world???s most popular and secure payment methods.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="image">
                                <img src="{{ url('public/client') }}/images/icons/service-promo-8.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">LOYALTY CUSTOMER</h6>
                                <p>Card for the other 30% of their purchases at a rate of 1% cash back.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <a href="{{route('client.product_detail',2)}}">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img class="img-fluid" src="{{ url('public/client') }}/images/banner/banner-style-7-img-1.jpg"
                            alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="{{route('client.product_detail',2)}}">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="image">
                        <img class="img-fluid" src="{{ url('public/client') }}/images/banner/banner-style-7-img-2.jpg"
                            alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="{{route('client.product_detail',2)}}">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="image">
                        <img class="img-fluid" src="{{ url('public/client') }}/images/banner/banner-style-7-img-3.jpg"
                            alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">the New arrivals</h3>
                                <p>Preorder now to receive exclusive deals & gifts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    @foreach ($new_product as $np)
                                        <?php
                                            // using <?php ?.> because variable transmission value  will print value  to page html

                                            //get variant product representative, show all variant product with status == 0
                                            $variant_product_representative = $np->product_variantProduct()->where('status',0)->get();
                                        ?>

                                        {{-- // get value of object variant product, must foreach to get value because this is a object --}}
                                        @foreach ($variant_product_representative as $vpr)
                                            <!-- Start Product Default Single Item -->
                                            <div class="product-default-single-item product-color--pink swiper-slide">
                                                <div class="image-box">
                                                    <a href="{{route('client.product_detail',$np->id)}}" class="image-link">
                                                        <img src="{{ url('public/uploads/product/'.$np->image) }}"
                                                            alt="">
                                                        <img src="{{ url('public/uploads/product/'.$np->image) }}"
                                                            alt="">
                                                    </a>
                                                    <div class="tag">
                                                        <span>sale</span>
                                                    </div>
                                                    <div class="action-link">
                                                        <div class="action-link-left">
                                                            <a href="{{route('cart.store',['id_variant_product'=>$vpr->id, 'name'=>$np->name, 'price'=>$vpr->discount, 'quantity'=>1, 'color'=>$vpr->color, 'image'=>$np->image])}}">Add to Cart</a>
                                                        </div>
                                                        <div class="action-link-right">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview_{{$np->id}}">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                            <a href="{{route('client.storeWishlist',['id_variant_product'=>$vpr->id, 'name'=>$np->name, 'price'=>$vpr->discount, 'color'=>$vpr->color, 'image'=>$np->image])}}">
                                                                <i class="icon-heart"></i>
                                                            </a>
                                                            <a href=""><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-left">
                                                        <h6 class="title"><a href="{{route('client.product_detail',$np->id)}}">{{$np->name}}</a></h6>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="content-right">
                                                        <span class="price">${{$vpr->price}} - ${{$vpr->discount}}</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Product Default Single Item -->

                                        @endforeach

                                    @endforeach
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <a href="{{route('client.product_detail',2)}}">
                <div class="banner-single-item banner-style-8 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img class="img-fluid" src="{{ url('public/client') }}/images/banner/banner-style-8-img-1.jpg"
                            alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="{{route('client.product_detail',2)}}">
                <div class="banner-single-item banner-style-8 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="image">
                        <img class="img-fluid" src="{{ url('public/client') }}/images/banner/banner-style-8-img-2.jpg"
                            alt="">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-fluid section-inner-bg">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">BEST SELLERS</h3>
                                <p>Add our best sellers to your weekly lineup.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- End Product Default Single Item -->

                                    {{-- do everything looklike show product above, but name variable different --}}
                                    @foreach ($new_product as $np_sl)
                                        <?php
                                            $variantProductPresentative = $np_sl->product_variantProduct()->where('status',0)->get();
                                        ?>
                                        @foreach ($variantProductPresentative  as $vp_s)
                                            <!-- Start Product Default Single Item -->
                                            <div class="product-default-single-item product-color--pink swiper-slide">
                                                <div class="image-box">
                                                    <a href="{{route('client.product_detail',$np_sl->id)}}" class="image-link">
                                                        <img src="{{ url('public/uploads/product/',$np_sl->image) }}" alt="">
                                                        <img src="{{ url('public/uploads/product/',$np_sl->image) }}" alt="">
                                                    </a>
                                                    <div class="action-link">
                                                        <div class="action-link-left">
                                                            <a href="{{route('cart.store',['id_variant_product'=>$vp_s->id, 'name'=>$np_sl->name, 'price'=>$vp_s->discount, 'quantity'=>1, 'color'=>$vp_s->color, 'image'=>$np_sl->image])}}">
                                                                Add to Cart</a>
                                                        </div>
                                                        <div class="action-link-right">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview_{{$np_sl->id}}"><i
                                                                    class="icon-magnifier"></i></a>
                                                            <a href="{{route('client.storeWishlist',['id_variant_product'=>$vp_s->id, 'name'=>$np_sl->name, 'price'=>$vp_s->discount, 'color'=>$vp_s->color, 'image'=>$np_sl->image])}}"><i class="icon-heart"></i></a>
                                                            <a href=""><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-left">
                                                        <h6 class="title"><a href="{{route('client.product_detail',$np_sl->id)}}">{{$np_sl->name}}</a></h6>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="content-right">
                                                        <span class="price">${{$vp_s->discount}}</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Product Default Single Item -->

                                        @endforeach

                                    @endforeach

                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Blog Slider Section -->
    <div class="blog-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">THE LATEST BLOGS</h3>
                                <p>Present posts in a best way to highlight interesting moments of your blog.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="blog-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-default-slider default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container blog-slider">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    @foreach ($blog as $item_blog)
                                        <!-- Start Product Default Single Item -->
                                        <div class="blog-default-single-item blog-color--pink swiper-slide">
                                            <div class="image-box">
                                                <a href="{{route('client.blog_detail', $item_blog->id)}}" class="image-link">
                                                    <img class="img-fluid"
                                                        src="{{ url('public/uploads/product/'.$item_blog->image) }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="{{route('client.blog_detail', $item_blog->id)}}">{{$item_blog->title}}</a></h6>
                                                <p>{!! $item_blog->short_description !!}</p>
                                                <div class="inner">
                                                    <a href="{{route('client.blog_detail', $item_blog->id)}}"
                                                        class="read-more-btn icon-space-left">Read More <span><i
                                                                class="ion-ios-arrow-thin-right"></i></span></a>
                                                    <div class="post-meta">
                                                        <a href="#" class="date">{{ $item_blog->created_at->format('Y-m-d') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Default Single Item -->
                                    @endforeach
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Slider Section -->

    <!-- Start Company Logo Section -->
    <div class="company-logo-section section-top-gap-100 section-fluid">
        <div class="company-logo-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="company-logo-slider default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container company-logo-slider">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{ url('public/client') }}/images/company-logo/company-logo-1.png"
                                                alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{ url('public/client') }}/images/company-logo/company-logo-2.png"
                                                alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{ url('public/client') }}/images/company-logo/company-logo-3.png"
                                                alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{ url('public/client') }}/images/company-logo/company-logo-4.png"
                                                alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{ url('public/client') }}/images/company-logo/company-logo-5.png"
                                                alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{ url('public/client') }}/images/company-logo/company-logo-6.png"
                                                alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{ url('public/client') }}/images/company-logo/company-logo-7.png"
                                                alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{ url('public/client') }}/images/company-logo/company-logo-8.png"
                                                alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev d-none d-md-block"></div>
                            <div class="swiper-button-next d-none d-md-block"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Company Logo Section -->
@stop

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
    {{-- js here --}}
  
@stop
