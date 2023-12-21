<header class="d-lg-none bg-white w-100">
    <div class="container">
        <div class="row py-2 header-section">

            <div class="col-7 d-flex flex-row">
                <a href="#mobile-menu" data-bs-toggle="offcanvas"><i class="fa fa-bars mobile-menu-icon"></i></a>
                <div class="offcanvas offcanvas-start" tabindex="-1" data-bs-scroll="true" id="mobile-menu">
                    <div class="offcanvas-header">
                        <a href="{{ route('home') }}"><h2 class="h2 text-danger main-logo">گرافیک لند</h2></a>
                        {{--  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>--}}
                    </div>
                    <div class="offcanvas-body px-0">
                        <form action="{{ route('search.products') }}" method="get" class="w-100">
                        <div class="input-group search-box px-3">
                            <input type="search" name="search" class="form-control form-control-lg" placeholder="جستجو در گرافیک شاپ">
                            <button type="submit" class="btn btn-danger"><img src="{{ asset('front_assets/images/search.png') }}">
                            </button>
                        </div>
                        </form>
                        <ul class="mobile-menu-level-1">
                            <li class="has-mobile-submenu"><a href="#">دسته بندی محصولات</a>

                                <ul class="mobile-menu-level-2">
                                    @foreach( $categories as $child )
                                        <li class="has-mobile-submenu-2">
                                                <a href="javascript:void(0)" class="d-inline">{{ $child->title }}</a>
                                            <ul class="mobile-menu-level-3 me-2">
                                                @if( $child->children != null  )
                                                    @include('front.layouts.partials.responsive_child_category',['category' => $child->children])
                                                @endif
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">تخفیف‌ها و پیشنهادها</a></li>
                            @guest
                            <li><a href="{{ route('auth.login.form') }}">ثبت نام / ورود</a></li>
                            @endguest
                            <li><a href="{{ route('home') }}"> محصولات </a>
                            <li><a href="{{ route('not.found') }}">وبلاگ</a></li>
                            <li><a href="{{ route('contact_us') }}">تماس با ما</a></li>
                            <li><a href="{{ route('about_us') }}">درباره ما</a></li>
                        </ul>
                    </div>
                </div>
                {{--  <img src="front_assets/images/logo.png" class="img-fluid"><!-- logo -->--}}
                <div class="ms-4"><a href="{{ route('home') }}"><h2 class="h2 text-danger main-logo">گرافیک لند</h2></a>
                </div>
            </div>


            @guest
            <div class="col-4 d-flex align-items-center justify-content-end">
                <a href="{{ route('auth.login.form') }}" class="header-login-btn me-4"><i
                        class="fa fa-user-lock"></i>ورود / ثبت نام</a>
            </div>
            @endguest
            @auth
            <div class="col-4 d-flex align-items-center justify-content-end">
                <div class="dropdown">
                    <a href="javascript:void(0)" class="header-user-btn  me-4 " data-bs-toggle="dropdown">
                        <i class="fa fa-user mt-2"></i></a>
                    <ul class="dropdown-menu dropdown-menu-custom">
                        <li class="d-flex flex-column justify-content-center align-items-center my-2">
                            <div>
                                <img src="{{  auth()->user()->image_path == null ? asset('default_image/no-user.png') : asset('default_image/no-user.png') }}" class="avatar" alt="user-avatar">
                            </div>
                            <div class="ms-2">
                                <a href="{{ route('user.profile') }}" class="font-12 d-block text-info mt-2">مشاهده حساب کاربری <i class="fa fa-chevron-left align-middle mt-1"></i></a>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="login-link text-center font-14 mt-4 text-dark">
                                @if(\Illuminate\Support\Facades\Auth::user()->name !== null)
                                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                @elseif(\Illuminate\Support\Facades\Auth::user()->email !== null)
                                    {{ \Illuminate\Support\Facades\Auth::user()->email }}
                                @else
                                    {{ __('messages.no_name') }}
                                @endif
                            </a>
                            <a href="{{ route('not.found') }}" class="login-link my-4"><i
                                    class="fa fa-shopping-basket text-muted font-14 me-1"></i> سفارش های من</a>
                            <a href="{{ route('not.found') }}" class="login-link my-4"><i
                                    class="fa fa-heart text-muted font-14 me-1"></i>علاقه مندی ها</a>
                            <a href="{{ route('not.found') }}" class="login-link my-4"><i
                                    class="fa fa-comment-alt text-muted font-14 me-1"></i>دیدگاه ها</a>
                            <a href="{{ route('auth.log.out') }}" class="login-link my-4"><i
                                    class="fas fa-sign-out-alt text-muted font-14 me-1"></i>خروج از حساب کاربری</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endauth

            <div class="col-1 d-flex align-items-center justify-content-end">
                <livewire:front.cart.cart-header />
            </div>

        </div>
    </div>
</header>
