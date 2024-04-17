@extends('admin.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="card-box pb-10">
                <div class="d-flex justify-content-between">
                    <div class="h5 pd-20 mb-0">Product List</div>
                    <a href="{{ route('admin.show.product-list.create') }}">
                        <button class="btn btn-danger m-2" type="button">Add New Product</button>
                    </a>
                </div>
                <table class="data-table table wrap">
                    <thead>
                        <tr>
                            <th class="table-plus">Image</th>
                            <th>Name Product</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Decription</th>
                            <th>Time</th>
                            <th class="datatable-nosort">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="table-plus">
                                    <div class="name-avatar d-flex align-items-center">
                                        <div class="avatar mr-2 flex-shrink-0">
                                            <img src="{{ asset($product->thumbnail) }}" class="border-radius-100 shadow"
                                                width="40" height="40" alt="" />
                                        </div>
                                </td>
                                <td>
                                    <div class="txt">
                                        <div class="weight-600">{{ $product['product_name'] }}</div>
                                    </div>
                                </td>
                                <td>{{ $product['price'] }}</td>
                                <td>{{ $product['discount'] }}</td>
                                <td>{{ $product['description'] }}</td>
                                <td>{{ $product->created_at }}</td>
                                {{-- <td>
                                    <span class="badge badge-pill" data-bgcolor="#e7ebf5"
                                        data-color="#265ed7">Typhoid</span>
                                </td> --}}
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.show.product-list.edit', $product['id']) }}"
                                            data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                        <form class="mx-1" method="post"
                                            action="{{ route('admin.show.product-list.destroy', $product['id']) }}">
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
