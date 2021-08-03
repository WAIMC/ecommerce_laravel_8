<h2>Hello {{$name_customer}}</h2>

<p>Your invoices has been ordered at my shop MC Wai</p>

<h4>Information your have ordered</h4>

<div class="row">
    <div class="col-4">
        <p>Order code : {{$order_code}}</p>
        <p>Time order : {{$time_order}}</p>
    </div>
    <div class="col-8">
        <h3>Order detail </h3>
        {{-- order detail --}}
        <table border="1" cellspacing="0" cellpading="10" >
            <!-- Start Cart Table Head -->
            <thead>
                <tr>
                    <th class="product_name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-color">Color</th>
                    <th class="product_quantity">Quantity</th>
                    <th class="product_total">Total</th>
                </tr>
            </thead> <!-- End Cart Table Head -->
            <tbody>
                <!-- Start Cart Single Item-->
                <?php $subtotal=0; ?>
                @foreach ($order_detail as $item_cart)
                    <tr>
                        <td class="product_name">{{$item_cart->name}}</td>
                        <td class="product-price">${{$item_cart->price}}</td>
                        <td class="product-color">{{$item_cart->options->color}}</td>
                        <td class="product_quantity">
                            <div class="row">
                                <div class="col-12 ">
                                    {{$item_cart->qty}}
                                </div>
                            </div>
                        </td>
                        <td class="product_total">${{$item_cart->price*$item_cart->qty}}</td>
                    </tr>
                    <?php $subtotal += $item_cart->price*$item_cart->qty ;?>   
                @endforeach
                <!-- End Cart Single Item-->
                <!-- Start Cart Single Item-->
            </tbody>
        </table>

        <div class="coupon_code right"  data-aos="fade-up"  data-aos-delay="400">
            <h3>Cart Totals</h3>
            <div class="coupon_inner">
                <div class="cart_subtotal">
                    <p>Subtotal</p>
                    <p class="cart_amount">${{$subtotal}}</p>
                </div>
                <div class="cart_subtotal ">
                    <p>Shipping</p>
                    <p class="cart_amount"><span>Flat Rate:</span> $0</p>
                </div>
                <p>Calculate shipping</p>

                <div class="cart_subtotal">
                    <p>Total</p>
                    <p class="cart_amount">${{$subtotal}}</p>
                </div>
            </div>
        </div>

        
    </div>
</div>