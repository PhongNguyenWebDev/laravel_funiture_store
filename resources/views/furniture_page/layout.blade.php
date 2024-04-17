<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('asset/client/images/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset/client/css/bootstrap.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('asset/client/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/client/css/style.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>@yield('title')- Furni</title>
</head>

<body>
    <!-- Start Header/Navigation -->
    @include('furniture_page.header')
    <main>
        @yield('content')
    </main>
    @include('furniture_page.footer')
    <script src="{{ asset('asset/client/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/client/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('asset/client/js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('asset/admin/vendors/scripts/core.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Lấy đường dẫn URL hiện tại
            var currentUrl = window.location.href;

            // Lặp qua mỗi liên kết trong navbar
            $('.custom-navbar-nav .nav-link').each(function() {
                // Lấy đường dẫn của từng liên kết
                var linkUrl = $(this).attr('href');

                // Loại bỏ lớp active khỏi tất cả các liên kết ban đầu
                $(this).closest('li').removeClass('active');

                // So sánh đường dẫn của liên kết với đường dẫn hiện tại
                if (currentUrl === linkUrl) {
                    // Thêm lớp active cho liên kết nếu trùng khớp
                    $(this).closest('li').addClass('active');
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#addtocart').click(function() {
                var id = $(this).data('id');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_thumbnail = $('.cart_product_thumbnail_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('cart.addToCart') }}",
                    method: "POST",
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_price: cart_product_price,
                        cart_product_thumbnail: cart_product_thumbnail,
                        cart_product_quantity: cart_product_quantity,
                        _token: _token
                    },
                })
            });
        });
    </script>
</body>

</html>
