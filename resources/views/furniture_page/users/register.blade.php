@extends('furniture_page.users.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between flex-wrap align-items-center">
            <div class="brand-logo">
                <a href="{{ route('login') }}">
                    <img src="{{ asset('asset/admin/vendors/images/deskapp-logo.svg') }}" alt="" />
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('asset/admin/vendors/images/register-page-img.png') }}" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="register-box bg-white box-shadow border-radius-10">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger mx-3">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="wizard-content">
                            <form action="{{ route('registersubmit') }}" method="post" class="px-3 mx-2">
                                <div class=" py-4">
                                    <h2 class="text-center text-primary">Register To DeskApp</h2>
                                </div>
                                @csrf
                                {{-- <h5>Basic Account Credentials</h5> --}}
                                <section>
                                    <div class="form-wrap max-width-600 mx-auto">
                                        <div class="mb-3">
                                            <label class="form-label  ">Email Address</label>
                                            <input name="email" type="email" class="form-control" />

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label ">Username</label>
                                            <input name="username" type="text" class="form-control" />

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label ">Phone Number</label>
                                            <input name="phonenumber" type="number" class="form-control" />

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label ">Address</label>
                                            <input name="address" type="text" class="form-control" />

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label ">Password</label>
                                            <input name="password" type="password" class="form-control" />

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label ">Confirm Password</label>
                                            <input name="password_confirm" type="password" class="form-control" />
                                        </div>
                                    </div>
                                </section>
                                <div class="pb-3">
                                    <button class=" w-100 btn btn-primary" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- success Popup html Start -->
    {{-- <button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal"
        data-backdrop="static">
        Launch modal
    </button>
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered max-width-400" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h3 class="mb-20">Form Submitted!</h3>
                    <div class="mb-30 text-center">
                        <img src="{{ asset('asset/admin/vendors/images/success.png') }}" />
                    </div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="{{ route('login') }}" class="btn btn-primary">Done</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- success Popup html End -->
@endsection
