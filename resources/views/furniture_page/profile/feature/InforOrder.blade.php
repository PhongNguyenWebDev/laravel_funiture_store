@extends('furniture_page.profile.profile')
@section('title')
    {{ $title }}
@endsection
@section('profile')
    <div class="container">
        <h2>Order Details</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $orItem)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $orItem->fullname }}</td>
                        <td>{{ $orItem->address }}</td>
                        <td>{{ $orItem->phone_number }}</td>
                        <td>$ {{ $orItem->total_money }}</td>
                        <td><i class="fas fa-eye eye-icon" data-toggle="modal" data-target="#orderDetailsModal"></i></td>
                        <td>
                            <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog"
                                aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Add detailed information here -->
                                            <p>Address: {{ $orItem->address }}</p>
                                            <p>Phone: {{ $orItem->phone_number }}</p>
                                            <p>Time: {{ $orItem->created_at }}</p>
                                            <!-- Add more details as needed -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <!-- Add more rows for other orders -->
            </tbody>
        </table>
    </div>

    <!-- Modal for order details -->
@endsection
