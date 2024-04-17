@extends('admin.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="card-box pb-10">
                <div class="d-flex justify-content-between">
                    <div class="h5 pd-20 mb-0">Coupon List</div>
                    <a href="{{ route('admin.show.coupon-list.create') }}">
                        <button class="btn btn-danger m-2" type="button">Add New Coupon</button>
                    </a>
                </div>
                <table class="data-table table ">
                    <thead>
                        <tr>
                            <th class="table-plus">Coupon Name</th>
                            <th>Coupon Code</th>
                            <th>Coupon time</th>
                            <th>Coupon Number</th>
                            <th>Coupon Condition</th>
                            <th class="datatable-nosort">Expires_ad</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td class="table-plus">{{ $coupon['coupon_name'] }}</td>
                                <td>{{ $coupon['coupon_code'] }}</td>
                                <td>{{ $coupon['coupon_time'] }}</td>
                                <td>{{ $coupon['coupon_number'] }}</td>
                                <td>{{ $coupon['coupon_condition'] }}</td>
                                <td>
                                    <span class="badge badge-pill" data-bgcolor="#e7ebf5"
                                        data-color="#265ed7">{{ $coupon['expires_at'] }}</span>
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                        <form class="mx-1" method="post"
                                            action="{{ route('admin.show.coupon-list.destroy', $coupon['id']) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn p-0" data-color="#e95959"><i
                                                    class="icon-copy dw dw-delete-3 w-100"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@if(session('deletesuccess'))
<script>
    swal("Deleted in successfully!", "You clicked the button!", "success");
</script>
@endif
