@extends( 'front.layouts.master_front')
@section( 'page_title')
    {{ $product->title }}
@endsection
@section('main_content')

    <!-- start breadcrumb -->
    {{--@include('front.product.partials.breadcrumb_product',['productCategories' => $productCategories])--}}
    <!-- end breadcrumb -->

    <main><!-- start main -->
        <div class="container">

            <!-- start product content -->
            <div class="product-content mt-5">
                <div class="row mt-5">
                    <div class="col-lg-4 col-12">
                        <div class="row">
                            <div class="col-1 text-center product-icons"><!-- start product icons -->
                                <i class="far fa-heart heart d-block my-4" data-bs-toggle="tooltip" data-bs-placement="top" title="افزودن به علاقمندی ها"></i>
                                <span data-bs-toggle="modal" data-bs-target="#share-modal"><i class="fa fa-share-alt share d-block my-4" data-bs-toggle="tooltip" data-bs-placement="top" title="اشتراک گذاری"></i></span>
                                <div class="modal fade" id="share-modal"><!-- start share modal -->
                                    <div class="modal-dialog  modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title font-13">اشتراک گذاری</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="font-12">این کالا را با دوستان خود به اشتراک بگذارید!</p>
                                                <a href="#" class="btn btn-share"><i class="fa fa-copy me-2"></i>کپی کردن لینک</a>
                                                <div class="d-flex justify-content-center mt-4">
                                                    <a href="#"><i class="fab fa-instagram text-danger social-media"></i></a>
                                                    <a href="#"><i class="fab fa-telegram text-info social-media"></i></a>
                                                    <a href="#"><i class="fab fa-whatsapp text-success social-media"></i></a>
                                                    <a href="#"><i class="fab fa-twitter text-primary social-media"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end share modal -->
                                <i class="fas fa-random random d-block my-4" data-bs-toggle="tooltip" data-bs-placement="top" title="مقایسه کالا"></i>
                            </div><!-- end product icons -->

                            <div class="col-11 pb-5 mb-3"><!-- start product slider pic -->
                                <div class="carousel slide pb-5 product-slider-2" id="product-slider" data-bs-ride="carousel">
                                    <div class="carousel-indicators carousel-indicator-custom">
                                        <button type="button" data-bs-target="#product-slider" data-bs-slide-to="0" class="active">
                                            <img src="assets/images/product-slider1.jpg" class="d-block w-100">
                                        </button>
                                        <button type="button" data-bs-target="#product-slider" data-bs-slide-to="1">
                                            <img src="assets/images/product-slider2.jpg" class="d-block w-100">
                                        </button>
                                        <button type="button" data-bs-target="#product-slider" data-bs-slide-to="2">
                                            <img src="assets/images/product-slider3.jpg" class="d-block w-100">
                                        </button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="assets/images/product-slider1.jpg" class="d-block w-100">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/product-slider2.jpg" class="d-block w-100">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/product-slider3.jpg" class="d-block w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- start product details -->
                    <div class="col-lg-5 col-md-8 product-details">
                        <div class="alert alert-warning font-12 line-height text-justify mt-5">
                            هشدار سامانه همتا: حتما در زمان تحویل دستگاه، به کمک کد فعال‌سازی چاپ شده روی جعبه یا کارت گارانتی، دستگاه را
                            از طریق #7777*، برای سیم‌کارت خود فعال‌سازی کنید. آموزش تصویری در آدرس اینترنتی hmti.ir/05
                        </div>
                    </div>
                    <!-- end product details -->

                    <!-- start add to cart box -->
                    <div class="col-lg-3 col-md-4">
                        <div class="add-cart-box">
                            <div class="product-seller-row">
                                <span>فروشنده :</span>
                                <span>نیک کالا</span>
                            </div>
                            <div class="product-seller-row">
                                <span>گارانتی:</span>
                                <span>18 ماهه سامسونگ</span>
                            </div>
                            <div class="product-seller-row">
                                <span>وضعیت :</span>
                                <span>موجود در انبار</span>
                            </div><!- https://t.me/sabzrea ->
                            <div class="product-seller-row">
                                <span>قیمت :</span>
                                <span class="text-danger">14,350,000 تومان</span>
                            </div>
                            <button type="button" class="btn add-cart-btn">افزودن به سبد خرید</button>
                        </div>
                    </div>
                    <!-- end add to cart box -->

                </div>
            </div><!-- end product content -->


            <!-- start product tab content -->
            <div class="product-tab-content">
                <div class="row pb-3">
                    <div class="col-12">
                        <ul class="nav nav-pills custom-nav-pills"><!-- start  tabs -->
                            <li class="nav-item"><a href="#description" data-bs-toggle="tab" class="nav-link active">نقد و بررسی</a></li>
                            <li class="nav-item"><a href="#comment" data-bs-toggle="tab" class="nav-link">نظرات کاربران</a></li>
                            <li class="nav-item"><a href="#question" data-bs-toggle="tab" class="nav-link">پرسش و پاسخ </a></li>
                        </ul><!-- end  tabs -->

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description"><!-- start description -->
                                <p class="m-3 font-14">نقد و بررسی اجمالی</p>
                                <p class="m-3 font-13">Samsung Galaxy S10 Plus SM-G975F/DS Dual SIM 128GB Mobile Phone</p>
                                <p class="font-14 line-height mx-3 text-justify">در دنیای امروزی ما، گوشی‌های همراه اسمارت یکی از اعضای خانواده‌های ما شده و بسیاری از کارهایی که در روزمره
                                    انجام می‌دهیم، الزام به وجود آن‌ها دارد. با پیشرفت تکنولوژی این گوشی‌ها هم روزانه دارای تغییرات و پیشرفت می‌شوند. یکی از کمپانی‌های بزرگ و مطرح در سطح جهانی سامسونگ
                                    است که گوشی‌هایی با محبوبیت و طرف‌داری بالایی تولید می‌کند و سالانه فروش بسیاری از بازار را به‌دلیل کیفیت به خود اختصاص می‌دهد. گوشی موبایل سامسونگ مدل Galaxy S20 FE SM-G780F/DS دو سیم کارت ظرفیت 128 گیگابایت یکی
                                    از همان گوشی‌های باکیفیت این برند است که می‌تواند تمامی نیازهای ما مانند وب‌گردی، بازی آفلاین و آنلاین، تماشای فیلم و کلیپ، شبکه‌های اجتماعی، کار با Applications (نرم‌افزارها) و بسیاری دیگر را انجام دهید.
                                </p>
                                <img src="assets/images/mobile-banner.jpg" class="mobile-banner">
                                <p class="font-14 line-height mx-3 text-justify">گفتنی است که این گوشی با تمامی قابلیت‌هایی که دارد، یک گوشی پرچمدار است. یکی از ویژگی‌های این گوشی باتری آن است. برای گوشی Galaxy S20 FE باتری لیتیوم-پلیمری با ظرفیت ۴۵۰۰ میلی‌آمپرساعت در نظر گرفته‌اند که شما می‌تواند با خیالی آسوده به کار کردن با گوشی بپردازید. شما اگر این گوشی را با باتری ۱۰۰ درصد
                                    در اختیار داشته باشد می‌توانید در ۱ یا ۳ روز تمامی ظرفیت باتری آن استفاده کنید و این موضوع کاملا به نوع استفاده شما بستگی دارد.
                                    از این گوشی می‌توانید استفاده‌های بسیار متنوع و باکیفیتی در عکاسی داشته باشید. پردازنده مرکزی (CPU) و پردازنده گرافیکی (GPU) این گوشی به‌اندازه‌ای قدرت دارند که می‌توانید بازی‌های روز آنلاین و آفلاین با Graphic Map بزرگ و برنامه‌های محاسباتی و عملیاتی را اجرا کنید. این گوشی دارای ۱۲۸ گیگابایت حافظه
                                    داخلی و ۸ گیگابایت حافظه RAM (رَم) است. گوشی سامسونگ Galaxy S20 FE دارای دوربین سه‌گانه در پشت گوشی بوده که دارای کیفیت‌های ۱۲، ۸ و ۱۲ مگاپیکسل بوده که هرکدام دارای کارایی و استفاده‌ای متفاوتی در انواع عکاسی‌های شما هستند. دوربین عکاسی سلفی Galaxy S20 FE دارای لنز عریض (Wide) با رزولوشن ۳۲ مگاپیکسل بوده که می‌توانید
                                    عکاسی‌های باکیفیتی از خود، به‌همراه دوستان یا در هر محیط و طبیعتی داشته باشید.
                                </p>
                            </div><!-- end description -->
                            <div class="tab-pane fade show" id="comment"><!-- start comment -->
                                <p class="m-3 font-14">امتیاز کاربران</p>
                                <div class="row mx-3">

                                    <div class="col-md-6 rating-result"><!-- start ratig result-->

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="font-12">کیفیت ساخت:</span>
                                            <span class="font-12">خوب</span>
                                        </div>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-info" style="width:60%;"></div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="font-12">ارزش خرید به نسبت قیمت:</span>
                                            <span class="font-12">عالی</span>
                                        </div>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-info" style="width:80%;"></div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="font-12">امکانات و قابلیت ها:</span>
                                            <span class="font-12">خوب</span>
                                        </div>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-info" style="width:50%;"></div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="font-12">نوآوری :</span>
                                            <span class="font-12">خوب</span>
                                        </div>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-info" style="width:75%;"></div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="font-12">طراحی و ظاهر :</span>
                                            <span class="font-12">عالی</span>
                                        </div>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-info" style="width:90%;"></div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="font-12">سهولت استفاده :</span>
                                            <span class="font-12">خوب</span>
                                        </div>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-info" style="width:80%;"></div>
                                        </div>

                                    </div><!-- end ratig result-->

                                    <div class="col-md-6 add-comment"><!-- start add comment box -->
                                        <p>شما هم درباره این کالا دیدگاه ثبت کنید</p>
                                        <p>برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید.
                                            اگر این محصول را قبلا از نیک کالا خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد.
                                        </p>
                                        <a href="send-comment.html" class="btn btn-secondary font-13 px-4 py-2 mt-3 ms-3">افزودن نظر جدید</a>
                                    </div><!-- ens add comment box -->

                                </div>

                                <div class="row mx-3">
                                    <div class="col-12">
                                        <p class="font-13 my-4">نظرات کاربران (437)</p>

                                        <div class="row border-bottom mb-4"><!-- start user comment box -->
                                            <div class="col-lg-3 col-md-4 col-12"><!-- start comment info -->
                                                <div class="comment-info">
                                                    <p class="font-13 my-2">محمدرضا بهرامی</p>
                                                    <p class="font-12 text-muted my-3">24 فروردین 1402 </p>
                                                    <div class="star-box">
                                                        <i class="fa fa-star font-12 ms-1 text-warning"></i>
                                                        <i class="fa fa-star font-12 ms-1 text-warning"></i>
                                                        <i class="fa fa-star font-12 ms-1 text-warning"></i>
                                                        <i class="fa fa-star font-12 ms-1 text-warning"></i>
                                                        <i class="fa fa-star font-12 ms-1 text-muted"></i>
                                                    </div>
                                                    <p class="font-12 text-muted border border-info rounded d-inline-block p-2"><i class="fa fa-thumbs-up font-13 text-info"></i> خرید این محصول را توصیه می‌کنم</p>
                                                </div>
                                            </div><!-- end comment info -->
                                            <div class="col-lg-9 col-md-8 col-12"><!-- start comment text -->
                                                <p class="font-14">عالی و صدرصد بهتر از اپل</p>
                                                <p class="font-13 line-height">کیفیت صفحه فوق العاده و شارژدهی عالی . بدنه اش اول که به دستم رسید
                                                    یه مشکی براق خوشگل بود. اما متاسفانه اثر انگشت زیاد روش میوفته و
                                                    زودم خش میوفته جنسش میتونست بهتر باشه.من خیلی گرون خریدم قیمت الانش عالیه. تحقیقتون رو قبل خرید بکنید .
                                                </p>
                                                <div class="row">
                                                    <div class="col-md-4 col-6 ">
                                                        <span class="font-13 text-info"> نقاط قوت </span>
                                                        <ul class="ps-2 pt-0 positve-point">
                                                            <li class="font-13  my-2">سبک </li>
                                                            <li class="font-13  my-2"> صفحه نمایش عالی</li>
                                                            <li class="font-13  my-2">سرعت پردازش بالا</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-6">
                                                        <span class="font-13 text-danger"> نقاط ضعف </span>
                                                        <ul class="ps-2 pt-0 negative-point">
                                                            <li class="font-13 my-2">قیمت زیاد  </li>
                                                            <li class="font-13  my-2">  باتری ضعیف </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-12 mb-3 text-end">
                                                        <span class="font-13 text-muted d-block mb-3">آیا این نظر برایتان مفید بود؟</span>
                                                        <a href="#" class="font-13 text-muted ms-2 border p-1 rounded">بله (12) <i class="fa fa-thumbs-up text-info"></i></a>
                                                        <span class="text-muted">|</span>
                                                        <a href="#" class="font-13 text-muted border p-1 rounded">خیر (4) <i class="fa fa-thumbs-down text-danger"></i></a>
                                                    </div>
                                                </div>
                                            </div><!-- end comment text -->
                                        </div><!-- end user comment box -->

                                        <div class="row border-bottom mb-4"><!-- start user comment box -->
                                            <div class="col-lg-3 col-md-4 col-12"><!-- start comment info -->
                                                <div class="comment-info">
                                                    <p class="font-13 my-2">محمدرضا بهرامی</p>
                                                    <p class="font-12 text-muted my-3">24 فروردین 1402 </p>
                                                    <div class="star-box">
                                                        <i class="fa fa-star font-12 ms-1 text-warning"></i>
                                                        <i class="fa fa-star font-12 ms-1 text-warning"></i>
                                                        <i class="fa fa-star font-12 ms-1 text-warning"></i>
                                                        <i class="fa fa-star font-12 ms-1 text-warning"></i>
                                                        <i class="fa fa-star font-12 ms-1 text-muted"></i>
                                                    </div>
                                                    <p class="font-12 text-muted border border-danger rounded d-inline-block p-2"><i class="fa fa-thumbs-down font-13 text-danger"></i> خرید این محصول را توصیه نمی‌کنم</p>
                                                </div>
                                            </div><!-- end comment info -->
                                            <div class="col-lg-9 col-md-8 col-12"><!-- start comment text -->
                                                <p class="font-14">عالی و صدرصد بهتر از اپل</p>
                                                <p class="font-13 line-height">کیفیت صفحه فوق العاده و شارژدهی عالی . بدنه اش اول که به دستم رسید
                                                    یه مشکی براق خوشگل بود. اما متاسفانه اثر انگشت زیاد روش میوفته و
                                                    زودم خش میوفته جنسش میتونست بهتر باشه.من خیلی گرون خریدم قیمت الانش عالیه. تحقیقتون رو قبل خرید بکنید .
                                                </p>
                                                <div class="row">
                                                    <div class="col-md-4 col-6 ">
                                                        <span class="font-13 text-info"> نقاط قوت </span>
                                                        <ul class="ps-2 pt-0 positve-point">
                                                            <li class="font-13  my-2">سبک </li>
                                                            <li class="font-13  my-2"> صفحه نمایش عالی</li>
                                                            <li class="font-13  my-2">سرعت پردازش بالا</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-6">
                                                        <span class="font-13 text-danger"> نقاط ضعف </span>
                                                        <ul class="ps-2 pt-0 negative-point">
                                                            <li class="font-13 my-2">قیمت زیاد  </li>
                                                            <li class="font-13  my-2">  باتری ضعیف </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-12 mb-3 text-end">
                                                        <span class="font-13 text-muted d-block mb-3">آیا این نظر برایتان مفید بود؟</span>
                                                        <a href="#" class="font-13 text-muted ms-2 border p-1 rounded">بله (12) <i class="fa fa-thumbs-up text-info"></i></a>
                                                        <span class="text-muted">|</span>
                                                        <a href="#" class="font-13 text-muted border p-1 rounded">خیر (4) <i class="fa fa-thumbs-down text-danger"></i></a>
                                                    </div>
                                                </div>
                                            </div><!-- end comment text -->
                                        </div><!-- end user comment box -->

                                    </div>
                                </div>

                                <ul class="custom-pagination"><!-- start pagination -->
                                    <li><a href="#"><i class="fa fa-angle-right align-middle"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="fa fa-angle-left align-middle"></i></a></li>
                                </ul><!-- end pagination -->

                            </div><!-- end comment -->
                            <div class="tab-pane fade show" id="question"><!-- start question -->
                                <p class="m-3 font-14">پرسش و پاسخ</p>
                                <p class="m-3 font-13">پرسش خود را در مورد محصول مطرح نمایید</p>

                                <form><!-- start question form -->
                                    <div class="px-3 mb-3">
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                    <a href="#" class="btn btn-secondary font-13 px-3 py-2 mx-3 mb-3">ثبت پرسش</a>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="checkbox" id="check1">
                                        <label class="form-check-label font-12 text-secondary" for="check1">اولین پاسخی که به پرسش من داده شد، از طریق ایمیل به من اطلاع دهید. </label>
                                    </div>
                                </form><!-- end question form -->

                                <div class="row mx-3 mt-5"><!-- start question box -->
                                    <div class="col-12 question-box">
                                        <div class="question-icon"><i class="fa fa-question"></i></div>
                                        <div class="question-header">
                                            <p>پرسش : <span class="font-13 text-secondary">امیرحسین</span></p>
                                            <p class="font-12 text-secondary">14 اردیبهشت 1402</p>
                                        </div>
                                        <div class="question-body py-3">
                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                                                مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                            </p>
                                        </div>
                                        <div class="question-footer">
                                            <a href="#" class="font-12 text-info underline">به این پرسش پاسخ دهید</a>
                                        </div>
                                    </div>
                                </div><!-- end question box -->

                                <div class="row mx-3 mt-4 d-flex justify-content-end"><!-- start answer box -->
                                    <div class="col-11 question-box">
                                        <div class="question-icon"><i class="fa fa-store"></i></div>
                                        <div class="question-header">
                                            <p>پاسخ : <span class="font-13 text-secondary">فروشنده</span></p>
                                            <p class="font-12 text-secondary">14 اردیبهشت 1402</p>
                                        </div>
                                        <div class="question-body py-3">
                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                                                مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- end answer box -->

                            </div><!-- end question -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end product tab content -->



        </div>
     {{--   <div class="container">
            <!-- start product content -->
            <div class="product-content">
                <div class="row">

                    <div class="col-lg-4 col-12">
                        <div class="row">
                            <!-- start product icons -->
                            <div class="col-1 text-center product-icons">
                                <!-- add to Favorites -->
                                @guest
                                    <span style="font-size: 1.2em;" class="my-4">
                                         <i class="add-to-fav-product far fa-heart heart text-dark d-block  my-4"
                                            data-url="--}}{{--{{ route('product.add.to.favorites') }}--}}{{--"
                                            data-bs-toggle="tooltip"
                                            data-product="{{ $product->id }}"
                                            data-bs-placement="top"
                                            title="{{ __('messages.add_to_favorites') }}">
                                         </i>
                                    </span>
                                @endguest
                                --}}{{--@auth
                                    @if( $product->user->contains(auth()->user()->id))
                                        <span class="" style="font-size: 1.2em">
                                        <i class="add-to-fav-product fa-solid fa-heart  heart  text-danger  d-block my-4"
                                           data-url="{{ route('product.add.to.favorites' )}}"
                                           data-bs-toggle="tooltip"
                                           data-product="{{ $product->id }}"
                                           data-bs-placement="top"
                                           style="color:tomato"
                                           title="{{ __('messages.remove_from_favorites') }}"></i>
                                            </span>
                                    @else
                                        <span class="" style="font-size: 1.2em">
                                             <i class="add-to-fav-product far fa-heart heart text-dark  d-block my-4"
                                                data-url="{{ route('product.add.to.favorites') }}"
                                                data-bs-toggle="tooltip"
                                                data-product="{{ $product->id }}"
                                                data-bs-placement="top"
                                                title="{{ __('messages.add_to_favorites') }}"></i>
                                        </span>
                                  @endif
                                 @endauth--}}{{--
                            <!-- end add to Favorites -->
                                <span data-bs-toggle="modal" data-bs-target="#share-modal"><i
                                        class="fa fa-share-alt share d-block my-4" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="اشتراک گذاری"></i></span>
                                <div class="modal fade" id="share-modal"><!-- start share modal -->
                                    <div class="modal-dialog  modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title font-13">اشتراک گذاری</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="font-12">این محصول را با دوستان خود به اشتراک بگذارید!</p>
                                                <a href="#" class="btn btn-share"><i class="fa fa-copy me-2"></i>کپی
                                                    کردن لینک</a>
                                                <div class="d-flex justify-content-center mt-4">
                                                    <a href="#"><i
                                                            class="fab fa-instagram text-danger social-media"></i></a>
                                                    <a href="#"><i
                                                            class="fab fa-telegram text-info social-media"></i></a>
                                                    <a href="#"><i
                                                            class="fab fa-whatsapp text-success social-media"></i></a>
                                                    <a href="#"><i class="fab fa-twitter text-primary social-media"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- end share modal -->

                            <!-- add to compare -->
                                @guest
                                    <span style="font-size: 1.2em;" class="my-4">
                                         <i class="add-to-compare-list fas fa-random random text-dark d-block  my-4"
                                            data-url="--}}{{--{{ route('product.add.to.compares') }}--}}{{--"
                                            data-bs-toggle="tooltip"
                                            data-product="{{ $product->id }}"
                                            data-bs-placement="top"
                                            title="{{ __('messages.add_to_compare') }}">
                                         </i>
                                    </span>
                                @endguest
                               --}}{{-- @auth
                                    @if( $product->compares->contains(function ($compare,$key){
                                            if ( auth()->user()->compare != null ){
                                                $compareUser = auth()->user()->compare->id;
                                            }else{
                                                 $compareUser = null;
                                            }
                                          return $compare->id === $compareUser ;
                                        }))
                                        <span class="" style="font-size: 1.2em">
                                        <i class="add-to-compare-list fas fa-random random  text-danger  d-block my-4"
                                           data-url="{{ route('product.add.to.compares' )}}"
                                           data-bs-toggle="tooltip"
                                           data-product="{{ $product->id }}"
                                           data-bs-placement="top"
                                           style="color:tomato"
                                           title="{{ __('messages.remove_from_compare') }}"></i>
                                            </span>
                                    @else
                                        <span class="" style="font-size: 1.2em">
                                             <i class="add-to-compare-list fas fa-random random text-dark  d-block my-4"
                                                data-url="{{ route('product.add.to.compares') }}"
                                                data-bs-toggle="tooltip"
                                                data-product="{{ $product->id }}"
                                                data-bs-placement="top"
                                                title="{{ __('messages.add_to_compare') }}"></i>
                                        </span>
                                   @endif
                                 @endauth--}}{{--
                             <!-- end add to compare -->

                            </div>
                            <div class="col-11 pb-5 mb-3">
                                <!-- start product slider pic -->
                                @if( $product->thumbnail_path !== null )
                                    <div class="carousel slide pb-5 product-slider-2" id="product-slider"
                                         data-bs-ride="carousel">
                                        <div class="carousel-indicators carousel-indicator-custom">
                                            <img src="{{ asset( $product->thumbnail_path) }}" alt="{{ asset( $product->thumbnail_path) }}" class="d-block w-100">
                                            --}}{{--@foreach ( $images as  $key => $slide)
                                                <button type="button" data-bs-target="#product-slider"
                                                        data-bs-slide-to="{{ $loop->index }}" class="active">
                                                    <img
                                                        src="{{ asset('storage/images/product/gallery/'. $slide->image_path) }}"
                                                        alt="{{ asset('storage/images/product/gallery/'. $slide->image_path). '-' .( $key + 1) }}"
                                                        class="d-block w-100">
                                                </button>
                                            @endforeach--}}{{--
                                        </div>
                                    </div>
                                    --}}{{--<div class="carousel slide pb-5 product-slider-2" id="product-slider"
                                         data-bs-ride="carousel">
                                        <div class="carousel-indicators carousel-indicator-custom">
                                            @foreach ( $images as  $key => $slide)
                                                <button type="button" data-bs-target="#product-slider"
                                                        data-bs-slide-to="{{ $loop->index }}" class="active">
                                                    <img
                                                        src="{{ asset('storage/images/product/gallery/'. $slide->image_path) }}"
                                                        alt="{{ asset('storage/images/product/gallery/'. $slide->image_path). '-' .( $key + 1) }}"
                                                        class="d-block w-100">
                                                </button>
                                            @endforeach
                                        </div>
                                        <div class="carousel-inner">
                                            @foreach ( $images as $key =>  $slide)
                                                <div class="carousel-item @if( $loop->first ) active @endif">
                                                    <img
                                                        src="{{ asset('storage/images/product/gallery/'. $slide->image_path) }}"
                                                        alt="{{ asset('storage/images/product/gallery/'. $slide->image_path) . '-' . ($key + 1) }}"
                                                        class="d-block w-100">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>--}}{{--
                                @else
                                    <div class="carousel slide pb-5 product-slider-2" id="product-slider" data-bs-ride="carousel">
                                        <img src="{{ asset('default_image/no-image-icon-23494.png') }}" alt="{{  asset('default_image/no-image-icon-23494.png')  }}" class="d-block w-100">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>


                    --}}{{--<div class="col-lg-5 col-md-8 product-details">
                        <p>{{ $product->title_persian }}</p>
                        <p class="d-inline-block"><span>دسته بندی :</span><span> {{ $categories }}</span></p>
                        <p class="d-inline-block ms-5"><span>برند :</span> {{ $product->brand->title_persian }}</p>
                        <p>
                            <livewire:front.product.warranty-selector :product="$product_id"/>
                        </p>
                        <p>
                            <livewire:front.product.color-selector :product="$product_id"/>
                        </p>
                        @include('front.product.partials.product_features',['products' => $product ])
                        @include('front.product.partials.hamta_notic')
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <livewire:front.product.add-to-cart :productId="$product_id"/>
                    </div>--}}{{--

                </div>
            </div>


            <!-- start product delivery icons -->
           --}}{{-- @include('front.product.partials.services_banner')--}}{{--
            <!-- end product delivery icons -->

           --}}{{-- <div class="product-tab-content">
                <div class="row pb-3">
                    <div class="col-12">
                        <ul class="nav nav-pills custom-nav-pills">
                            @include('front.product.partials.product_tab_section_links')
                        </ul>
                        <div class="tab-content">
                            <!-- product description -->
                            <div class="tab-pane fade show active" id="description">
                                @include('front.product.partials.description_product',['products' => $product ])
                            </div>  <!-- end product description -->
                            <!-- product specifications -->
                            <div class="tab-pane fade show" id="detail">
                                @include('front.product.partials.specifications_product',['products' => $product ])
                            </div>   <!-- end product specifications -->
                            <!-- product comments -->
                            <div class="tab-pane fade show" id="comment">
                                <livewire:front.comment.add-comment :product="$product_id"/>
                            </div>  <!-- end product comments -->
                            <!-- product answer_question -->
                            <div class="tab-pane fade show" id="question">
                                @include('front.product.partials.answer_question')
                            </div>  <!--end product answer_question -->
                        </div>
                    </div>
                </div>
            </div>--}}{{--

            <!-- product slider related products -->
              --}}{{-- <div class="product-slider related-products">
                    @include('front.product.partials.related_products',['related_products' => $productCategories ])
                </div>--}}{{--
            <!--end product slider related products -->

        </div>--}}
    </main>
    <!-- end main -->


    {{-- toast section for add to favorites    --}}
    <div class="toast position-fixed ms-4" data-delay="7000" style="z-index: 9999999;left:1.5rem;top:3rem;width: 24rem;max-width: 80%">
        <div class="toast-header">
            <strong class="me-auto">{{ __('messages.site_name') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ __('messages.for_add_to_favorites_you_must_login') }}
        </div>
    </div>


