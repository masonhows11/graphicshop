<header class="d-lg-none bg-white w-100">
    <div class="container">
        <div class="row py-2">

            <div class="col-7">
                <a href="#mobile-menu" data-bs-toggle="offcanvas"><i class="fa fa-bars mobile-menu-icon"></i></a><!-- mobile menu icon -->
                <div class="offcanvas offcanvas-start" tabindex="-1" data-bs-scroll="true" id="mobile-menu"><!-- start mobile menu-->

                    <div class="offcanvas-header"><!-- start menu header -->
                        <img src="front_assets/images/logo.png">
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                    </div><!-- end menu header -->

                    <div class="offcanvas-body px-0">

                        <div class="input-group search-box px-3"><!-- start search box -->
                            <input type="search" class="form-control form-control-lg" placeholder="جستجو در نیک کالا">
                            <button type="submit" class="btn btn-danger"><img src="front_assets/images/search.png"></button>
                        </div><!-- end search box -->

                        <ul class="mobile-menu-level-1"><!-- start mobile menu level 1 -->
                            <li class="has-mobile-submenu"><a href="#">دسته بندی محصولات</a>

                                <ul class="mobile-menu-level-2"><!-- start mobile menu level 2 -->
                                    <li class="has-mobile-submenu-2"><a href="#">کالای دیجیتال</a>

                                        <ul class="mobile-menu-level-3"><!-- start mobile menu level 3 -->
                                            <li><a href="javascript:void(0)">گوشی موبایل</a></li>
                                            <li><a href="javascript:void(0)">لوازم جانبی گوشی</a></li>
                                            <li><a href="javascript:void(0)">تبلت</a></li>
                                            <li><a href="javascript:void(0)">دوربین عکاسی</a></li>
                                        </ul><!-- start mobile menu level 3 -->

                                    </li>
                                    <li><a href="javascript:void(0)">زیبایی و سلامت</a></li>
                                    <li><a href="javascript:void(0)">مد و پوشاک</a></li>
                                    <li><a href="javascript:void(0)">خانه و آشپزخانه</a></li>
                                    <li><a href="javascript:void(0)">کتاب و لوازم تحریر</a></li>
                                </ul><!-- end mobile menu level 2 -->

                            </li>
                            <li><a href="#">تخفیف‌ها و پیشنهادها</a></li>
                            <li class="has-mobile-submenu"><a href="#">صفحات</a>

                                <ul class="mobile-menu-level-2"><!-- start mobile menu level 2 -->
                                    <li><a href="signup.html">ثبت نام / ورود</a></li>
                                    <li class="has-mobile-submenu-2"><a href="#"> محصولات </a>

                                        <ul class="mobile-menu-level-3"><!-- start mobile menu level 3 -->
                                            <li><a href="product.html">محصول موجود</a></li>
                                            <li><a href="product-unavailable.html">محصول ناموجود</a></li>
                                        </ul><!-- start mobile menu level 3 -->

                                    </li>
                                    <li><a href="javascript:void(0)">پروفایل کاربر</a></li>
                                    <li><a href="blog.html">وبلاگ</a></li>
                                </ul><!-- end mobile menu level 2 -->

                            </li>
                            <li><a href="contact-us.html">تماس با ما</a></li>
                            <li><a href="about-us.html">درباره ما</a></li>
                        </ul><!-- end mobiile menu level 1 -->

                    </div>
                </div><!-- end mobile menu-->
                <img src="front_assets/images/logo.png" class="img-fluid"><!-- logo -->
            </div>

            <div class="col-4 d-flex align-items-center justify-content-end"><!-- start signup & login dropdown -->
                <div class="dropdown">
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
                </div><!-- end signup & login dropdown -->
            </div>

            <!-- start shopping cart responsive-->
            <div class="col-1 d-flex align-items-center justify-content-end">
                <a href="#shopping-cart-responsive" class="position-relative" data-bs-toggle="offcanvas">
                    <img src="{{ asset('front_assets/images/cart.png') }}">
                    <div class="count">2</div>
                </a>
                <div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="true" id="shopping-cart-responsive"><!-- start shopping cart offcanvas -->

                    <div class="offcanvas-header"><!-- start offcanvas header -->
                        <p class="offcanvas-title font-12">سبد خرید (4 کالا)</p>
                        <button type="button" class="text-reset btn-close" data-bs-dismiss="offcanvas"></button>
                    </div><!-- end offcanvas header -->

                    <div class="offcanvas-body"><!-- start cart body -->

                        <div class="row"><!-- start cart item -->
                            <div class="col-4"><img src="{{ asset('front_assets/images/mobile1.jpg') }}" class="img-fluid img-thumbnail"></div>
                            <div class="col-8 d-flex align-items-center">
                                <a href="product.html" class="cart-product-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
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
                        </div><!-- end cart item -->

                        <div class="row"><!-- start cart item -->
                            <div class="col-4"><img src="front_assets/images/mobile2.jpg" class="img-fluid img-thumbnail"></div>
                            <div class="col-8 d-flex align-items-center">
                                <a href="product.html" class="cart-product-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
                            </div>
                        </div>
                        <div class="row my-3 border-bottom">
                            <div class="col-6 d-flex">
                                <span class="number">1 عدد</span>
                                <span class="color" style="background-color:#d4d4d4;"></span>
                                <i class="fa fa-trash cart-delete-btn"></i>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <p class="cart-product-price">4,169,000 تومان</p><!- https://t.me/sabzrea ->
                            </div>
                        </div><!-- end cart item -->

                        <div class="row"><!-- start cart item -->
                            <div class="col-4"><img src="front_assets/images/mobile3.jpg" class="img-fluid img-thumbnail"></div>
                            <div class="col-8 d-flex align-items-center">
                                <a href="product.html" class="cart-product-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
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
                        </div><!-- end cart item -->

                    </div><!-- end cart body -->

                    <div class="row cart-footer"><!-- start cart footer-->
                        <div class="col-5">
                            <p>مبلغ قابل پرداخت:</p>
                            <p>12,480,000 تومان</p>
                        </div>
                        <div class="col-7">
                            <a href="login.html" class="btn btn-info font-13 btn-lg ms-4">ورود و ثبت سفارش</a>
                        </div>
                    </div><!-- end cart footer-->

                </div><!-- end shopping cart offcanvas -->
            </div>
            <!-- end shopping cart responsive-->
        </div>
    </div>
</header>
