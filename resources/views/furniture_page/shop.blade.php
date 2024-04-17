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
                        <h1 class="text-white" style="font-weight: bold;">Shop</h1>
                        <p class="text-white mb-5">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                            vulputate velit imperdiet dolor tempor tristique.</p>
                        <p class="mb-5"><a href="{{ route('home') }}" class="btn btn-secondary me-2">Home</a><a href="#"
                                class="btn btn-white-outline">Explore</a></p>
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <form class="form-group d-flex" action="{{ route('shop') }}" method="GET">
                    <input class="form-control mx-3" type="text" name="search" placeholder="Search...">
                    <button type="submit" class="btn btn-black">Search</button>
                </form>
            </div>
            <!-- Thêm các tùy chọn bộ lọc -->
            <div class="col-lg-6 d-flex justify-content-end">
                <form class="form-inline d-flex" action="{{ route('shop') }}" method="GET">
                    <!-- Ví dụ: bộ lọc theo danh mục -->
                    <select name="category" class="form-control mx-2">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option class="my-5 uppercase-first" value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <select class="form-control mx-2" name="sort_by_price">
                        <option value="">Sort by Price</option>
                        <option value="asc">Price: Low to High</option>
                        <option value="desc">Price: High to Low</option>
                    </select>
                    <!-- Thêm các tùy chọn bộ lọc khác tại đây -->
                    <button type="submit" class="btn btn-black" >Filter</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <!-- Start Column 1 -->
                @foreach ($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="{{ route('product-detail', ['id' => $product->id]) }}">
                            <img src="{{ $product->thumbnail }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $product->product_name }}</h3>
                            <strong class="product-price">{{ '$' . number_format($product->price, 2) }}</strong>
                            <span class="icon-cross">
                                <img src="{{ asset('asset/client/images/cross.svg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
