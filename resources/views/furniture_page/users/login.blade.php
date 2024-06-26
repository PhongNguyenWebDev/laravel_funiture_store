@extends('furniture_page.users.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="{{ route('login') }}">
                    <img src="{{ asset('asset/admin/vendors/images/deskapp-logo.svg') }}" alt="" />
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('asset/admin/vendors/images/login-page-img.png') }}" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To DeskApp</h2>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="{{ route('loginsubmit') }}" method="post">
                            @csrf
                            <div class="select-role">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn active">
                                        <input type="radio" name="options" id="admin" />
                                        <div class="icon">
                                            <img src="{{ asset('asset/admin/vendors/images/briefcase.svg') }}"
                                                class="svg" alt="" />
                                        </div>
                                        <span>I'm</span>
                                        Manager
                                    </label>
                                    <label class="btn">
                                        <input type="radio" name="options" id="user" />
                                        <div class="icon">
                                            <img src="{{ asset('asset/admin/vendors/images/person.svg') }}" class="svg"
                                                alt="" />
                                        </div>
                                        <span>I'm</span>
                                        Employee
                                    </label>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="email" name="email" class="form-control form-control-lg"
                                    placeholder="Username" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input id="pass" type="password" name="password" class="form-control form-control-lg"
                                    placeholder="**********" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="remember" />
                                        <label class="custom-control-label" for="remember">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password">
                                        <a href="{{ route('forgotpass') }}">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                                        {{-- <a class="btn btn-primary btn-lg btn-block" href="{{ route('home') }}">Sign In</a> --}}
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                                        OR
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block"
                                            href="{{ route('register') }}">Register To
                                            Create Account</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('regis'))
        <script>
            swal("Welcome to dashboard Admin!", "You clicked the button!", "success");
        </script>
    @endif
    @if(session('success_reset'))
    <script>
        swal("Reset Password in successfully!", "You clicked the button!", "success");
    </script>
    @endif
    @if(session('error'))
    <script>
        swal("Email or password is incorrect!", "You clicked the button!", "error");
    </script>
    @endif
@endsection
