@extends('furniture_page.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <!-- Start Hero Section -->
    <div style="background: #3b5d50; text-color:white">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1 class="text-white" style="font-weight: bold;">Cart</h1>
                        <p class="text-white mb-5">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam
                            vulputate velit imperdiet dolor tempor tristique.</p>
                        <p class="mb-5"><a href="{{ route('home') }}" class="btn btn-secondary me-2">Home</a><a
                                href="#" class="btn btn-white-outline">Explore</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="">
                        <img src="{{ asset('asset/client/images/couch.png') }}" class="w-50" style="float: right;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                @if ($message = Session::get('deleteItem'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close btn" style="padding: 3px 10px;" data-dismiss="alert">x</button>
                        <strong class="mx-2">{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('updateItem'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close btn" style="padding: 3px 10px;" data-dismiss="alert">x</button>
                        <strong class="mx-2">{{ $message }}</strong>
                    </div>
                @endif
                <form class="col-md-12" method="post" action="{{ route('cart.updateCart') }}">
                    @csrf
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-id">STT</th>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($cart))
                                    @foreach ($cart as $id => $item)
                                        @php
                                            $totalItem = $item['price'] * $item['quantity'];
                                            $subTotal += $totalItem;
                                            $Total = 0;
                                        @endphp
                                        <tr>
                                            <td class="product-id">{{ $loop->iteration }}</td>
                                            <td class="product-thumbnail">
                                                <img src="{{ $item['thumbnail'] }}" alt="Image" class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black m-0">{{ $item['name'] }}</h2>
                                            </td>
                                            <td>
                                                <p class="p-0 m-0"> {{ '$' . number_format($item['price'], 2, '.', ',') }}
                                                </p>
                                            </td>
                                            <td>
                                                <input class=" rounded w-25 text-center quantity-input" type="number"
                                                    name="cart_quantity[{{ $item['session_id'] }}]"
                                                    value="{{ $item['quantity'] }}" min="1">
                                            </td>
                                            <td id="total">
                                                <p class="p-0 m-0">{{ '$' . number_format($totalItem, 2, '.', ',') }}</p>
                                            </td>
                                            <td class="cart_delete">
                                                <a class="btn btn-black btn-sm cart_delete"
                                                    href="{{ route('cart.deleteCart', ['session_id' => $item['session_id']]) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                            <tbody>
                                <h1 class="text-center">Cart empty! Please add product to cart</h1>
                            </tbody>
                            @endif
                            @if (session()->has('cart'))
                                <tr>
                                    <td>
                                        <input class="btn btn-outline-black btn-sm btn-block" type="submit"
                                            name="update_quantity" value="Update Cart" id="">
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <a href="{{ route('shop') }}" class="btn btn-outline-black btn-sm btn-block">Continue
                                Shopping</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row mb-5">
                                @if (session()->has('cart'))
                                    <form action="{{ route('cart.coupon') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="text-black h4" for="coupon">Coupon</label>
                                                <p style="margin-bottom:0.5em; ">Enter your coupon code if you have one.</p>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <input name="coupon_code" type="text" class="form-control py-3"
                                                    id="coupon_code" placeholder="Coupon Code">
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-black" type="submit">Apply Coupon</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-8 text-right">
                                    <span class="text-black">{{ '$' . number_format($subTotal, 2, '.', ',') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <span class="text-black">Shipping fee</span>
                                </div>
                                <div class="col-md-8 text-right">
                                    <span class="text-black">FREE</span>
                                </div>
                            </div>
                            @if (session()->has('coupon'))
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <span class="text-black">Voucher</span>
                                    </div>
                                    @php
                                        $coupon = Session::get('coupons');
                                    @endphp
                                    <div class="col-md-8 text-right">
                                        @if ($coupon['coupon_condition'] == 1)
                                            <span class="text-black">
                                                {{ $coupon['coupon_number'] }}%
                                                <p>
                                                    @php
                                                        $total_coupon =
                                                            $subTotal * (intval($coupon['coupon_number']) / 100);
                                                        $total = $subTotal - $total_coupon;
                                                        session(['total' => $total]);
                                                    @endphp
                                                </p>
                                            </span>
                                        @elseif($coupon['coupon_condition'] == 2)
                                            <span class="text-black">
                                                ${{ $coupon['coupon_number'] }}
                                                <p>
                                                    @php
                                                        $total = $subTotal - intval($coupon['coupon_number']);
                                                        session(['total' => $total]);
                                                    @endphp
                                                </p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="row mb-5">
                                <div class="col-md-4">
                                    <span class="text-black h5"><strong>Total</strong></span>
                                </div>
                                <div class="col-md-8 text-right">
                                    <strong class="text-danger h5">
                                        @if (session()->has('coupons'))
                                            ${{ number_format($total = session()->get('total'), 2, '.', ',') }}
                                        @else
                                            ${{ number_format($subTotal, 2, '.', ',') }}
                                        @endif
                                    </strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-black btn-lg py-3 btn-block"
                                        onclick="window.location='{{ route('checkout.index') }}'">Proceed To
                                        Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
