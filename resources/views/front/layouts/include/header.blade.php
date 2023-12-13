<header class="w-100 d-none d-lg-block bg-white"><!-- start header -->
    <div class="container">
        <div class="row  py-4">
            <div class="col-lg-2">
                {{-- <img src="front_assets/images/logo.png" alt="Nikkala">--}}
                <a href="{{ route('home') }}"><h2 class="h2 text-danger main-logo">گرافیک لند</h2></a>
            </div><!-- logo -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center"><!-- start search box -->
                <div class="input-group search-box">
                    <input type="search" class="form-control form-control-lg" placeholder="جستجو در نیک کالا">
                    <button type="submit" class="btn btn-danger"><img src="{{ asset('front_assets/images/search.png') }}"></button>
                </div>
            </div><!-- end search box -->
            <div class="col-lg-3 d-flex align-items-center justify-content-end px-0"><!-- start signup & login -->
                <div class="dropdown">
                    <a href="#" class="header-login-btn me-4" data-bs-toggle="dropdown"><i class="fa fa-user-lock"></i>ورود / ثبت نام</a>
                    <ul class="dropdown-menu dropdown-menu-custom"><!-- start dropdown box -->
                        <li class="d-flex">
                            <img src="{{ asset('front_assets/images/avatar.jpg') }}" class="avatar">
                            <div class="ms-2">
                                <a href="javascript:void(0)" class="font-14 text-dark">امیرحسین رضایی</a>
                                <a href="javascript:void(0)" class="font-12 d-block text-info mt-2">مشاهده حساب کاربری <i class="fa fa-chevron-left align-middle mt-1"></i></a>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="login-link"><i class="fa fa-shopping-basket text-muted font-14 me-1"></i> سفارش های من</a>
                            <a href="javascript:void(0)" class="login-link"><i class="fa fa-gift text-muted font-14 me-1"></i>جوایز نیک کلاب</a>
                            <a href="#" class="login-link"><i class="fas fa-sign-out-alt text-muted font-14 me-1"></i>خروج از حساب  کاربری</a>
                        </li>
                    </ul><!-- end dropdown box -->
                </div>
            </div><!-- end signup & login -->
            <!-- start shopping cart -->
            <div class="col-lg-1 d-flex align-items-center justify-content-center px-0">
                <a href="#shopping-cart" class="position-relative" data-bs-toggle="offcanvas">
                    <img src="{{ asset('front_assets/images/cart.png') }}">
                    <div class="count">2</div>
                </a>
            </div>
            <!-- end shopping cart -->
        </div>
    </div>
</header>
