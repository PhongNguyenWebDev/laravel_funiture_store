@extends('admin.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header"><h3 class="fs-5 font-weight-bold">Add New Category Product</h3></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.show.cate-list.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="category_name">Category Name:</label>
                                    <input type="text" class="form-control" id="name" name="category_name" required>
                                </div>
                                <button type="submit" class="btn btn-dark">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
