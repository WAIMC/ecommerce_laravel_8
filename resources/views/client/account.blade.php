{{-- extends master layout --}}
@extends('layouts.client')

{{-- define item for master layout --}}
@section('title', 'Account')
@section('directory', 'Dashboard')
@section('action', 'Admin')


{{-- main section for master layout --}}
@section('main')

    {{-- ********************************************      if has login    ****************************** --}}
    @if (Session::has('customer'))

        <!-- ...:::: Start Breadcrumb Section:::... -->
        <div class="breadcrumb-section breadcrumb-bg-color--golden">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="breadcrumb-title">My Account</h3>
                            <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                <nav aria-label="breadcrumb">
                                    <ul>
                                        <li><a href="{{route('client.index')}}">Home</a></li>
                                        <li><a href="{{route('client.shop')}}">Shop</a></li>
                                        <li class="active" aria-current="page">My Account</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->

        <!-- ...:::: Start Account Dashboard Section:::... -->
        <div class="account-dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button" data-aos="fade-up"  data-aos-delay="0">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover active">Dashboard</a></li>
                                <li> <a href="#orders" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover">Orders</a></li>
                                <li><a href="#address" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover">Addresses</a></li>
                                <li><a href="#account-details" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover">Account details</a></li>
                                <li><a href="{{route('customer.logout')}}" class="nav-link btn btn-block btn-md btn-black-default-hover">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content" data-aos="fade-up"  data-aos-delay="200">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h4>Dashboard </h4>
                                <p>From your account dashboard. you can easily check &amp; </p>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h4>Orders</h4>
                                <div class="table_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_order as $order)
                                                <tr>
                                                    <td>{{$order->id}}</td>
                                                    <td>{{$order->created_at->format('d-m-Y')}}</td>
                                                    <td>
                                                        @if ($order->status==0)
                                                            <span class="text-info">Awaiting Fulfillment</span>
                                                        @elseif ($order->status==1)
                                                            <span class="text-warning">Awaiting Shipment</span>
                                                        @elseif ($order->status==2)
                                                            <span class="text-success">Compelete</span>
                                                        @elseif ($order->status==3)
                                                            <span class="text-danger">Cancelled</span>
                                                        @endif
                                                    </td>
                                                    <?php
                                                        $subtotal=0;
                                                        $subquantity=0;
                                                    ?>
                                                    @foreach ($order->order_orderDetail()->get() as $key=>$total)
                                                        <?php 
                                                            $subtotal += $total->price*$total->quantity;
                                                            $subquantity +=$total->quantity;
                                                         ?>
                                                    @endforeach
                                                    <td>${{$subtotal}} for {{$subquantity}} item </td>
                                                    <td>
                                                        <a href="#" class="view" data-bs-toggle="modal" data-bs-target="#view_order_detail_{{$order->id}}"><i class="icon-magnifier"></i>view</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <h5 class="billing-address">Billing address</h5>
                                <a href="#" class="view">Edit</a>
                                <p><strong>Bobby Jackson</strong></p>
                                <address>
                                    House #15<br>
                                        Road #1<br>
                                        Block #C <br>
                                        Banasree <br>
                                        Dhaka <br>
                                        1212
                                </address>
                                <p>Bangladesh</p>
                            </div>
                            <div class="tab-pane fade" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <?php $cus_detail = Session::get('customer'); ?>
                                            <form action="#">
                                                <p>Already have an account?</p>
                                                <div class="default-form-box mb-20">
                                                    <label>Full Name</label>
                                                    <input type="text" name="first-name" value="{{$cus_detail['name']}}">
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Email</label>
                                                    <input type="text" name="email-name" value="{{$cus_detail['email']}}">
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Password</label>
                                                    <input type="password" name="user-password">
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Phone</label>
                                                    <input type="text" name="user-phone" value="{{$cus_detail['phone']}}">
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Address</label>
                                                    <input type="address" name="user-address" value="{{$cus_detail['address']}}">
                                                </div>
                                                <label class="checkbox-default" for="offer">
                                                    <input type="checkbox" id="offer">
                                                    <span>Receive offers from our partners</span>
                                                </label>
                                                <br>
                                                <label class="checkbox-default checkbox-default-more-text" for="newsletter">
                                                    <input type="checkbox" id="newsletter">
                                                    <span>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></span>
                                                </label>
                                                <div class="save_button mt-3">
                                                    <button class="btn btn-md btn-black-default-hover" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Account Dashboard Section:::... -->

        
        <!-- Start Modal Quickview order detail -->
        @foreach ($data_order as $modal_id)
             <div class="modal fade" id="view_order_detail_{{$modal_id->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                   <table class="table">
                                       <thead>
                                           <tr>
                                               <th>Name</th>
                                               <th>Quantity</th>
                                               <th>Price</th>
                                           </tr> 
                                       </thead>
                                       <tbody>
                                        @foreach ($modal_id->order_orderDetail()->get() as $key=>$detail)
                                            <tr>
                                                <td scope="row">{{$detail->name}}</td>
                                                <td> x {{$detail->quantity}}</td>
                                                <td> ${{$detail->price}}</td>
                                            </tr>
                                        @endforeach
                                       </tbody>
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End Modal Quickview order detail -->

    @else
        {{-- ********************************************      if hasn't login   ****************************** --}}

        <!-- ...:::: Start Breadcrumb Section:::... -->
        <div class="breadcrumb-section breadcrumb-bg-color--golden">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="breadcrumb-title">Login</h3>
                            <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                <nav aria-label="breadcrumb">
                                    <ul>
                                        <li><a href="{{route('client.index')}}">Home</a></li>
                                        <li><a href="{{route('client.shop')}}">Shop</a></li>
                                        <li class="active" aria-current="page">Login</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->

        
        <!-- ...:::: Start Customer Login Section :::... -->
        <div class="customer-login">
            <div class="container">
                <div class="row">
                    <!--login area start-->
                    <div class="col-lg-6 col-md-6">
                        <div class="account_form" data-aos="fade-up"  data-aos-delay="0">
                            <h3>login</h3>
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

                                <div class="default-form-box">
                                    <label>Username or email <span>*</span></label>
                                    <input type="email" name="email" id="email" value="{{old('email')}}" required autocomplete="email" autofocus
                                        class="@error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="default-form-box">
                                    <label>Passwords <span>*</span></label>
                                    <input type="password" name="password" id="password" required autocomplete="current-password"
                                        class="@error('password') is-invalid @enderror">
                                    @error('password')  
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="login_submit">
                                    {{-- <label class="checkbox-default mb-4" for="offer">
                                        <input type="checkbox" id="offer" name="remember" 
                                        {{ old('remember') ? 'checked' : '' }}>
                                        <span>Remember me</span>
                                    </label> --}}
                                    <button class="btn btn-md btn-black-default-hover mb-4" type="submit">login</button>
                                    {{-- <a href="#">Lost your password?</a> --}}

                                </div>
                            </form>
                        </div>
                    </div>
                    <!--login area start-->

                    <!--register area start-->
                    <div class="col-lg-6 col-md-6">
                        <div class="account_form register" data-aos="fade-up"  data-aos-delay="200">
                            <h3>Register</h3>
                            <form action="{{route('customer.register')}}" method="POST">
                                @csrf

                                @if (Session::has('error_register'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{Session::get('error_register')}}</strong>
                                    </div>
                                @elseif (Session::has('success_register'))
                                    <div class="alert alert-success" role="alert">
                                        <strong>{{Session::get('success_register')}}</strong>
                                    </div>
                                @endif

                                <div class="default-form-box">
                                    <label>Full name <span>*</span></label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                            class="@error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="default-form-box">
                                    <label>Email address <span>*</span></label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email"
                                            class="@error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="default-form-box">
                                    <label>Passwords <span>*</span></label>
                                    <input type="password" name="password" id="password" required autocomplete="new-password"
                                            class="@error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="default-form-box">
                                    <label>Confirm passwords <span>*</span></label>
                                    <input type="password" name="password_confirmation" id="password-confirm" required autocomplete="new-password">
                                </div>

                                <div class="default-form-box">
                                    <label>Phone <span>*</span></label>
                                    <input type="number" name="phone" value="{{old('phone')}}" required autocomplete="phone" 
                                        class="@error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="default-form-box">
                                    <label>Address <span>*</span></label>
                                    <input type="text" name="address" value="{{old('address')}}" required autocomplete="address" 
                                        class="@error('address') is-invalid @enderror">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="login_submit">
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Register</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!--register area end-->
                </div>
            </div>
        </div> <!-- ...:::: End Customer Login Section :::... -->
    @endif

    
@stop

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
    {{-- js here --}}
  
@stop

