@extends('admin.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="card-box pb-10">
            <div class="h5 pd-20 mb-0">Product List</div>
            <table class="data-table table ">
                <thead>
                    <tr>
                        <th class="table-plus">Name</th>
                        <th>Gender</th>
                        <th>Weight</th>
                        <th>Assigned Doctor</th>
                        <th>Admit Date</th>
                        <th>Disease</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="{{ asset('asset/admin/vendors/images/photo4.jpg') }}"
                                        class="border-radius-100 shadow" width="40" height="40" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="weight-600">Jennifer O. Oster</div>
                                </div>
                            </div>
                        </td>
                        <td>Female</td>
                        <td>45 kg</td>
                        <td>Dr. Callie Reed</td>
                        <td>19 Oct 2020</td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Typhoid</span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
