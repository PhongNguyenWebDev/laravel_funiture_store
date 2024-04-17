@extends('furniture_page.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Product Detail</h1>
                        <p class="mb-5">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                            vulputate velit imperdiet dolor tempor tristique.</p>
                        <p class="mb-5"><a href="{{ route('home') }}" class="btn btn-secondary me-2">Home</a><a href="#"
                                class="btn btn-white-outline">Explore</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ asset('asset/client/images/couch.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    {{-- Products Detail --}}
    <div class="container mt-5 border-bottom py-5">
        @if ($message = Session::get('addcart'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close rounded" data-dismiss="alert">x</button>
                <strong class="mx-2">{{ $message }}</strong>
            </div>
        @endif
        <form action="{{ route('cart.addToCart', ['productId' => $productdetail->id]) }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $productdetail->id }}" name="cart_product_id_{{ $productdetail->id }}">
            <input type="hidden" value="{{ $productdetail->product_name }}"
                name="cart_product_name_{{ $productdetail->id }}">
            <input type="hidden" value="{{ $productdetail->price }}" name="cart_product_price_{{ $productdetail->id }}">
            <input type="hidden" value="{{ $productdetail->thumbnail }}"
                name="cart_product_thumbnail_{{ $productdetail->id }}">
            <input type="hidden" value="1" name="cart_product_quantity_{{ $productdetail->id }}">

            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <img src="{{ asset($productdetail->thumbnail) }}" alt="" srcset="">
                </div>
                <div class="col-lg-6">
                    <div class="content">
                        <h1 class="pb-3"><strong>{{ $productdetail->product_name }}</strong></h1>
                        <h2 class="pb-3"><strong>{{ '$' . number_format($productdetail->price, 2) }}</strong></h2>
                        <div class="mb-4">
                            <span class='fs-6'>Update Date</span>:
                            <span>{{ date('d/m/Y', strtotime($productdetail->create_at)) }}</span>
                        </div>
                        <div>
                            <p class="text-justify text-break"> {{ $productdetail->description }}
                            </p>
                        </div>
                        <div>
                            <span class="fs-6">Quantity</span>:
                            <input type="number" name="quantity" id="soluong" min="1" max="50"
                                value="1">
                        </div>
                        <button style="button" id="addtocart" data-id="{{ $productdetail->id }}"
                            class='btn btn-success mt-3'>Add to cart</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- Related Products --}}
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <h4 class="mb-5">Related Products</h4>
            <div class="row">
                @foreach ($products as $product)
                    @if ($category == $product->category_id)
                        <div class="col-12 col-md-4 col-lg-3 mb-5">
                            <a class="product-item" href="{{ route('product-detail', ['id' => $product->id]) }}">
                                <img src="{{ asset($product->thumbnail) }}" class="img-fluid product-thumbnail">
                                <h3 class="product-title">{{ $product->product_name }}</h3>
                                <strong class="product-price">{{ '$' . number_format($product->price, 2) }}</strong>
                                <span class="icon-cross">
                                    <img src="{{ asset('asset/client/images/cross.svg') }}" class="img-fluid">
                                </span>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @if (session()->has('addtocart'))
        <script type="text/javascript">
            swal({
                    title: "Product added to cart",
                    text: "You can continue shopping or go to cart to checkout!",
                    icon: "success",
                    buttons: {
                        cancel: "Run away!",
                        confirm: "Go to cart",
                    },
                })
                .then((confirm) => {
                    if (confirm) {
                        swal("Poof! Your imaginary file has been added to cart!", {
                            icon: "success",
                        }).then((ok) => {
                            if (ok) {
                                window.location.href = "{{ route('cart.index') }}";
                            }
                        });
                    }
                });
        </script>
    @endif
@endsection
