<header>
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Furni<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                    <li><a class="nav-link" href="{{ route('about') }}">About us</a></li>
                    <li><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                    <li><a class="nav-link" href="{{ route('blogs.index') }}">Blog</a></li>
                    <li><a class="nav-link" href="{{ route('contact') }}">Contact us</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li>
                        @if (!session()->has('user'))
                            <a class="nav-link" href="{{ route('login') }}"><img
                                    src="{{ asset('asset/client/images/user.svg') }}"></a>
                        @else
                            <div class="user-info-dropdown">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <span class="user-icon">
                                            <img src="{{ asset('asset/admin/vendors/images/photo1.jpg') }}"
                                                alt="" />
                                        </span>
                                        @if (session()->has('user'))
                                            <span
                                                class="user-name text-uppercase">{{ session('user')->username }}</span>
                                        @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="{{ route('profile.profile') }}"> Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"> Log out</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </li>
                    <li><a class="nav-link" href="{{ route('cart.index') }}"><img
                                src="{{ asset('asset/client/images/cart.svg') }}"></a></li>
                </ul>
            </div>
        </div>

    </nav>
</header>
