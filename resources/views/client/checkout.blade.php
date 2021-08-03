{{-- extends master layout --}}
@extends('layouts.client')

{{-- define item for master layout --}}
@section('title', 'Checkout')
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
                        <h3 class="breadcrumb-title">Checkout</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{route('client.index')}}">Home</a></li>
                                    <li><a href="{{route('client.shop')}}">Shop</a></li>
                                    <li class="active" aria-current="page">Checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Checkout Section:::... -->
    <div class="checkout-section">
        <div class="container">
            @if (Session::has('customer'))
                <?php
                    $cus = Session::get('customer');
                ?>
                <!-- Start User Details Checkout Form -->
                <div class="checkout_form" data-aos="fade-up"  data-aos-delay="400">
                    <form action="{{route('customer.payment')}}" method="post">
                    @csrf

                        <div class="row">
                            @if (Session::has('error_payment'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{Session::get('error_payment')}}</strong>
                                </div>
                            @elseif (Session::has('success_payment'))
                                <div class="alert alert-success" role="alert">
                                    <strong>{{Session::get('success_payment')}}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <h3>Billing Details</h3>
                                <div class="row">	

                                    <input type="hidden" name="id_customer" value="{{$cus['id']}}">

                                    <div class="col-lg-12">
                                        <div class="default-form-box">
                                            <label>Full Name <span>*</span></label>
                                            <input type="text" name="name" value="{{$cus['name']}}"
                                                class="@error('name') is-invalid @enderror">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="default-form-box">
                                            <label>Address <span>*</span></label>
                                            <input type="text" name="address" value="{{$cus['address']}}"
                                                class="@error('address') is-invalid @enderror">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="default-form-box">
                                            <label>Phone<span>*</span></label>
                                            <input type="text" name="phone" value="{{$cus['phone']}}"
                                                class="@error('phone') is-invalid @enderror">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="default-form-box">
                                            <label> Email Address <span>*</span></label>
                                            <input type="text" name="email" value="{{$cus['email']}}"
                                                class="@error('email') is-invalid @enderror">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="order-notes">
                                            <label for="order_note">Order Notes</label>
                                            <textarea name="note" id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h3>Your order</h3>
                                <div class="order_table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (Cart::count()>0)
                                                <?php $checkout_cart = Cart::content();?>
                                                @foreach ($checkout_cart as $c_c)
                                                <tr>
                                                    <td> {{$c_c->name}} <strong> × {{$c_c->qty}}</strong></td>
                                                    <td> ${{$c_c->price}}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Cart Subtotal</th>
                                                <td>${{Cart::subtotal()}}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td><strong>$0</strong></td>
                                            </tr>
                                            <tr class="order_total">
                                                <th>Order Total</th>
                                                <td><strong>${{Cart::subtotal()}}</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment_method">
                                    {{-- <div class="panel-default">
                                        <label class="checkbox-default" for="currencyCod" data-bs-toggle="collapse" data-bs-target="#methodCod">
                                            <input type="checkbox" id="currencyCod">
                                            <span>Cash on Delivery</span>
                                        </label>

                                        <div id="methodCod" class="collapse" data-parent="#methodCod">
                                            <div class="card-body1">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-default">
                                        <label class="checkbox-default" for="currencyPaypal" data-bs-toggle="collapse" data-bs-target="#methodPaypal">
                                            <input type="checkbox" id="currencyPaypal">
                                            <span>PayPal</span>
                                        </label>
                                        <div id="methodPaypal" class="collapse " data-parent="#methodPaypal">
                                            <div class="card-body1">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="order_button pt-3">
                                        <button class="btn btn-md btn-black-default-hover" type="submit">Proceed To Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- Start User Details Checkout Form -->
                
               
            @else
                <div class="row">
                    <!-- User Quick Action Form -->
                    <div class="col-12">
                        <div class="user-actions accordion" data-aos="fade-up"  data-aos-delay="0">
                            <h3>
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                Returning customer?
                                <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login" aria-expanded="true">Click here to login</a>
                            </h3>
                            <div id="checkout_login" class="collapse" data-parent="#checkout_login">
                                <div class="checkout_info">
                                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>
                                    <form action="{{route('customer.login')}}" method="POST">
                                        @csrf

                                        @if (Session::has('error_login'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{Session::get('error_login')}}</strong>
                                            </div>
                                        @elseif (Session::has('success_login'))
                                            <div class="alert alert-success" role="alert">
                                                <strong>{{Session::get('success_login')}}</strong>
                                            </div>
                                        @endif

                                        <div class="form_group default-form-box">
                                            <label>Username or email <span>*</span></label>
                                            <input type="email" name="email" id="email" value="{{old('email')}}" required autocomplete="email" autofocus
                                                class="@error('email') is-invalid @enderror">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form_group default-form-box">
                                            <label>Password <span>*</span></label>
                                            <input type="password" name="password" id="password" required autocomplete="current-password"
                                                class="@error('password') is-invalid @enderror">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form_group group_3 default-form-box">
                                            <button class="btn btn-md btn-black-default-hover" type="submit">Login</button>
                                            {{-- <label class="checkbox-default">
                                                <input type="checkbox">
                                                <span>Remember me</span>
                                            </label> --}}
                                        </div>
                                        {{-- <a href="#">Lost your password?</a> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="user-actions accordion" data-aos="fade-up"  data-aos-delay="200">
                            <h3>
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                Returning customer?
                                <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a>

                            </h3>
                            <div id="checkout_coupon" class="collapse checkout_coupon" data-parent="#checkout_coupon">
                                <div class="checkout_info">
                                    <form action="#">
                                        <input placeholder="Coupon code" type="text" disabled>
                                        <button class="btn btn-md btn-black-default-hover" type="submit">Apply coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User Quick Action Form -->
                </div>
            @endif
        </div>
    </div><!-- ...:::: End Checkout Section:::... -->

@stop

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
    {{-- js here --}}
@stop
