<header class="w-100 d-none d-lg-block bg-white"><!-- start header -->
    <div class="container">
        <div class="row  py-4">
            <div class="col-lg-2">
                {{-- <img src="front_assets/images/logo.png" alt="Nikkala">--}}
                <a href="{{ route('home') }}"><h2 class="h2 text-danger main-logo">گرافیک لند</h2></a>
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <form action="{{ route('search.products') }}" method="get" class="w-100">
                <div class="input-group search-box">
                    <input type="search" name="search" class="form-control form-control-lg" placeholder="جستجو در گرافیک شاپ">
                    <button type="submit" class="btn btn-danger"><img src="{{ asset('front_assets/images/search.png') }}" alt="search"></button>
                </div>
                </form>
            </div>
            <!-- end search box -->
            @guest
                <div class="col-lg-3 d-flex align-items-center justify-content-end px-0">
                    <a href="{{ route('auth.login.form') }}" class="header-login-btn me-4"><i
                            class="fa fa-user-lock"></i>ورود / ثبت نام</a>
                </div>
              @endguest
              @auth
             <div class="col-lg-3 d-flex align-items-center justify-content-end px-0">
                <div class="dropdown">
                    <a href="{{ route('user.profile') }}" class="header-login-btn me-4" data-bs-toggle="dropdown"><i class="fa fa-user-lock"></i>ورود / ثبت نام</a>
                    <ul class="dropdown-menu dropdown-menu-custom">
                        <li class="d-flex">
                            <img src="{{ asset('front_assets/images/avatar.jpg') }}" class="avatar">
                            <div class="ms-2">
                                <a href="javascript:void(0)" class="font-14 text-dark">امیرحسین رضایی</a>
                                <a href="javascript:void(0)" class="font-12 d-block text-info mt-2">مشاهده حساب کاربری <i class="fa fa-chevron-left align-middle mt-1"></i></a>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="login-link"><i class="fa fa-shopping-basket text-muted font-14 me-1"></i> سفارش های من</a>
                            <a href="#" class="login-link"><i class="fas fa-sign-out-alt text-muted font-14 me-1"></i>خروج از حساب  کاربری</a>
                        </li>
                    </ul>
                </div>
             </div>
             @endauth
            <!-- end signup & login -->

            <!-- start shopping cart -->
            <div class="col-lg-1 d-flex align-items-center justify-content-center px-0">
                <livewire:front.cart.cart-header />
              {{--  <a href="#shopping-cart" class="position-relative" data-bs-toggle="offcanvas">
                    <img src="{{ asset('front_assets/images/cart.png') }}">
                    <div class="count">5</div>
                </a>--}}
            </div>
            <!-- end shopping cart -->
        </div>
    </div>
</header>
