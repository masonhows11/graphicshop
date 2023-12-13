<header class="d-lg-none bg-white w-100">
    <div class="container">
        <div class="row py-2">

            <div class="col-7 d-flex flex-row">
                <a href="#mobile-menu" data-bs-toggle="offcanvas"><i class="fa fa-bars mobile-menu-icon"></i></a>
                <div class="offcanvas offcanvas-start" tabindex="-1" data-bs-scroll="true" id="mobile-menu">
                    <div class="offcanvas-header">
                        <a href="{{ route('home') }}"><h2 class="h2 text-danger main-logo">گرافیک لند</h2></a>
                        {{--  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>--}}
                    </div>
                    <div class="offcanvas-body px-0">
                        <div class="input-group search-box px-3">
                            <input type="search" class="form-control form-control-lg" placeholder="جستجو در گرافیک شاپ">
                            <button type="submit" class="btn btn-danger"><img src="{{ asset('front_assets/images/search.png') }}">
                            </button>
                        </div>
                        <ul class="mobile-menu-level-1">
                            <li class="has-mobile-submenu"><a href="#">دسته بندی محصولات</a>

                                <ul class="mobile-menu-level-2">
                                    @foreach( $categories as $child )
                                        <li class="has-mobile-submenu-2">
                                                <a href="javascript:void(0)" class="d-inline">{{ $child->title }}</a>
                                            <ul class="mobile-menu-level-3 me-2">
                                                @if( $child->children != null  )
                                                    @include('front.partials.responsive_child_category',['category' => $child->children])
                                                @endif
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">تخفیف‌ها و پیشنهادها</a></li>
                            <li><a href="signup.html">ثبت نام / ورود</a></li>
                            <li><a href="#"> محصولات </a>
                            <li><a href="blog.html">وبلاگ</a></li>
                            <li><a href="contact-us.html">تماس با ما</a></li>
                            <li><a href="about-us.html">درباره ما</a></li>
                        </ul>
                    </div>
                </div>
                {{--  <img src="front_assets/images/logo.png" class="img-fluid"><!-- logo -->--}}
                <div class="ms-4"><a href="{{ route('home') }}"><h2 class="h2 text-danger main-logo">گرافیک لند</h2></a>
                </div>
            </div>

            <!-- start signup & login dropdown -->
            <div class="col-4 d-flex align-items-center justify-content-end">
                {{-- <div class="dropdown">
                     <a href="#" data-bs-toggle="dropdown"><i class="fa fa-user-lock signup-login-icon"></i></a>
                     <ul class="dropdown-menu dropdown-menu-custom"><!-- start dropdown box -->
                         <li class="d-flex">
                             <img src="front_assets/images/avatar.jpg" class="avatar">
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
                 </div>--}}
            </div>
            <!-- end signup & login dropdown -->

            <!-- start shopping cart responsive-->
            <div class="col-1 d-flex align-items-center justify-content-end">
                <a href="#shopping-cart-responsive" class="position-relative" data-bs-toggle="offcanvas">
                    <img src="{{ asset('front_assets/images/cart.png') }}">
                    <div class="count">5</div>
                </a>

                <div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="true" id="shopping-cart-responsive">

                    <div class="offcanvas-header">
                        <p class="offcanvas-title font-12">سبد خرید (4 کالا)</p>
                        <button type="button" class="text-reset btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="row">
                            <div class="col-4"><img src="{{ asset('front_assets/images/mobile1.jpg') }}"
                                                    class="img-fluid img-thumbnail"></div>
                            <div class="col-8 d-flex align-items-center">
                                <a href="#" class="cart-product-title">گوشی موبایل سامسونگ مدل Galaxy A21S
                                    SM-A217F/DS</a>
                            </div>
                        </div>
                        <div class="row my-3 border-bottom">
                            <div class="col-6 d-flex">
                                <span class="number">1 عدد</span>
                                <span class="color" style="background-color:#d4d4d4;"></span>
                                <i class="fa fa-trash cart-delete-btn"></i>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <p class="cart-product-price">4,169,000 تومان</p>
                            </div>
                        </div>
                    </div>
                    <div class="row cart-footer">
                        <div class="col-5">
                            <p>مبلغ قابل پرداخت:</p>
                            <p>12,480,000 تومان</p>
                        </div>
                        <div class="col-7">
                            <a href="login.html" class="btn btn-info font-13 btn-lg ms-4">ورود و ثبت سفارش</a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end shopping cart responsive-->
        </div>
    </div>
</header>
