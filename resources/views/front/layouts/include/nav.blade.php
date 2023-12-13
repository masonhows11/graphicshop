<nav class="d-none d-lg-block navigation"><!-- start main menu -->
    <div class="container">
        <ul class="main-menu">
            <li class="has-mega-menu">
                <a href="#"> دسته بندی محصولات <i class="fa fa-angle-down"></i></a>
                <!-- start mega menu-->
                <ul class="row mega-menu">
                    @foreach( $categories as $child )
                        <li class="col-3 mega-menu-box">
                            <ul>
                                <li class="menu-title">
                                    <a href="{{ route('search.category',['slug' => $child->slug]) }}"><i class="fa fa-angle-left me-2"></i>{{ $child->title}}</a>
                                </li>
                                @if( $child->children != null  )
                                    @include('front.partials.child_category',['category' => $child->children])
                                @endif
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <!-- end mega menu-->
            </li>
            <li><a href="javascript:void(0)">تخفیف‌ها و پیشنهادها</a></li>
            <li><a href="signup.html">ثبت نام / ورود</a></li>
            <li><a href="blog.html">وبلاگ</a></li>
            <li><a href="cart.html">سبد خرید</a></li>
            <li><a href="contact-us.html">تماس با ما</a></li>
            <li><a href="about-us.html">درباره ما</a></li>
        </ul>
    </div>
</nav>
