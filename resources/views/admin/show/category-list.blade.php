@extends('admin.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="card-box pb-10">
                <div class="d-flex justify-content-between">
                    <div class="h5 pd-20 mb-0">Catagory List</div>
                    <a href="{{ route('admin.show.cate-list.create') }}">
                        <button class="btn btn-danger m-2" type="button">Add New Product</button>
                    </a>
                </div>
                <table class="data-table table wrap">
                    <thead>
                        <tr>
                            <th class="table-plus">Name</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th class="datatable-nosort">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="table-plus">
                                    <div class="txt">
                                        <div class="weight-600">{{ $category['category_name'] }}</div>
                                    </div>
                                </td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                {{-- <td>
                                    <span class="badge badge-pill" data-bgcolor="#e7ebf5"
                                        data-color="#265ed7">Typhoid</span>
                                </td> --}}
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.show.cate-list.edit', $category['id']) }}"
                                            data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                        <form class="mx-1" method="post"
                                            action="{{ route('admin.show.cate-list.destroy', $category['id']) }}">
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
