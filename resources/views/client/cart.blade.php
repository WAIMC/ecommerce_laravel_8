{{-- extends master layout --}}
@extends('layouts.client')

{{-- define item for master layout --}}
@section('title', 'Cart')
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
                        <h3 class="breadcrumb-title">Cart</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{route('client.index')}}">Home</a></li>
                                    <li><a href="{{route('client.shop')}}">Shop</a></li>
                                    <li class="active" aria-current="page">Cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Cart Section:::... -->
    <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper"  data-aos="fade-up"  data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-color">Color</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        <!-- Start Cart Single Item-->
                                        @if (Cart::count()>0)
                                            <?php $cart = Cart::content(); ?>
                                            @foreach ($cart as $item_cart)
                                                <tr>
                                                    <td class="product_remove"><a href="{{route('cart.destroy',['id_cart'=>$item_cart->rowId])}}"><i class="fa fa-trash-o"></i></a></td>
                                                    <td class="product_thumb"><a href="product-details-default.html"><img src="{{ url('public/uploads/product/',$item_cart->options->image) }}" alt=""></a></td>
                                                    <td class="product_name"><a href="product-details-default.html">{{$item_cart->name}}</a></td>
                                                    <td class="product-price">${{$item_cart->price}}</td>
                                                    <td class="product-color">{{$item_cart->options->color}}</td>
                                                    <td class="product_quantity">
                                                        <form action="{{route('cart.update')}}" method="post" class="formUpdate">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-4 ">
                                                                    <input min="1" max="100" value="{{$item_cart->qty}}" type="number" name="quantity">
                                                                    <input value="{{$item_cart->rowId}}" type="hidden" name="rowId">
                                                                </div>
                                                                <div class="col-8 m-0 p-0">
                                                                    <div class="cart_submit p-2">
                                                                        <button class="btn btn-sm btn-golden update_cart" type="submit">update cart</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td class="product_total">${{$item_cart->price*$item_cart->qty}}</td>
                                                </tr>   
                                            @endforeach
                                        @endif
                                        <!-- End Cart Single Item-->
                                        <!-- Start Cart Single Item-->
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->

        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left"  data-aos="fade-up"  data-aos-delay="200">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input class="mb-2" placeholder="Coupon code" disabled type="text">
                                <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right"  data-aos="fade-up"  data-aos-delay="400">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">${{Cart::subtotal()}}</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Shipping</p>
                                    <p class="cart_amount"><span>Flat Rate:</span> $0</p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">${{Cart::subtotal()}}</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="{{route('client.checkout')}}" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->

@stop

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
    {{-- js here --}}
@stop
