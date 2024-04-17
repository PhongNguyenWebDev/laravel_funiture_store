<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 700px !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title text-center">Order Confirmation</h1>
            </div>
            <div class="card-body text-center">
                @if (isset($orderDetails['order']) && count($orderDetails['order']) > 0)
                    @foreach ($orderDetails['order'] as $key => $order)
                        @if ($order->order_id == $key)
                            <div>
                                @if ($order->user)
                                    <h3 class="card-title">Customer Information</h3>
                                    <p><strong>Name:</strong> {{ $order->user->username }}</p>
                                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                @endif
                                <h2 class="card-title">Order Details</h2>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderDetail as $detail)
                                                <tr>
                                                    <td>
                                                        @if ($detail->product)
                                                            {{ $detail->product->product_name }}
                                                        @else
                                                            Product not available
                                                        @endif
                                                    </td>
                                                    <td>{{ $detail->quantity }}</td>
                                                    <td>${{ number_format($detail->price, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="total">
                                    <p><strong>Total Amount:</strong>
                                        ${{ number_format($orderDetails['totalMoney'], 2) }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p>No order details found.</p>
                @endif
            </div>
            <div class="card-footer text-center">
                <p>Thank you for your order!</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
