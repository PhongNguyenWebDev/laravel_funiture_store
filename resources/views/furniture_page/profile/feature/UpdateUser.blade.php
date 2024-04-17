@extends('furniture_page.profile.profile')
@section('title')
    {{ $title }}
@endsection
@section('profile')
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <form class="form" method="POST" action="{{ route('profile.UpdateProfile',['id'=>$user->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded"
                                                        style="height: 140px; background-color: rgb(233, 236, 239);">
                                                        <img class="d-flex justify-content-center align-items-center rounded"
                                                            style="height: 140px; background-color: rgb(233, 236, 239);"
                                                            src="{{ asset('asset/client/images/' . $user->image) }}" alt="" srcset="">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap text-uppercase">
                                                        {{ $user->username }}</h4>
                                                    <p class="mb-0">{{ $user->email }}</p>
                                                    <div class="mt-2">
                                                        <input type="file" class="btn btn-primary w-50" id="image"
                                                        name="image">
                                                        <label class="custom-file-label" for="image"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                        </ul>
                                        <div class="pt-3">
                                            <div class="tab-pane active">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Username</label>
                                                                    <input class="form-control" type="text"
                                                                        name="username" placeholder="Phong.hs"
                                                                        value="{{ $user->username }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <input class="form-control" name="address"
                                                                        type="text" placeholder=""
                                                                        value="{{ $user->address }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input class="form-control" name="email"
                                                                        type="email" placeholder="user@example.com"
                                                                        value="{{ $user->email }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input class="form-control" type="text"
                                                                        name="phone_number" placeholder="09000990"
                                                                        value="{{ $user->phone_number }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="mb-2 mt-3"><b>Change Password</b></div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Current Password</label>
                                                                        <input class="form-control" name="curpass"
                                                                            type="password" placeholder="••••••">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>New Password</label>
                                                                    <input class="form-control" name="newpass"
                                                                        type="password" placeholder="••••••">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Confirm <span
                                                                    class="d-none d-xl-inline">Password</span></label>
                                                            <input class="form-control" name="confirmpass" type="password"
                                                                placeholder="••••••">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col d-flex justify-content-end">
                                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@if(session('successprofile'))
<script>
    swal("Reset Password in successfully!", "You clicked the button!", "success");
</script>
@endif