@extends('furniture_page.profile.profile')
@section('title')
    {{ $title }}
@endsection
@section('profile')
    <div class="container">
        <h2>Transfer Information</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Payment Method</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Bank Transfer</td>
                    <td>$100</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>PayPal</td>
                    <td>$50</td>
                </tr>
                <!-- Add more rows for additional transfer information -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-right"><strong>Total:</strong></td>
                    <td><strong>$150</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
