<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent ">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="{{ route('index') }}"><img src="{{ asset('web-report/assets/img/logo/logo.png') }}"
                                    alt="" height="90" width="100"></a>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <!-- Main-menu -->
                        <div class="main-menu f-left d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{ url('/') }}"
                                            style="{{ Request::is('/') ? 'color: #B90004;' : '' }}">Home</a></li>
                                    <li><a href="{{ url('about') }}"
                                            style="{{ Request::is('about') ? 'color: #B90004;' : '' }}">Tentang</a>
                                    </li>
                                    <li>
                                        @auth
                                            <a href="{{ route('dashboard') }}" class="d-lg-none">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}" class="d-lg-none">Login</a>
                                            @endif
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                @auth
                                    <a href="{{ route('dashboard') }}" class="btn header-btn lapor">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn header-btn lapor">Login</a>
                                @endauth
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
