{{-- extends master layout --}}
@extends('layouts.client')

{{-- define item for master layout --}}
@section('title', 'Blog')
@section('directory', 'Dashboard')
@section('action', 'Admin')


    {{-- main section for master layout --}}
@section('main')

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Blog - </h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="blog-grid-sidebar-left.html">Blog</a></li>
                                    <li class="active" aria-current="page">Blog Grid Left Sidebar</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Blog List Section:::... -->
    <div class="blog-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row-reverse">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section"  data-aos="fade-up"  data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget" >
                            <h6 class="sidebar-title">Search</h6>
                            <div class="default-search-style d-flex">
                                <input class="default-search-style-input-box" type="search" placeholder="Search..." required>
                                <button class="default-search-style-input-btn" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget" >
                            <h6 class="sidebar-title">CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                   <li ><a href="#">Audio</a></li>
                                   <li ><a href="#">Company</a></li>   
                                   <li ><a href="#">Gallery</a></li>   
                                   <li ><a href="#">Other</a></li>   
                                   <li ><a href="#">Travel</a></li>   
                                   <li ><a href="#"> Uncategorized</a></li>   
                                   <li ><a href="#"> Video</a></li>   
                                   <li ><a href="#">Wordpress</a></li>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Tags</h6>
                            <div class="sidebar-content">
                                <div class="tag-link">
                                    <a href="#">Technology</a>
                                    <a href="#">Information</a>
                                    <a href="#">Wordpress</a>
                                    <a href="#">Devs</a>
                                    <a href="#">Program</a>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget --> 
                        <div class="sidebar-single-widget" >
                            <h6 class="sidebar-title">Meta</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                   <li ><a href="#">Log in</a></li>
                                   <li ><a href="#">Entries feed</a></li>   
                                   <li ><a href="#">Comments feed</a></li>   
                                   <li ><a href="#">WordPress.org</a></li>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget" >
                            <h6 class="sidebar-title">PRODUCT CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    <li>
                                        <ul class="sidebar-menu-collapse">
                                            <!-- Start Single Menu Collapse List -->
                                           <li class="sidebar-menu-collapse-list">
                                               <div class="accordion">
                                                   <a href="#" class="accordion-title collapsed" data-bs-toggle="collapse" data-bs-target="#men-fashion" aria-expanded="false">Men <i class="ion-ios-arrow-right"></i></a>
                                                   <div id="men-fashion" class="collapse">
                                                       <ul class="accordion-category-list">
                                                           <li><a href="#">Dresses</a></li>
                                                           <li><a href="#">Jackets &amp; Coats</a></li>
                                                           <li><a href="#">Sweaters</a></li>
                                                           <li><a href="#">Jeans</a></li>
                                                           <li><a href="#">Blouses &amp; Shirts</a></li>
                                                       </ul>
                                                   </div>
                                               </div>
                                           </li> <!-- End Single Menu Collapse List -->
                                       </ul>
                                    </li>
                                   <li ><a href="#">Football</a></li>   
                                   <li ><a href="#"> Men's</a></li>   
                                   <li ><a href="#"> Portable Audio</a></li>   
                                   <li ><a href="#"> Smart Watches</a></li>   
                                   <li ><a href="#">Tennis</a></li>   
                                   <li ><a href="#"> Uncategorized</a></li>   
                                   <li ><a href="#"> Video Games</a></li>   
                                   <li ><a href="#">Women's</a></li>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <div class="blog-wrapper">
                        <div class="row mb-n6">
                            <div class="col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden"  data-aos="fade-up"  data-aos-delay="0">
                                    <div class="image-box">
                                        <a href="blog-single-sidebar-left.html" class="image-link">
                                            <img class="img-fluid" src="{{ url('public/client') }}/images/blog/blog-grid-home-1-img-1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                           <li>POSTED BY : <a href="#" class="author">Admin</a></li> 
                                           <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li> 
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog image post</a></h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                            <div class="col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden"  data-aos="fade-up"  data-aos-delay="200">
                                    <div class="blog-list-slider-arrow">
                                        <!-- Slider main container -->
                                        <div class="blog-list-slider swiper-container">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper">
                                                <!-- Slides -->
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"  src="{{ url('public/client') }}/images/blog/blog-grid-home-1-img-4.jpg" alt=""></div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"  src="{{ url('public/client') }}/images/blog/blog-grid-home-1-img-2.jpg" alt=""></div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"  src="{{ url('public/client') }}/images/blog/blog-grid-home-1-img-3.jpg" alt=""></div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"  src="{{ url('public/client') }}/images/blog/blog-grid-home-1-img-1.jpg" alt=""></div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"  src="{{ url('public/client') }}/images/blog/blog-grid-home-1-img-5.jpg" alt=""></div>
                                            </div>

                                            <!-- If we need navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                           <li>POSTED BY : <a href="#" class="author">Admin</a></li> 
                                           <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li> 
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog Slider post</a></h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                            <div class="col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden"  data-aos="fade-up"  data-aos-delay="0">
                                    <div class="blog-video-box">
                                        <img class="img-fluid" src="{{ url('public/client') }}/images/blog/blog-grid-home-1-img-5.jpg" alt="">
                                        <a href="https://youtu.be/MKjhBO2xQzg" class="video-play-btn" data-autoplay="true" data-vbtype="video">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>  
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                           <li>POSTED BY : <a href="#" class="author">Admin</a></li> 
                                           <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li> 
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog video post</a></h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                            <div class="col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden"  data-aos="fade-up"  data-aos-delay="200">
                                    <div class="image-box">
                                        <a href="blog-single-sidebar-left.html" class="image-link">
                                            <img class="img-fluid" src="{{ url('public/client') }}/images/blog/blog-grid-home-1-img-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                           <li>POSTED BY : <a href="#" class="author">Admin</a></li> 
                                           <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li> 
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog image post</a></h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                            <div class="col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden"  data-aos="fade-up"  data-aos-delay="0">
                                    <div class="image-box">
                                        <a href="blog-single-sidebar-left.html" class="image-link">
                                            <img class="img-fluid" src="{{ url('public/client') }}/images/blog/blog-grid-home-1-img-5.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                           <li>POSTED BY : <a href="#" class="author">Admin</a></li> 
                                           <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li> 
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog image post</a></h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                            <div class="col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden"  data-aos="fade-up"  data-aos-delay="200">
                                    <div class="blog-audio-box">
                                        <iframe class="embed-responsive-item" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/182537870&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                           <li>POSTED BY : <a href="#" class="author">Admin</a></li> 
                                           <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li> 
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog Audio post</a></h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                        </div>
                    </div>

                    <!-- Start Pagination -->
                    <div class="page-pagination text-center" data-aos="fade-up"  data-aos-delay="0">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                        </ul>
                    </div> <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Blog List Section:::... -->

@stop

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
    {{-- js here --}}
@stop