@endsection
@push('front_custom_scripts')

    <script>
        $(document).ready(function () {
            //  add to compare list
            $('.add-to-compare-list').click(function () {
                let url = $(this).attr("data-url");
                let element = $(this);
                let product = $(this).attr("data-product");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        product: product
                    }
                }).done( function ( result ) {

                    if (result.status === 1)    // for add to compare
                    {
                        $(element).removeClass('text-dark');
                        $(element).addClass('text-danger');
                        $(element).removeClass('far');
                        $(element).addClass('fa-solid');
                        // below code for add style with rule:value like color:tomato
                        $(element).attr('style',"color:tomato");
                        $(element).attr('title',"{{ __('messages.remove_from_compare') }}");

                    } else if (result.status === 2)   // for remove from compare
                    {
                        $(element).removeClass('text-danger');
                        $(element).addClass('text-dark');
                        $(element).removeClass('fa-solid');
                        $(element).addClass('far');
                        $(element).removeAttr('style');
                        $(element).attr('title',"{{ __('messages.add_to_compare') }}");

                    } else if (result.status === 3) {
                        // for user not login
                        // $('.toast').toast('show');
                    }
                })
            })

        })
    </script>
   <script>
        $(document).ready(function () {
            //  add to favorites
            $('.add-to-fav-product').click(function () {
                let url = $(this).attr("data-url");
                let element = $(this);
                let product = $(this).attr("data-product");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        product: product
                    }
                }).done( function ( result ) {

                    if (result.status === 1)    // for add to fave
                    {
                        $(element).removeClass('text-dark');
                        $(element).addClass('text-danger');
                        $(element).removeClass('far');
                        $(element).addClass('fa-solid');
                        // below code for add style with rule:value like color:tomato
                        $(element).attr('style',"color:tomato");
                        $(element).attr('title',"{{ __('messages.remove_from_favorites') }}");

                    } else if (result.status === 2)   // for remove from fave
                    {
                        $(element).removeClass('text-danger');
                        $(element).addClass('text-dark');
                        $(element).removeClass('fa-solid');
                        $(element).addClass('far');
                        $(element).removeAttr('style');
                        $(element).attr('title',"{{ __('messages.add_to_favorites') }}");

                    } else if (result.status === 3)  // for user not login
                    {
                      // $('.toast').toast('show');
                    }
                })
            })

        })
    </script>
@endpush
