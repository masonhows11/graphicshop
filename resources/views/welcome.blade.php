<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}">
    <title>قالب فروشگاهی نیک کالا | صفحه اصلی</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


<!-- start header -->
<header class="w-100 d-none d-lg-block bg-white"><!-- start header -->
    <div class="container">
        <div class="row  py-4">
            <div class="col-lg-2">
               {{-- <img src="front_assets/images/logo.png" alt="Nikkala">--}}
                <h2 class="h2 text-danger main-logo">گرافیک لند</h2>
            </div><!-- logo -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center"><!-- start search box -->
                <div class="input-group search-box">
                    <input type="search" class="form-control form-control-lg" placeholder="جستجو در نیک کالا">
                    <button type="submit" class="btn btn-danger"><img src="front_assets/images/search.png"></button>
                </div>
            </div><!-- end search box -->
            <div class="col-lg-3 d-flex align-items-center justify-content-end px-0"><!-- start signup & login -->
                <div class="dropdown">
                    <a href="#" class="header-login-btn me-4" data-bs-toggle="dropdown"><i class="fa fa-user-lock"></i>ورود / ثبت نام</a>
                    <ul class="dropdown-menu dropdown-menu-custom"><!-- start dropdown box -->
                        <li class="d-flex">
                            <img src="front_assets/images/avatar.jpg" class="avatar">
                            <div class="ms-2">
                                <a href="profile.html" class="font-14 text-dark">امیرحسین رضایی</a>
                                <a href="profile.html" class="font-12 d-block text-info mt-2">مشاهده حساب کاربری <i class="fa fa-chevron-left align-middle mt-1"></i></a>
                            </div>
                        </li>
                        <li>
                            <a href="profile.html" class="login-link"><i class="fa fa-shopping-basket text-muted font-14 me-1"></i> سفارش های من</a>
                            <a href="profile.html" class="login-link"><i class="fa fa-gift text-muted font-14 me-1"></i>جوایز نیک کلاب</a>
                            <a href="#" class="login-link"><i class="fas fa-sign-out-alt text-muted font-14 me-1"></i>خروج از حساب  کاربری</a>
                        </li>
                    </ul><!-- end dropdown box -->
                </div>
            </div><!-- end signup & login -->
            <div class="col-lg-1 d-flex align-items-center justify-content-center px-0"><!-- start shopping cart -->
                <a href="#shopping-cart" class="position-relative" data-bs-toggle="offcanvas">
                    <img src="front_assets/images/cart.png">
                    <div class="count">2</div>
                </a>
                <div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="true" id="shopping-cart"><!-- start shopping cart offcanvas -->

                    <div class="offcanvas-header"><!-- start offcanvas header -->
                        <p class="offcanvas-title font-12">سبد خرید (4 کالا)</p>
                        <button type="button" class="text-reset btn-close" data-bs-dismiss="offcanvas"></button>
                    </div><!-- end offcanvas header -->

                    <div class="offcanvas-body"><!-- start cart body -->

                        <div class="row"><!-- start cart item -->
                            <div class="col-4"><img src="front_assets/images/mobile1.jpg" class="img-fluid img-thumbnail"></div>
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
                                <p class="cart-product-price">4,169,000 تومان</p>
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

                    </div><!-- end cart body --> <!- https://t.me/sabz rea ->

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
            </div><!-- end shopping cart -->
        </div>
    </div>
</header>
<!-- end header -->


