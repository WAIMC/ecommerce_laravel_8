{{-- extends master layout --}}
@extends('layouts.client')

{{-- define item for master layout --}}
@section('title', 'Shop')
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
                        <h3 class="breadcrumb-title">Shop - Welcome To Hono</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">Shop</a></li>
                                    <li class="active" aria-current="page">Shop Hono</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up"  data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget" >
                            <h6 class="sidebar-title">CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    <li ><a href="?searchCategory=">ALL</a></li>
                                    @foreach ($category as $cats)
                                        @if ($cats->categoryChildren->count()==0)
                                            <li ><a href="?searchCategory={{$cats->id}}">{{$cats->name}}</a></li>
                                        @else
                                            <li>
                                                <ul class="sidebar-menu-collapse">
                                                    <!-- Start Single Menu Collapse List -->
                                                    <li class="sidebar-menu-collapse-list">
                                                        <div class="accordion">
                                                            <a href="#" class="accordion-title collapsed" data-bs-toggle="collapse" data-bs-target="#{{$cats->name}}-fashion" aria-expanded="false"> {{$cats->name}} <i class="ion-ios-arrow-right"></i></a>
                                                            <div id="{{$cats->name}}-fashion" class="collapse">
                                                                <ul class="accordion-category-list">
                                                                    @foreach ($cats->categoryChildren as $chil)
                                                                        <li><a href="#">{{$chil->name}}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li> <!-- End Single Menu Collapse List -->
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">FILTER BY PRICE</h6>
                            <form action="">
                                <div class="sidebar-content">
                                    <div class="row">
                                        <div class="col-9">
                                            <div id="slider-range"></div>
                                            <div class="filter-type-price">
                                                <label for="amount">Price range:</label>
                                                <input type="text" id="amount">
                                                <input type="hidden" name="start_price" value="" id="start_price">
                                                <input type="hidden" name="end_price" value="" id="end_price">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="d-flex align-content-start">
                                                <button type="submit" class="btn btn-secondary">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">MANUFACTURER</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                <input type="checkbox" id="brakeParts" checked>
                                                <span>Apple(12)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="accessories">
                                                <input type="checkbox" disabled id="accessories">
                                                <span>Sony (0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="EngineParts">
                                                <input type="checkbox" disabled id="EngineParts">
                                                <span>Samsung (0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="hermes">
                                                <input type="checkbox" disabled id="hermes">
                                                <span>Nokia (0)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">SELECT BY COLOR</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="black">
                                                <input type="checkbox" id="black">
                                                <span>Black (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="blue">
                                                <input type="checkbox" id="blue">
                                                <span>Blue (8)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brown">
                                                <input type="checkbox" id="brown">
                                                <span>Brown (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="Green">
                                                <input type="checkbox" id="Green">
                                                <span>Green (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="pink">
                                                <input type="checkbox" id="pink">
                                                <span>Pink (4)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Tag products</h6>
                            <div class="sidebar-content">
                                <div class="tag-link">
                                    @foreach ($category as $ctgr)
                                        @if ($ctgr->categoryChildren->count()==0)
                                            <a href="?searchCategory={{$ctgr->id}}">{{$ctgr->slug}}</a>
                                        @else
                                            @foreach ($ctgr->categoryChildren as $children)
                                                <a href="?searchCategory={{$children->id}}">{{$children->slug}}</a>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <div class="sidebar-content">
                                <a href="{{route('client.product_detail',2)}}" class="sidebar-banner img-hover-zoom">
                                    <img class="img-fluid" src="{{ url('public/client') }}/images/banner/side-banner.jpg" alt="">
                                </a>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column" data-aos="fade-up"  data-aos-delay="0">
                                    <!-- Start Sort tab Button -->
                                    <div class="sort-tablist d-flex align-items-center">
                                        <ul class="tablist nav sort-tab-btn">
                                            <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-3-grid"><img src="{{ url('public/client') }}/images/icons/bkg_grid.png" alt=""></a></li>
                                            <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list"><img src="{{ url('public/client') }}/images/icons/bkg_list.png" alt=""></a></li>
                                        </ul>

                                        <!-- Start Page Amount -->
                                        <div class="page-amount ml-2">
                                            <span>Showing 1–9 of {{$product->count()}} results</span>
                                        </div> <!-- End Page Amount -->
                                    </div> <!-- End Sort tab Button -->

                                    <!-- Start Sort Select Option -->
                                    <div class="sort-select-list d-flex align-items-center">
                                        <label class="mr-2">Sort By:</label>
                                        <form id="soft_paginate">
                                            <fieldset>
                                                <select name="softBy" id="softBy">
                                                    <option value="DESC">Soft by z->a</option>
                                                    <option value="ASC">Soft by a->z</option>
                                                    <option value="DESC">Sort by newness</option>
                                                </select>
                                            </fieldset>
                                        </form>
                                    </div> <!-- End Sort Select Option -->

                                    

                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                                @foreach ($data_product as $pd)

                                                    <?php
                                                        $start_price = isset(request()->start_price) ? request()->start_price : 0;
                                                        $end_price = isset(request()->end_price) ? request()->end_price : 2000;
                                                        $variant_product_presentative = $pd->product_variantProduct()->where('status',0)->get();
                                                    ?>

                                                    @foreach ($variant_product_presentative as $vpp)
                                                        @if ($vpp->discount >= $start_price && $vpp->discount <= $end_price)
                                                            
                                                            <div class="col-xl-4 col-sm-6 col-12">
                                                                <!-- Start Product Default Single Item -->
                                                                <div class="product-default-single-item product-color--golden" data-aos="fade-up"  data-aos-delay="0">
                                                                    <div class="image-box">
                                                                        <a href="{{route('client.product_detail',$pd->id)}}" class="image-link">
                                                                            <img src="{{ url('public/uploads/product/',$pd->image) }}" alt="">
                                                                            <img src="{{ url('public/uploads/product/',$pd->image) }}" alt="">
                                                                        </a>
                                                                        <div class="action-link">
                                                                            <div class="action-link-left">
                                                                                <a href="{{route('cart.store',['id_variant_product'=>$vpp->id, 'name'=>$pd->name, 'price'=>$vpp->discount, 'quantity'=>1, 'color'=>$vpp->color, 'image'=>$pd->image])}}">Add to Cart</a>
                                                                            </div>
                                                                            <div class="action-link-right">
                                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview_{{$pd->id}}"><i class="icon-magnifier"></i></a>
                                                                                <a href="{{route('client.storeWishlist',['id_variant_product'=>$vpp->id, 'name'=>$pd->name, 'price'=>$vpp->discount, 'color'=>$vpp->color, 'image'=>$pd->image])}}"><i class="icon-heart"></i></a>
                                                                                <a href=""><i class="icon-shuffle"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="content">
                                                                        <div class="content-left">
                                                                            <h6 class="title"><a href="{{route('client.product_detail',$pd->id)}}">{{$pd->name}}</a></h6>
                                                                            <ul class="review-star">
                                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                                <li class="empty"><i class="ion-android-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="content-right">
                                                                            <span class="price">${{$vpp->discount}}</span>
                                                                        </div>
                            
                                                                    </div>
                                                                </div>
                                                                <!-- End Product Default Single Item -->
                                                            </div>      
                                                        @endif
                                                    @endforeach
                                                    
                                                @endforeach
                                                
                                            </div>
                                        </div> <!-- End Grid View Product -->
                                        <!-- Start List View Product -->
                                        <div class="tab-pane sort-layout-single" id="layout-list">
                                            <div class="row">
                                                @foreach ($data_product as $pd_t)

                                                    <?php
                                                        $variant_product_presentative = $pd_t->product_variantProduct()->where('status',0)->get();
                                                    ?>

                                                    @foreach ($variant_product_presentative as $vpp_t)
                                                        
                                                        <div class="col-12">
                                                            <!-- Start Product Defautlt Single -->
                                                            <div class="product-list-single product-color--golden">
                                                                <a href="{{route('client.product_detail',$pd_t->id)}}" class="product-list-img-link">
                                                                    <img class="img-fluid" src="{{ url('public/uploads/product/',$pd_t->image) }}" alt="">
                                                                    <img class="img-fluid" src="{{ url('public/uploads/product/',$pd_t->image) }}" alt="">
                                                                </a>
                                                                <div class="product-list-content">
                                                                    <h5 class="product-list-link"><a href="{{route('client.product_detail',$pd_t->id)}}">{{$pd_t->name}}</a></h5>
                                                                    <ul class="review-star">
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                                    </ul>
                                                                    <span class="product-list-price"><del>${{$vpp_t->price}}</del> ${{$vpp_t->discount}}</span>
                                                                    <p>Apple Inc. designs, manufactures and markets smartphones, personal computers, tablets, wearables and accessories, and sells a variety of related services. The Company’s products include iPhone, Mac, iPad, and Wearables, Home and Accessories.</p>
                                                                    <div class="product-action-icon-link-list">
                                                                        <a href="{{route('cart.store',['id_variant_product'=>$vpp_t->id, 'name'=>$pd_t->name, 'price'=>$vpp_t->discount, 'quantity'=>1, 'color'=>$vpp_t->color, 'image'=>$pd_t->image])}}" class="btn btn-lg btn-black-default-hover">Add to Cart</a>
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview_{{$pd_t->id}}" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                                        <a href="{{route('client.storeWishlist',['id_variant_product'=>$vpp_t->id, 'name'=>$pd_t->name, 'price'=>$vpp_t->discount, 'color'=>$vpp_t->color, 'image'=>$pd_t->image])}}" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                                        <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- End Product Defautlt Single -->
                                                        </div>

                                                    @endforeach
                                                    
                                                @endforeach
                                                
                                            </div>
                                        </div> <!-- End List View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->

                    <!-- Start Pagination -->
                    <div class="page-pagination text-center" data-aos="fade-up"  data-aos-delay="0">
                        {{ $data_product->appends(request()->all())->links() }}
                        {{-- <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                        </ul> --}}
                    </div> <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->

@stop

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
    {{-- js here --}}
    <script>
        $(function () {
            $('#slider-range').slider({
                range: true,
                min: 0,
                max: 2000,
                values: [0, 2000],
                create: function() {
                    $("#amount").val("$0 - $2000");
                },
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                    var mi = ui.values[0];
                    var mx = ui.values[1];
                    $('#start_price').val(ui.values[0]);
                    $('#end_price').val(ui.values[1]);
                }
            })
        });
    </script>
    <script>
        $('#softBy').change(function (e) { 
            e.preventDefault();
            var _select = $('select#softBy').val();
            $('form#soft_paginate').submit();
        });
    </script>
@stop
