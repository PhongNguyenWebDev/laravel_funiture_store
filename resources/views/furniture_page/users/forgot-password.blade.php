@extends('furniture_page.users.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')

    <body>
        <div class="login-header box-shadow">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="brand-logo">
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('asset/admin/vendors/images/deskapp-logo.svg') }}" alt="" />
                    </a>
                </div>
                <div class="login-menu">
                    <ul>
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="{{ asset('asset/admin/vendors/images/forgot-password.png') }}" alt="" />
                    </div>
                    <div class="col-md-6">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title">
                                <h2 class="text-center text-primary">Forgot Password</h2>
                            </div>
                            <h6 class="mb-20">
                                Enter your email address to reset your password
                            </h6>
                            <form method="POST" action="{{ route('forgotpasspost') }}">
                                @csrf
                                <div class="input-group custom">
                                    <input type="text" name="email" class="form-control form-control-lg" placeholder="Email" />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="fa fa-envelope-o"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <div class="input-group mb-0">
                                            <button class="btn btn-primary btn-block">submit</button>
                                            {{-- <a class="btn btn-primary btn-lg btn-block"
                                                href="{{ route('resetpass') }}">Submit</a> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="col-2">
                                        <div class="font-16 weight-600 text-center" data-color="#707373">
                                            OR
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group mb-0">
                                            <a class="btn btn-outline-primary btn-lg btn-block"
                                                href="{{ route('login') }}">Login</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