<!-- start responsive header-->
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
                                            <li><a href="search.html">گوشی موبایل</a></li>
                                            <li><a href="search.html">لوازم جانبی گوشی</a></li>
                                            <li><a href="search.html">تبلت</a></li>
                                            <li><a href="search.html">دوربین عکاسی</a></li>
                                        </ul><!-- start mobile menu level 3 -->

                                    </li>
                                    <li><a href="search.html">زیبایی و سلامت</a></li>
                                    <li><a href="search.html">مد و پوشاک</a></li>
                                    <li><a href="search.html">خانه و آشپزخانه</a></li>
                                    <li><a href="search.html">کتاب و لوازم تحریر</a></li>
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
                                    <li><a href="profile.html">پروفایل کاربر</a></li>
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
                                <a href="profile.html" class="font-14 text-dark">امیرحسین رضایی</a>
                                <a href="profile.html" class="font-12 d-block text-info mt-2">مشاهده حساب کاربری <i class="fa fa-chevron-left align-middle mt-1"></i></a>
                            </div>
                        </li>
                        <li>
                            <a href="profile.html" class="login-link"><i class="fa fa-shopping-basket text-muted font-14 me-1"></i> سفارش های من</a>
                            <a href="profile.html" class="login-link"><i class="fa fa-gift text-muted font-14 me-1"></i>جوایز نیک کلاب</a>
                            <a href="#" class="login-link"><i class="fas fa-sign-out-alt text-muted font-14 me-1"></i>خروج از حساب  کاربری</a>
                        </li>
                    </ul><!-- end dropdown box -->
                </div><!-- end signup & login dropdown -->
            </div>

            <div class="col-1 d-flex align-items-center justify-content-end"><!-- start shopping cart responsive-->
                <a href="#shopping-cart-responsive" class="position-relative" data-bs-toggle="offcanvas">
                    <img src="front_assets/images/cart.png">
                    <div class="count">2</div>
                </a>
                <div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="true" id="shopping-cart-responsive"><!-- start shopping cart offcanvas -->

                    <div class="offcanvas-header"><!-- start offcanvas header -->
                        <p class="offcanvas-title font-12">سبد خرید (4 کالا)</p>
                        <button type="button" class="text-reset btn-close" data-bs-dismiss="offcanvas"></button>
                    </div><!-- end offcanvas header -->

                    <div class="offcanvas-body"><!-- start cart body --><!- https://t.me/sabzrea ->

                        <div class="row"><!-- start cart item -->
                            <div class="col-4"><img src="front_assets/images/mobile1.jpg" class="img-fluid img-thumbnail"></div>
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
            </div><!-- end shopping cart responsive-->
        </div>
    </div>
</header>
<!-- end responsive header-->

