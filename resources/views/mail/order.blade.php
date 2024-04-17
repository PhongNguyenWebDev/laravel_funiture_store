<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Email Xác Nhận Đơn Hàng</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border: 3px solid black;
        border-radius: 8px;
    }
    h3 {
        color: #333333;
        margin-top: 0;
    }
    p {
        color: #666666;
        margin-bottom: 20px;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .table th, .table td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: center;
    }
    .table th {
        background-color: #333333;
        color: #ffffff;
    }
    .btn {
        display: inline-block;
        background-color: black;
        color: #ffffff !important;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
    }
</style>
</head>
<body>
    <div class="container">
        <h3>Hi: {{ $order->user->username }}</h3>
        <p>Đây là mail để xác thực đơn hàng của bạn</p>
        <div class="table-responsive">
            <table border="1" cellpadding="5" cellspacing="0" class="table text-center">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng giá mỗi sản phẩm</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total=0;
                    @endphp
                    @foreach ($order->orderDetail as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->products->product_name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->num }}</td>
                            <td>
                                @php
                                    $itemTotal = $item->price * $item->num;
                                    $total += $itemTotal;
                                @endphp
                                ${{ number_format($itemTotal, 2, '.', ',') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($order->coupon->coupon_condition == 1)
            <p>Giảm giá: - {{ number_format($order->coupon->coupon_number, 2, '.', ',') }}%</p>
            <h3>Tổng đơn hàng :
                ${{ number_format($total - ($total * $order->coupon->coupon_number) / 100, 2, '.', ',') }}</h3>
        @elseif ($order->coupon->coupon_condition == 2)
            <p>Giảm giá: - ${{ number_format($order->coupon->coupon_number, 2, '.', ',') }}</p>
            <h3>Tổng đơn hàng :
                ${{ number_format($total - $order->coupon->coupon_number, 2, '.', ',') }}</h3>
        @endif
        <p><a class="btn" href="{{ route('checkout.verify', $token) }}">Vui lòng click vào đây để xác nhận đơn hàng</a></p>
    </div>
</body>
</html>
