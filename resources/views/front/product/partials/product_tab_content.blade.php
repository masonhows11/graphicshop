<div class="tab-content">
    <div class="tab-pane fade show active" id="description">
        <p class="m-3 font-14">{{ __('messages.description') }}</p>
        <p class="m-3 font-13">{{ $product->title }}</p>
        <p class="font-14 line-height mx-3 text-justify">
            {!! $product->description !!}
        </p>
    </div>
    <div class="tab-pane fade show" id="detail"><!-- start detail -->
        <p class="mt-3 mx-3 font-14"><i class="fa fa-chevron-left align-middle text-danger font-12 me-1"></i> مشخصات محصول</p>

        <div class="row mx-3">
            <div class="col-sm-4 mb-2">
                <div class="box-line">{{ __('messages.owner') }}</div>
            </div>
            <div class="col-sm-8 mb-2">
                <div class="box-line">{{ $product->owner->name }}</div>
            </div>
        </div>

        <div class="row mx-3">
            <div class="col-sm-4 mb-2">
                <div class="box-line">{{ __('messages.created_at') }}</div>
            </div>
            <div class="col-sm-8 mb-2">
                <div class="box-line">{{ customJalaliDate($product->created_at) }}</div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade show" id="comment">
        <p class="m-3 font-14">امتیاز کاربران</p>
        <div class="row mx-3">

            <div class="col-md-6 rating-result">
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