<!-- start main menu -->
<nav class="d-none d-lg-block navigation"><!-- start main menu -->
    <div class="container">
        <ul class="main-menu">
            <li class="has-mega-menu"><a href="#"> دسته بندی محصولات <i class="fa fa-angle-down"></i></a>
                <ul class="row mega-menu"><!-- start mega menu-->
                    <li class="col-3 mega-menu-box">
                        <ul>
                            <li class="menu-title"><i class="fa fa-angle-left"></i>کالای دیجیتال</li>
                            <li><a href="search.html">گوشی موبایل</a></li>
                            <li><a href="search.html">لوازم جانبی گوشی</a></li>
                            <li><a href="search.html">لپ تاپ</a></li>
                            <li><a href="search.html">لوازم جانبی لپ تاپ</a></li>
                            <li><a href="search.html">تبلت</a></li>
                            <li><a href="search.html">مچ بند و ساعت هوشمند</a></li>
                            <li><a href="search.html">مودم و تجهیزات شبکه</a></li>
                        </ul>
                    </li>
                    <li class="col-3 mega-menu-box" >
                        <ul>
                            <li class="menu-title"><i class="fa fa-angle-left"></i>زیبایی و سلامت</li>
                            <li><a href="search.html">لوازم آرایشی</a></li>
                            <li><a href="search.html">لوازم بهداشتی</a></li>
                            <li><a href="search.html">عطر،ادکلن،اسپری و ست</a></li>
                            <li><a href="search.html">ابزار سلامت و طبی</a></li>
                            <li><a href="search.html">لوازم شخصی برقی</a></li>
                        </ul>
                        <ul><!- https://t.me/sabzrea ->
                            <li class="menu-title"><i class="fa fa-angle-left"></i>مد و پوشاک</li>
                            <li><a href="search.html">لباس زنانه</a></li>
                            <li><a href="search.html">لباس مردانه</a></li>
                        </ul>
                    </li>
                    <li class="col-3 mega-menu-box" >
                        <ul>
                            <li class="menu-title"><i class="fa fa-angle-left"></i>خانه و آشپزخانه</li>
                            <li><a href="search.html">صوتی و تصویری</a></li>
                            <li><a href="search.html">لوازم برقی خانگی</a></li>
                            <li><a href="search.html">فرش ماشینی، دستبافت، تابلو</a></li>
                        </ul>
                        <ul>
                            <li class="menu-title"><i class="fa fa-angle-left"></i>اسباب بازی، کودک و نوزاد</li>
                            <li><a href="search.html">پوشاک کودک و نوزاد</a></li>
                            <li><a href="search.html">بازی و سرگرمی کودک</a></li>
                            <li><a href="search.html">سلامت، ایمنی و مراقبت</a></li>
                        </ul>
                    </li>
                    <li class="col-3 mega-menu-box" >
                        <ul>
                            <li class="menu-title"><i class="fa fa-angle-left"></i>کتاب و لوازم تحریر</li>
                            <li><a href="search.html">کتاب و مجله</a></li>
                            <li><a href="search.html">کتاب صوتی</a></li>
                            <li><a href="search.html">لوازم تحریر</a></li>
                        </ul>
                        <a href="#" class="d-block"><img src="front_assets/images/menu-pic.jpg" class="img-fluid rounded mt-3"></a>
                    </li>
                </ul><!-- end mega menu--><!- https://t.me/sabzrea ->
            </li>
            <li><a href="search.html">تخفیف‌ها و پیشنهادها</a></li>
            <li class="has-sub-menu"><a href="#">صفحات <i class="fa fa-angle-down"></i></a>
                <ul class="sub-menu"><!-- start sub menu-->
                    <li><a href="signup.html">ثبت نام / ورود</a></li>
                    <li class="has-sub-menu-level-2"><a href="#">محصولات</a><i class="fa fa-angle-down"></i>
                        <ul class="sub-menu-level-2"><!-- start sub menu level 2 -->
                            <li><a href="product.html">محصول موجود</a></li>
                            <li><a href="product-unavailable.html">محصول ناموجود</a></li>
                            <li><a href="404.html">خطای 404</a></li>
                        </ul><!-- end sub menu level 2 -->
                    </li>
                    <li><a href="profile.html">پروفایل کاربر</a></li>
                    <li><a href="blog.html">وبلاگ</a></li>
                    <li><a href="cart.html">سبد خرید</a></li>
                </ul><!-- end sub menu-->
            </li>
            <li><a href="contact-us.html">تماس با ما</a></li>
            <li><a href="about-us.html">درباره ما</a></li>
        </ul>
    </div>
</nav>
<!-- end main menu -->


<!-- start main slider -->
<section class="main-slider">
    <div id="main-slider" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#main-slider" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#main-slider" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#main-slider" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#main-slider" data-bs-slide-to="3"></button>
        </div>
        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="#" target="_blank" class="d-block w-100"><img src="front_assets/images/main-slider-1.png" class="d-block w-100"></a>
            </div>
            <div class="carousel-item">
                <a href="#" target="_blank" class="d-block w-100"><img src="front_assets/images/main-slider-2.png" class="d-block w-100"></a>
            </div>
            <div class="carousel-item">
                <a href="#" target="_blank" class="d-block w-100"><img src="front_assets/images/main-slider-1.png" class="d-block w-100"></a>
            </div>
            <div class="carousel-item">
                <a href="#" target="_blank" class="d-block w-100"><img src="front_assets/images/main-slider-2.png" class="d-block w-100"></a>
            </div>
        </div>
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#main-slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#main-slider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>
<!-- end main slider -->

