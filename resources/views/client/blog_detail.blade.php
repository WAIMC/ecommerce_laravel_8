{{-- extends master layout --}}
@extends('layouts.client')

{{-- define item for master layout --}}
@section('title', 'Blog Detail')
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
                                    <li><a href="{{route('client.index')}}">Home</a></li>
                                    <li><a href="{{route('client.blog')}}">Blog</a></li>
                                    <li class="active" aria-current="page">Blog {{$blog_detail->title}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Blog Single Section:::... -->
    <div class="blog-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row-reverse">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up"  data-aos-delay="0">

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
                                                   <a href="shop-grid-sidebar-left.html"  class="accordion-title collapsed" data-bs-toggle="collapse" data-bs-target="#men-fashion" aria-expanded="false">Men <i class="ion-ios-arrow-right"></i></a>
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
                    <!-- Start Blog Single Content Area -->
                    <div class="blog-single-wrapper">
                        <div class="blog-single-img" data-aos="fade-up"  data-aos-delay="0">
                            <img class="img-fluid" src="{{url('public/uploads/product/'. $blog_detail->image)}}" alt="">
                        </div>
                        <ul class="post-meta" data-aos="fade-up"  data-aos-delay="200">
                            <li>POSTED BY : <a href="#" class="author"> {{$blog_detail->author}} </a></li> 
                            <li>ON : <a href="#" class="date"> {{$blog_detail->created_at->format('Y-m-d')}} </a></li> 
                         </ul>
                        <h4 class="post-title" data-aos="fade-up"  data-aos-delay="400"> {{$blog_detail->title}} </h4>
                        <div class="para-content" data-aos="fade-up"  data-aos-delay="600">
                            {!!$blog_detail->description!!}
                        </div>
                        <div class="para-tags" data-aos="fade-up"  data-aos-delay="0">
                            <span>Tags: </span>
                            <ul>
                                <li><a href="#">fashion</a></li>
                                <li><a href="#">t-shirt</a></li>
                                <li><a href="#">white</a></li>
                            </ul>
                        </div>
                    </div> <!-- End Blog Single Content Area -->
                    <div class="comment-area">
                        <div class="comment-box" data-aos="fade-up"  data-aos-delay="0">
                            <h4 class="title mb-4">3 Comments</h4>
                            <!-- Start - Review Comment -->
                            <ul class="comment">
                                <!-- Start - Review Comment list-->
                                <li class="comment-list">
                                    <div class="comment-wrapper">
                                        <div class="comment-img">
                                            <img src="{{url('public/client/')}}/images/user/image-1.png" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-content-top">
                                                <div class="comment-content-left">
                                                    <h6 class="comment-name">Kaedyn Fraser</h6>
                                                </div>
                                                <div class="comment-content-right">
                                                    <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                </div>
                                            </div>

                                            <div class="para-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start - Review Comment Reply-->
                                    <ul class="comment-reply">
                                        <li class="comment-reply-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="{{url('public/client/')}}/images/user/image-2.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name">Oaklee Odom</h6>
                                                        </div>
                                                        <div class="comment-content-right">
                                                            <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>

                                                    <div class="para-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul> <!-- End - Review Comment Reply-->
                                </li> <!-- End - Review Comment list-->
                                <!-- Start - Review Comment list-->
                                <li class="comment-list">
                                    <div class="comment-wrapper">
                                        <div class="comment-img">
                                            <img src="{{url('public/client/')}}/images/user/image-3.png" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-content-top">
                                                <div class="comment-content-left">
                                                    <h6 class="comment-name">Jaydin Jones</h6>
                                                </div>
                                                <div class="comment-content-right">
                                                    <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                </div>
                                            </div>

                                            <div class="para-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                            </div>
                                        </div>
                                    </div>
                                </li> <!-- End - Review Comment list-->
                            </ul> <!-- End - Review Comment -->
                        </div>

                        <!-- Start comment Form -->
                        <div class="comment-form" data-aos="fade-up"  data-aos-delay="0">
                            <div class="coment-form-text-top mt-30">
                                <h4 class="title mb-3 mt-3">Leave a Reply</h4>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="default-form-box mb-20">
                                            <label for="comment-name">Your name <span>*</span></label>
                                            <input id="comment-name" type="text" placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="default-form-box mb-20">
                                            <label for="comment-email">Your Email <span>*</span></label>
                                            <input id="comment-email" type="email" placeholder="Enter your email" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="default-form-box mb-20">
                                            <label for="comment-review-text">Your review <span>*</span></label>
                                            <textarea id="comment-review-text" placeholder="Write a review" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-md btn-golden" type="submit">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- End comment Form -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Blog Single Section:::... -->

@stop

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
    {{-- js here --}}
@stop
