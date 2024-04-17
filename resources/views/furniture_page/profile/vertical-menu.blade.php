<ul class="list-group">
    @php
        $user = session()->get('user');
    @endphp
    <li class="text-white list-group-item" style="background: #3b5d50;"><h1 class="m-0">PROFILE</h1></li>
    <li class="list-group-item"><a class="list-group-item list-group-item-action border-0 text-uppercase" href="{{ route('profile.ShowUpdateProfile',['id'=>$user->id]) }}">Update User</a></li>
    <li class="list-group-item"><a class="list-group-item list-group-item-action border-0 text-uppercase" href="{{ route('profile.InforOrder',['id'=>$user->id]) }}">Order Information</a></li>
    <li class="list-group-item"><a class="list-group-item list-group-item-action border-0 text-uppercase" href="{{ route('profile.InforBank') }}">Bank Information</a></li>
    <li class="list-group-item"><a class="list-group-item list-group-item-action border-0 text-uppercase" href="{{ route('profile.Address') }}">Address</a></li>
    <li class="list-group-item"><a class="list-group-item list-group-item-action border-0 text-uppercase" href="{{ route('profile.AnotherFeature') }}">Another Feature</a></li>
</ul>