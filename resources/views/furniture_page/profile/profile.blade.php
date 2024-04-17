@extends('furniture_page.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="container my-5 pb-5">
        <div class="d-flex row">
            <div class="col-lg-4 p-0">
                @include('furniture_page.profile.vertical-menu')
            </div>
            <div class="col-lg-8 d-flex justify-content-center">
                @yield('profile')
            </div>
        </div>
    </div>
@endsection