<!-- start main content -->
<main>
    <div class="container">

        <!-- start ads -->
        <div class="row mt-5">
            <div class="col-xxl-3 col-xl-3 col-md-3 col-6 mb-3"><a href="#" target="_blank" class="d-block w-100"><img src="front_assets/images/ads1.jpg" class="ads-img"></a></div>
            <div class="col-xxl-3 col-xl-3 col-md-3 col-6 mb-3"><a href="#" target="_blank" class="d-block w-100"><img src="front_assets/images/ads2.jpg" class="ads-img"></a></div>
            <div class="col-xxl-3 col-xl-3 col-md-3 col-6 mb-3"><a href="#" target="_blank" class="d-block w-100"><img src="front_assets/images/ads3.jpg" class="ads-img"></a></div>
            <div class="col-xxl-3 col-xl-3 col-md-3 col-6 mb-3"><a href="#" target="_blank" class="d-block w-100"><img src="front_assets/images/ads4.jpg" class="ads-img"></a></div>
        </div>
        <!-- end ads -->


        <div class="product-slider"><!-- start product slider -->
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h4>گوشی موبایل</h4>
                    </div>
                    <div class="owl-carousel owl-theme custom-product-slider">

                        <div class="item"><!-- start item -->
                            <div class="card border-0 custom-card mt-3">
                                <a href="product.html" class="d-block w-100"><img src="front_assets/images/mobile1.jpg" class="slider-pic"></a>
                                <div class="card-body">
                                    <a href="product.html" class="product-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
                                    <div class="d-flex justify-content-between">
                                        <div class="mt-3 ps-4">
                                            <span class="heart"><i class="far fa-heart font-14 text-muted me-2"></i></span>
                                            <span class="random"><i class="fa fa-random font-14 text-muted me-2"></i></span>
                                            <span class="add-to-cart"><i class="fa fa-cart-plus font-13 text-muted"></i></span>
                                        </div>
                                        <p class="font-13 mt-3 pe-4">۴,۱۶۹,۰۰۰تومان</p>
                                    </div>
                                </div><!- https://t.me/sabzrea ->
                            </div>
                        </div><!-- end item -->

                        <div class="item"><!-- start item -->
                            <div class="card border-0 custom-card mt-3">
                                <a href="product.html" class="d-block w-100"><img src="front_assets/images/mobile2.jpg" class="slider-pic"></a>
                                <div class="card-body">
                                    <a href="product.html" class="product-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
                                    <div class="d-flex justify-content-between">
                                        <div class="mt-3 ps-4">
                                            <span class="heart"><i class="far fa-heart font-14 text-muted me-2"></i></span>
                                            <span class="random"><i class="fa fa-random font-14 text-muted me-2"></i></span>
                                            <span class="add-to-cart"><i class="fa fa-cart-plus font-13 text-muted"></i></span>
                                        </div>
                                        <p class="font-13 mt-3 pe-4">۴,۱۶۹,۰۰۰تومان</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end item -->

                        <div class="item"><!-- start item -->
                            <div class="card border-0 custom-card mt-3">
                                <a href="product.html" class="d-block w-100"><img src="front_assets/images/mobile3.jpg" class="slider-pic"></a>
                                <div class="card-body">
                                    <a href="product.html" class="product-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
                                    <div class="d-flex justify-content-between">
                                        <div class="mt-3 ps-4">
                                            <span class="heart"><i class="far fa-heart font-14 text-muted me-2"></i></span>
                                            <span class="random"><i class="fa fa-random font-14 text-muted me-2"></i></span>
                                            <span class="add-to-cart"><i class="fa fa-cart-plus font-13 text-muted"></i></span>
                                        </div>
                                        <p class="font-13 mt-3 pe-4">۴,۱۶۹,۰۰۰تومان</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end item -->
                        <!- https://t.me/sabzrea ->
                        <div class="item"><!-- start item -->
                            <div class="card border-0 custom-card mt-3">
                                <a href="product.html" class="d-block w-100"><img src="front_assets/images/mobile4.jpg" class="slider-pic"></a>
                                <div class="card-body">
                                    <a href="product.html" class="product-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
                                    <div class="d-flex justify-content-between">
                                        <div class="mt-3 ps-4">
                                            <span class="heart"><i class="far fa-heart font-14 text-muted me-2"></i></span>
                                            <span class="random"><i class="fa fa-random font-14 text-muted me-2"></i></span>
                                            <span class="add-to-cart"><i class="fa fa-cart-plus font-13 text-muted"></i></span>
                                        </div>
                                        <p class="font-13 mt-3 pe-4">۴,۱۶۹,۰۰۰تومان</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end item -->

                        <div class="item"><!-- start item -->
                            <div class="card border-0 custom-card mt-3">
                                <a href="product.html" class="d-block w-100"><img src="front_assets/images/mobile2.jpg" class="slider-pic"></a>
                                <div class="card-body">
                                    <a href="product.html" class="product-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
                                    <div class="d-flex justify-content-between">
                                        <div class="mt-3 ps-4">
                                            <span class="heart"><i class="far fa-heart font-14 text-muted me-2"></i></span>
                                            <span class="random"><i class="fa fa-random font-14 text-muted me-2"></i></span>
                                            <span class="add-to-cart"><i class="fa fa-cart-plus font-13 text-muted"></i></span>
                                        </div>
                                        <p class="font-13 mt-3 pe-4">۴,۱۶۹,۰۰۰تومان</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end item -->
                        <!- https://t.me/sabzrea ->
                    </div>
                </div>
            </div>
        </div><!-- end product slider -->

        <div class="row"><!-- start ads -->
            <div class="col-xxl-6 col-xl-6 col-md-6 mb-3"><a href="#" target="_blank" class="d-block w-100"><img src="front_assets/images/ads5.gif" class="ads-img"></a></div>
            <div class="col-xxl-6 col-xl-6 col-md-6 mb-3"><a href="#" target="_blank" class="d-block w-100"><img src="front_assets/images/ads5.jpg" class="ads-img"></a></div>
        </div><!-- end ads -->

        <div class="category-box"><!-- start category box -->
            <h4>دسته‌بندی‌های نیک کالا</h4>
            <div class="row">
                <div class="col-4 col-md-3 col-lg text-center"><a href="search.html"><i class="fas fa-laptop"></i><p>کالای دیجیتال</p><p class="text-info">+825000 کالا</p></a></div>
                <div class="col-4 col-md-3 col-lg text-center"><a href="search.html"><i class="fas fa-tools"></i><p> ابزار و تجهیزات </p><p class="text-info">+146000 کالا</p></a></div>
                <div class="col-4 col-md-3 col-lg text-center"><a href="search.html"><i class="fas fa-tshirt"></i><p>مد و پوشاک</p><p class="text-info">+658000 کالا</p></a></div>
                <div class="col-4 col-md-3 col-lg text-center"><a href="search.html"><i class="fas fa-baby-carriage"></i><p>کودک و نوزاد</p><p class="text-info">+69000 کالا</p></a></div>
                <div class="col-4 col-md-3 col-lg text-center"><a href="search.html"><i class="fas fa-shopping-basket"></i><p>کالاهای سوپرمارکتی</p><p class="text-info">+60000 کالا</p></a></div>
                <div class="col-4 col-md-3 col-lg text-center"><a href="search.html"><i class="fas fa-heartbeat"></i><p>زیبایی و سلامت</p><p class="text-info">+98000 کالا</p></a></div>
                <div class="col-4 col-md-3 col-lg text-center"><a href="search.html"><i class="fas fa-couch"></i><p>خانه و آشپزخانه</p><p class="text-info">+477000 کالا</p></a></div>
                <div class="col-4 col-md-3 col-lg text-center"><a href="search.html"><i class="fas fa-pencil-ruler"></i><p>کتاب و لوازم تحریر </p><p class="text-info">+251000 کالا</p></a></div>
                <div class="col-4 col-md col-lg text-center"><a href="search.html"><i class="fas fa-campground"></i><p>ورزش و سفر</p><p class="text-info">+31000 کالا</p></a></div>
            </div>
        </div><!-- end category box -->


        <!-- start blog box -->
        <div class="product-slider">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h4>خواندنی ها </h4>
                    </div>
                    <div class="row mt-4 px-2">

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-6 mb-3"><!-- start item -->
                            <a href="blog-detail.html" class="d-block">
                                <div class="card blog-card">
                                    <img src="front_assets/images/mag-1.jpg" class="blog-img">
                                    <div class="card-body">
                                        <a href="blog-detail.html">طرز تهیه رولت کرپ با کرم فندق؛ آسان و بدون نیاز به فر</a>
                                    </div>
                                </div>
                            </a>
                        </div><!-- end item -->

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-6 mb-3"><!-- start item -->
                            <a href="blog-detail.html" class="d-block">
                                <div class="card blog-card">
                                    <img src="front_assets/images/mag-2.jpg" class="blog-img">
                                    <div class="card-body">
                                        <a href="blog-detail.html">بررسی خردکن سیلور کرست مدل SLMA مناسب کارهای دم‌دستی</a>
                                    </div>
                                </div>
                            </a>
                        </div><!-- end item -->

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-6 mb-3"><!-- start item -->
                            <a href="blog-detail.html" class="d-block">
                                <div class="card blog-card">
                                    <img src="front_assets/images/mag-3.jpg" class="blog-img">
                                    <div class="card-body">
                                        <a href="blog-detail.html">۱۰ اشتباه که کاربران تازه‌ وارد گوشی‌های اندرویدی مرتکب می‌شوند</a>
                                    </div>
                                </div>
                            </a>
                        </div><!-- end item -->

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-6 mb-3"><!-- start item -->
                            <a href="blog-detail.html" class="d-block">
                                <div class="card blog-card">
                                    <img src="front_assets/images/mag-4.jpg" class="blog-img">
                                    <div class="card-body">
                                        <a href="blog-detail.html">راهنمای خرید بهترین گوشی سامسونگ سری A؛ گزینه‌های ایده‌آل خرید</a>
                                    </div>
                                </div>
                            </a>
                        </div><!-- end item -->

                    </div>
                </div>
            </div>
        </div><!-- end blog box -->

    </div>
