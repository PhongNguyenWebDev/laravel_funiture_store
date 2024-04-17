@extends('admin.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="fs-5 font-weight-bold">Add New Coupon</h3>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="mx-3 alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="card-body">
                            <form id="CouponForm" method="POST" action="{{ route('admin.show.coupon-list.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="coupon_name">Coupon name:</label>
                                    <input type="text" class="form-control" id="coupon_name" name="coupon_name">
                                </div>
                                <div class="form-group">
                                    <label for="coupon_code">Coupon code:</label>
                                    <input type="text" class="form-control" id="coupon_code" name="coupon_code">
                                </div>
                                <div class="form-group">
                                    <label for="coupon_time">Coupon time:</label>
                                    <input type="text" class="form-control" id="coupon_time" name="coupon_time">
                                </div>
                                <div class="form-group">
                                    <label for="expires_at">Expiration date:</label>
                                    <input type="text" id="expires_at" name="expires_at" class="form-control"
                                        autocomplete="off">
                                </div>
                                <div class='form-group'>
                                    <label for="coupon_condition">Coupon condition:</label>
                                    <select name="coupon_condition" id="coupon_condition" class="form-control">
                                        <option value="0">---Select---</option>
                                        <option value="1">Coupon by percentage</option>
                                        <option value="2">Coupon by price</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="coupon_number">Enter the % or reduction amount:</label>
                                    <textarea style="resize:none;" class="form-control" id="coupon_number" name="coupon_number" rows="8"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark">Add Code</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#expires_at').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
