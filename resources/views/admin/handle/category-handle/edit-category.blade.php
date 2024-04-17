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
                        <div class="card-header"><h3 class="fs-5 font-weight-bold">Update Product</h3></div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)  
                                <div class="mx-3 alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="card-body">
                            <form id="productForm" method="POST" action="{{ route('admin.show.cate-list.update',$category['id']) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="category_name">Category Name:</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}">
                                </div>
                                <button type="submit" class="btn btn-dark">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Xử lý sự kiện khi nhấn nút "Cancel"
        document.querySelector('.btn-danger').addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của nút "Cancel"
            document.getElementById('productForm').reset(); // Xóa dữ liệu đã điền trên form
        });
    </script>
@endsection