</main><!-- end main -->

<footer><!-- start footer -->
    <div class="container">
        <div class="row footer-svg-icons border-bottom mx-2 py-2">
            <div class="col-6 col-md text-center"><img src="front_assets/images/1.svg"><p>تحویل اکسپرس</p></div>
            <div class="col-6 col-md text-center"><img src="front_assets/images/2.svg"><p >پشتیبانی 24 ساعته </p></div>
            <div class="col-6 col-md text-center"><img src="front_assets/images/3.svg"><p>پرداخت در محل </p></div>
            <div class="col-6 col-md text-center"><img src="front_assets/images/4.svg"><p>7 روز ضمانت بازگشت کالا</p></div>
            <div class="col-12 col-md text-center"><img src="front_assets/images/5.svg"><p>ضمانت اصل بودن کالا</p></div>
        </div>
        <div class="row"><!-- start footer box -->
            <div class="col-lg-2 col-sm-6 footer-box">
                <p>با نیک کالا </p>
                <ul class="ps-0">
                    <li class="mb-3"><a href="contact-us.html">اتاق خبر نیک کالا</a></li>
                    <li class="mb-3"><a href="contact-us.html">فرصت های شغلی</a></li>
                    <li class="mb-3"><a href="contact-us.html">تماس با نیک کالا</a></li>
                    <li class="mb-3"><a href="contact-us.html">درباره نیک کالا</a></li>
                </ul><!- https://t.me/sabzrea ->
            </div>
            <div class="col-lg-2 col-sm-6 footer-box">
                <p>خدمات مشتریان</p>
                <ul class="ps-0">
                    <li class="mb-3"><a href="contact-us.html">پرسش‌های متداول</a></li>
                    <li class="mb-3"><a href="contact-us.html">شرایط استفاده</a></li>
                    <li class="mb-3"><a href="contact-us.html">حریم خصوصی</a></li>
                    <li class="mb-3"><a href="contact-us.html">گزارش تخلف</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 footer-box">
                <p>راهنمای خرید از نیک کالا</p>
                <ul class="ps-0">
                    <li class="mb-3"><a href="contact-us.html">نحوه ثبت سفارش</a></li>
                    <li class="mb-3"><a href="contact-us.html">رویه ارسال سفارش</a></li>
                    <li class="mb-3"><a href="contact-us.html">شیوه‌های پرداخت</a></li>
                    <li class="mb-3"><a href="contact-us.html">رویه‌های بازگرداندن کالا</a></li>
                </ul>
            </div><!- https://t.me/sabzrea ->
            <div class="col-lg-5 col-sm-6 footer-box">
                <p class="mb-4">همراه ما باشید!</p>
                <div class="social-list">
                    <a href="#"><i class="fab fa-instagram social-media"></i></a>
                    <a href="#"><i class="fab fa-telegram social-media"></i></a>
                    <a href="#"><i class="fab fa-linkedin social-media"></i></a>
                    <a href="#"><i class="fab fa-twitter social-media"></i></a>
                </div>
                <p>با ثبت ایمیل، از جدید‌ترین تخفیف‌ها با‌خبر شوید</p>
                <div class="input-group mt-4 mb-5 email-box">
                    <input type="email" class="form-control form-control-lg" placeholder="ایمیل شما">
                    <button type="submit" class="btn btn-danger font-13 px-3">ارسال</button>
                </div>
            </div><!- https://t.me/sabzrea ->
        </div><!-- end footer box -->
        <div class="row d-none d-sm-block"><!-- start app download -->
            <div class="col-12 app-download">
                <div class="row">
                    <div class="col-5 d-flex align-items-center">
                        <img src="front_assets/images/footerLogo.png" class="p-2">
                        <span class="text-white ms-2"> دانلود اپلیکیشن</span>
                    </div>
                    <div class="col-7 d-flex align-items-center justify-content-end">
                        <a href="#"><img src="front_assets/images/bazzar.svg" class="img-fluid me-2 rounded"></a>
                        <a href="#"><img src="front_assets/images/sib-app.svg" class="img-fluid rounded"></a>
                    </div>
                </div>
            </div><!- https://t.me/sabzrea ->
        </div><!-- end app download -->
        <div class="row"><!-- start footer details -->
            <div class="col-md-8 col-12 footer-details ps-0">
                <p>فروشگاه اینترنتی نیک کالا، بررسی، انتخاب و خرید آنلاین</p>
                <span>
                        نیک کالا به عنوان یکی از قدیمی‌ترین فروشگاه های
                        اینترنتی با بیش از یک دهه تجربه،
                        با پایبندی به سه اصل، پرداخت در محل، هفت روز ضمانت بازگشت کالا و تضمین اصل‌بودن
                        کالا موفق شده تا همگام با فروشگاه‌های معتبر جهان، به بزرگ‌ترین فروشگاه اینترنتی
                        ایران تبدیل شود.
                    </span>
            </div>
            <div class="col-md-4 col-12 d-flex align-items-center justify-content-end footer-pic pe-0">
                <img src="front_assets/images/f-1.png" class="footer-detail-pic">
                <img src="front_assets/images/f-2.png" class="footer-detail-pic">
            </div><!- https://t.me/sabzrea ->
        </div><!-- end footer details -->
        <div class="row"><!-- start copy right -->
            <div class="col-12 copy-right">
                <p>استفاده از مطالب فروشگاه اینترنتی نیک کالا فقط برای مقاصد غیرتجاری و
                    با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به یاس دیزاین می‌باشد.
                </p>
            </div>
        </div><!-- end copy right -->
    </div>
    <a href="#" class="topbutton"><i class="fa fa-chevron-up"></i></a><!-- top button -->
</footer><!-- end footer -->

<script src="front_assets/js/jquery.min.js"></script>
<script src="front_assets/js/bootstrap.bundle.min.js"></script>
<script src="front_assets/js/owl.carousel.min.js"></script>
<script src="front_assets/js/jquery.simple.timer.js"></script>
<script src="front_assets/js/script.js"></script>
</body>

<!- https://t.me/sabzrea ->
</html>
