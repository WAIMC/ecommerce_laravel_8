{{-- extends master layout --}}
@extends('layouts.client')

{{-- define item for master layout --}}
@section('title', 'Product')
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
                        <h3 class="breadcrumb-title">Product Details - HONO</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">Shop</a></li>
                                    <li class="active" aria-current="page">Product Details</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->



    @if ($valid_product)

        <?php
        $variant_product = $product_dt->product_variantProduct()->get();
        // get name category of product
        $name_category = $product_dt
            ->product_category()
            ->where('id', $product_dt->id_category)
            ->get();
        foreach ($name_category as $key => $value) {
            $name_ct = $value->name;
        }
        ?>
        <!-- Start Product Details Section -->
        <div class="product-details-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                            <!-- Start Large Image product-large-image product-large-image-horaizontal-->
                            <div class=" swiper-container mySwiper2">
                                <div class="swiper-wrapper" id="show_gallery_Large">
                                    {{-- <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                        <img src="assets/images/product/default/home-1/default-1.jpg" alt="">
                                    </div> --}}
                                </div>
                            </div>
                            <!-- End Large Image -->
                            <!-- Start Thumbnail Image product-image-thumb product-image-thumb-horizontal-->
                            <div class=" swiper-container pos-relative mt-5 mySwiper">
                                <div class="swiper-wrapper" id="show_gallery_thumb">
                                    {{-- <div class="product-image-thumb-single swiper-slide">
                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-1.jpg"
                                            alt="">
                                    </div> --}}
                                </div>
                                <!-- Add Arrows -->
                                <div class="gallery-thumb-arrow swiper-button-next"></div>
                                <div class="gallery-thumb-arrow swiper-button-prev"></div>
                            </div>
                            <!-- End Thumbnail Image -->
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                            data-aos-delay="200">
                            <!-- Start  Product Details Text Area-->
                            <div class="product-details-text">
                                <h4 class="title">{{ $product_dt->name }}</h4>
                                <div class="d-flex align-items-center">
                                    <div id="rateYo_review"></div>
                                    <a href="#" class="customer-review ml-2">(customer review )</a>
                                </div>
                                <div id="price" class="price"></div>
                                <p>Apple Inc. designs, manufactures and markets smartphones, personal computers, tablets,
                                    wearables and accessories, and sells a variety of related services. The Company’s
                                    products include iPhone, Mac, iPad, and Wearables, Home and Accessories.</p>
                            </div> <!-- End  Product Details Text Area-->
                            <!-- Start Product Variable Area -->
                            <div class="product-details-variable">
                                <h4 class="title">Available Options</h4>
                                <!-- Product Variable Single Item -->
                                <div class="variable-single-item">
                                    <div class="product-stock"> <span class="product-stock-in"><i
                                                class="ion-checkmark-circled"></i></span><span id="quantity_product"></span>
                                    </div>
                                </div>
                                <!-- Product Variable Single Item -->
                                <div class="variable-single-item">
                                    <span>Color</span>
                                    <div class="product-variable-color">
                                        @foreach ($variant_product as $color)
                                            <label for="product-color-{{ $color->color }}">
                                                <input name="color"  value="{{ $color->id }}" id="product-color-{{ $color->color }}"
                                                    class="color-select" type="radio" @if ($color->status == 0) checked @endif>
                                                <span class="product-color-{{ $color->color }}"
                                                    style="background:{{ $color->color_code }}"></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Product Variable Single Item -->
                                <div class="d-flex align-items-center ">
                                    <form action="{{route('cart.store')}}" method="post" id="formAddCart">
                                        @csrf
                                        <input type="hidden" id="addCartID" name="id_variant_product" value="">
                                        <input type="hidden" id="addCartName" name="name" value="">
                                        <input type="hidden" id="addCartPrice" name="price" value="">
                                        <input type="hidden" id="addCartColor" name="color" value="">
                                        <input type="hidden" id="addCartImage" name="image" value="">
                                        <div class="variable-single-item ">
                                            <span>Quantity</span>
                                            <div class="product-variable-quantity">
                                                <input min="1" max="10" value="1" id="addCartQuantity" name="quantity" type="number">
                                            </div>
                                        </div>
    
                                        <div class="product-add-to-cart-btn">
                                           
                                                <button style="display: inline-block;
                                                font-size: 16px;
                                                background: #24262b;
                                                height: 50px;
                                                line-height: 50px;
                                                text-transform: uppercase;
                                                text-align: center;
                                                color: #fff;
                                                border-radius: 3px;
                                                margin-top: 7px;
                                                font-weight: 700;
                                                padding: 0 50px;"  id="submitAddCart" > + Add to Cart</button>
                                            
                                        </div>
                                    </form>
                                    
                                </div>
                                <!-- Start  Product Details Meta Area-->
                                <div class="product-details-meta mb-20">
                                    <a href="" class="icon-space-right"><i class="icon-heart"></i>Add to
                                        wishlist</a>
                                    <a href="" class="icon-space-right"><i class="icon-refresh"></i>Compare</a>
                                </div> <!-- End  Product Details Meta Area-->
                            </div> <!-- End Product Variable Area -->

                            <!-- Start  Product Details Catagories Area-->
                            <div class="product-details-catagory mb-2">
                                <span class="title">CATEGORIES:</span>
                                <ul>
                                    <li><a href="#">{{ $name_ct }}</a></li>
                                </ul>
                            </div> <!-- End  Product Details Catagories Area-->


                            <!-- Start  Product Details Social Area-->
                            <div class="product-details-social">
                                <span class="title">SHARE THIS PRODUCT:</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div> <!-- End  Product Details Social Area-->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Product Details Section -->

        <!-- Start Product Content Tab Section -->
        <div class="product-details-content-tab-section section-top-gap-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-details-content-tab-wrapper" data-aos="fade-up" data-aos-delay="0">

                            <!-- Start Product Details Tab Button -->
                            <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                                <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                        Description
                                    </a></li>
                                <li><a class="nav-link" data-bs-toggle="tab" href="#specification">
                                        Specification
                                    </a></li>
                                <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                        Reviews ({{$product_dt->product_review()->count()}})
                                    </a></li>
                            </ul> <!-- End Product Details Tab Button -->

                            <!-- Start Product Details Tab Content -->
                            <div class="product-details-content-tab">
                                <div class="tab-content">
                                    <!-- Start Product Details Tab Content Singel -->
                                    <div class="tab-pane " id="description">
                                        <div class="single-tab-content-item">
                                            <p>{!! $product_dt->description !!}</p>
                                        </div>
                                    </div> <!-- End Product Details Tab Content Singel -->
                                    <!-- Start Product Details Tab Content Singel -->
                                    <div class="tab-pane" id="specification">
                                        <div class="single-tab-content-item">
                                            <table class="table table-bordered mb-20">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Compositions</th>
                                                        <td>Apple</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Styles</th>
                                                        <td>luxury, modern</td>
                                                    <tr>
                                                        <th scope="row">Properties</th>
                                                        <td>
                                                            @foreach ($variant_product as $color)
                                                                {{ $color->color }} |
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p>Apple Inc. designs, manufactures and markets smartphones, personal computers,
                                                tablets, wearables and accessories, and sells a variety of related services.
                                                The Company’s products include iPhone, Mac, iPad, and Wearables, Home and
                                                Accessories.</p>
                                        </div>
                                    </div> <!-- End Product Details Tab Content Singel -->
                                    <!-- Start Product Details Tab Content Singel -->
                                    <div class="tab-pane active show" id="review">
                                        <div class="single-tab-content-item">
                                            <!-- Start - Review Comment -->
                                            <ul class="comment">

                                                <?php
                                                 $comments =  $product_dt->product_review()->get();
                                                ?>
                                                @foreach ($comments as $comm)
                                                    @if ($comm->status==0)
                                                            
                                                        <?php  
                                                            $user_comment = $comm->review_user()->get();
                                                        ?>
                                                        @foreach ($user_comment as $user_name)
                                                            <!-- Start - Review Comment list-->
                                                            <li class="comment-list">
                                                                <div class="comment-wrapper">
                                                                    <div class="comment-img">
                                                                        <img src="{{url('public/uploads/product/image_user')}}/user1.jpg" alt="">
                                                                    </div>
                                                                    <div class="comment-content">
                                                                        <div class="comment-content-top">
                                                                            <div class="comment-content-left">
                                                                                <h6 class="comment-name">{{$user_name->name}}</h6>
                                                                                <ul class="review-star">
                                                                                    <li @if ($comm->rating_star>=1)
                                                                                        class="fill"
                                                                                        @else
                                                                                        class="empty"
                                                                                        @endif><i class="ion-android-star"></i>
                                                                                    </li>
                                                                                    <li @if ($comm->rating_star>=2)
                                                                                        class="fill"
                                                                                        @else
                                                                                        class="empty"
                                                                                        @endif><i class="ion-android-star"></i>
                                                                                    </li>
                                                                                    <li @if ($comm->rating_star>=3)
                                                                                        class="fill"
                                                                                        @else
                                                                                        class="empty"
                                                                                        @endif><i class="ion-android-star"></i>
                                                                                    </li>
                                                                                    <li @if ($comm->rating_star>=4)
                                                                                        class="fill"
                                                                                        @else
                                                                                        class="empty"
                                                                                        @endif><i class="ion-android-star"></i>
                                                                                    </li>
                                                                                    <li @if ($comm->rating_star>=5)
                                                                                        class="fill"
                                                                                        @else
                                                                                        class="empty"
                                                                                        @endif><i class="ion-android-star"></i>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="comment-content-right">
                                                                                <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="para-content">
                                                                            <p>{{$comm->comment}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li> <!-- End - Review Comment list-->
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                
                                                    
                                            </ul> <!-- End - Review Comment -->
                                            <div class="review-form">
                                                <div class="review-form-text-top">
                                                    <h5>ADD A REVIEW</h5>
                                                    <p id="mess_review"></p>
                                                    <p>Your email address will not be published. Required fields are marked
                                                        *</p>
                                                </div>

                                                @if (Session::has('customer'))
                                                    <form id="form_review">
                                                        @csrf
                                                        <input type="hidden" name="rating_star" id="rating_star">
                                                        <input type="hidden" name="id_customer" id="" value="{{Session::get('customer')['id']}}">
                                                        <input type="hidden" name="id_comment_product" id="id_comment_product" value="{{ $product_dt->id }}">
                                                        <div id="rateYo"></div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="default-form-box">
                                                                    <label for="comment-name">Your name <span>*</span> <strong>{{Session::get('customer')['name']}}</strong> </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="default-form-box">
                                                                    <label for="comment-email">Your Email <span>*</span> <strong>{{Session::get('customer')['email']}}</strong></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="default-form-box">
                                                                    <label for="comment-review-text">Your reviews
                                                                        <span>*</span></label>
                                                                    <textarea id="comment-review-text" name="comment"
                                                                        placeholder="Write a review" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button id="send_review" class="btn btn-md btn-black-default-hover"
                                                                    type="button">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    <h1 class="text-danger"> Please login before reviews product .</h1>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div> <!-- End Product Details Tab Content Singel -->
                                </div>
                            </div> <!-- End Product Details Tab Content -->

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Product Content Tab Section -->
    @else
        <h1>emty product or product count limit passed</h1>
        <p>pls click another one below here </p>
    @endif



    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">RELATED PRODUCTS</h3>
                                <p>Browse the collection of our related products.</p>
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

                                    <!-- Start Product Default Single Item -->
                                    @foreach ($product as $related_pd)
                                        <?php
                                        $get_price = $related_pd
                                            ->product_variantProduct()
                                            ->where('status', 0)
                                            ->get();
                                        ?>
                                        <div class="product-default-single-item product-color--golden swiper-slide">
                                            <div class="image-box">
                                                <a href="{{ route('client.product_detail', $related_pd->id) }}"
                                                    class="image-link">
                                                    <img src="{{ url('public/uploads/product', $related_pd->image) }}"
                                                        alt="">
                                                    <img src="{{ url('public/uploads/product', $related_pd->image) }}"
                                                        alt="">
                                                </a>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        @foreach ($get_price as $add_c)
                                                        <a href="{{route('cart.store',['id_variant_product'=>$add_c->id, 'name'=>$related_pd->name, 'price'=>$add_c->discount, 'quantity'=>1, 'color'=>$add_c->color, 'image'=>$related_pd->image])}}">Add to Cart</a>
                                                        @endforeach
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalQuickview_{{ $related_pd->id }}"><i
                                                                class="icon-magnifier"></i></a>
                                                        <a href="{{route('client.storeWishlist',['id_variant_product'=>$add_c->id, 'name'=>$related_pd->name, 'price'=>$add_c->discount, 'color'=>$add_c->color, 'image'=>$related_pd->image])}}"><i class="icon-heart"></i></a>
                                                        <a href=""><i class="icon-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title"><a
                                                            href="{{ route('client.product_detail', $related_pd->id) }}">{{ $related_pd->name }}</a>
                                                    </h6>
                                                    <ul class="review-star">
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="content-right">
                                                    @foreach ($get_price as $sa)
                                                        <span
                                                            class="price"><del>${{ $sa['price'] }}</del>-${{ $sa->discount }}</span>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- End Product Default Single Item -->
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

    <div id="show_gallery_Large"></div>
@stop

{{-- customize load css and js for master layout --}}
@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

@stop
@section('js')

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        // send review
        $('#send_review').click(function (e) { 
                e.preventDefault();
                var rating_star = $('input[name="rating_star"]').val();
                var id_customer = $('input[name="id_customer"]').val();
                var id_product = $('#id_comment_product').val();
                var comment = $('textarea#comment-review-text').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('customer.review') }}",
                    data: {
                        rating_star:rating_star, 
                        id_customer:id_customer, 
                        id_product:id_product, 
                        comment:comment,  
                        _token:$('input[name="_token"]').val()
                        },
                    success: function (response) {
                        alert(response);
                        $('#id_comment_product').val('');
                    },
                    error:function(error){
                        console.log(JSON.stringify(error));
                    }
                });
            });


        // *************    rating star       ***********
        $(function () {
 
            var avg_star = {!! json_encode($avg_star) !!};
            $("#rateYo_review").rateYo({
            starWidth: "40px",
            normalFill: "#A0A0A0",
            ratedFill: "#FFFF00",
            rating: avg_star,
            halfStar: true
            });
            
            
            $("#rateYo").rateYo({
            starWidth: "40px",
            normalFill: "#A0A0A0",
            ratedFill: "#FFFF00"
            }).on("rateyo.set", function (e, data) {
                $('input[name="rating_star"]').val(data.rating);
            });

        });

        // *************    get data for product detail       ***********
        var data_product = {!! json_encode($product_dt->product_variantProduct()->get()->toArray(),) !!};
        var get_dataProduct = {!! json_encode($product_dt->toArray(),) !!};
        if (typeof val == 'undefined') {
            var _resutl=$('input[name="color"]:checked').val();
            get_variant(_resutl);
        }
        
        $("input[name='color']") // select the radio by its name
        .change(function(){ // bind a function to the change event
            if( $(this).is(":checked") ){ // check if the radio is checked
                var val = $(this).val(); // retrieve the value
                $("#show_gallery_Large").html('');
                $("#show_gallery_thumb").html('');
                get_variant(val);
            }
        });

        function get_variant(id_variant) { 
            data_product.forEach(item => {    
                if(item['id']==id_variant){
                    /* 
                        print propetive for variant product
                    */

                    $('#submitAddCart').click(function (e) { 
                        e.preventDefault();
                        $("#addCartID").attr('value',item['id']);
                        $("#addCartName").attr('value',get_dataProduct['name']);
                        $("#addCartPrice").attr('value',item['price']);
                        $("#addCartColor").attr('value',item['color']);
                        $("#addCartImage").attr('value',get_dataProduct['image']);
                        $('form#formAddCart').submit();

                    });

                    var price = "<del>$" + item['price'] + "</del> - $" + item['discount'];
                    $("#price").html(price);

                    var quantity_product = item['quantity'] + " IN STOCK";
                    $("#quantity_product").html(quantity_product);

                    var gallery = JSON.parse(item['gallery']);
                    var show_gallery_Large = '';
                    var show_gallery_thumb = '';
                    gallery.forEach(item_img => {

                        // product-image-large-image
                        show_gallery_Large +=
                            "<div class=' swiper-slide zoom-image-hover img-responsive'>" +
                            "<img src='{{ url('public/uploads/product') }}" + "/" + item_img +
                            "' alt=''>" +
                            "</div>";

                        // product-image-thumb-single
                        show_gallery_thumb += "<div class=' swiper-slide' style='width: 105px;margin-right: 10px;'>" +
                            "<img class='img-fluid' src='{{ url('public/uploads/product') }}" + "/" +
                            item_img + "' alt=''>" +
                            "</div>";

                    });

                    $("#show_gallery_Large").html(show_gallery_Large);
                    $("#show_gallery_thumb").html(show_gallery_thumb);
                }
            });    
        }


        // show gallery js
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
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
@stop
