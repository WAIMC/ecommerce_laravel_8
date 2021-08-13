{{-- extends master layout --}}
@extends('layouts.client')

{{-- define item for master layout --}}
@section('title', 'Wislist')
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
                        <h3 class="breadcrumb-title">Wishlist</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Wishlist</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Wishlist Section:::... -->
    <div class="wishlist-section">
        <!-- Start Cart Table -->
        <div class="wishlish-table-wrapper"  data-aos="fade-up"  data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Wishlist Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_stock">Stock Status</th>
                                            <th class="product_addcart">Add To Cart</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        @if (Session::has('wishlist'))
                                            <?php  $data_wishlist = Session::get('wishlist');
                                                // echo "<pre/>";
                                                // var_dump($data_wishlist);
                                            ?>
                                            @foreach ($data_wishlist as $key=>$value)
                                                @foreach ($value as $wl)
                                                    <!-- Start Wishlist Single Item-->
                                                    <tr>
                                                        <td class="product_remove"><a href="{{route('client.destroyWishlist',['id_vp' => $wl['id_vp']])}}"><i class="fa fa-trash-o"></i></a></td>
                                                        <td class="product_thumb"><a href=""><img src="{{ url('public/uploads/product',$wl['image']) }}" alt=""></a></td>
                                                        <td class="product_name"><a href="">{{$wl['name']}}</a></td>
                                                        <td class="product-price">${{$wl['price']}}</td>
                                                        <td class="product_stock">In Stock</td>
                                                        <td class="product_addcart"><a href="#" class="btn btn-md btn-golden">Add To Cart</a></td>
                                                    </tr> <!-- End Wishlist Single Item-->        
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->
    </div> <!-- ...:::: End Wishlist Section:::... -->



@stop

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
    {{-- js here --}}
@stop
