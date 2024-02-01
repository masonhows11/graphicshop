@extends('emails.layouts.master')
@section('mail_title')
    <h6 class="h6">گرافیک شاپ</h6>
@endsection
@section('main_content_mail')

    <div class="container d-flex flex-column mt-5">

        <div class="row d-flex flex-column justify-content-center align-items-center my-2">
            <div class="col-12">
                <h6 class="h4 text-center text-danger">فروشگاه اینترنتی گرافیک شاپ</h6>
            </div>
            <div class="col-12 title-notice mt-4 mb-2">
                <p class="text-center custom-text-large">کاربر عزیز</p>
                <p class="text-center custom-text-large">{{ $user }}</p>
            </div>
            <div class="col-12 title-notice mt-2 text-center rounded p-5">
                <p class="text-center custom-text-large">{{ $email }}</p>
            </div>
            <div class="col-10 title-notice mt-4 mb-2">
                <p class="text-center custom-text-large">خرید شما با موفقیت انجام شد</p>
            </div>

        </div>

        <div class="row d-flex justify-content-center footer mt-5">
            <div class="col-12">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">websolo.ir</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">goodshop.ir</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">پرسش و پاسخ</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">درباره ما</a></li>
                </ul>
                <p class="text-center"><strong>&copy; 2023 Websolo.ir</strong></p>
            </div>
        </div>
        <div class="row d-flex justify-content-between">
            <div class="col-12">
                <p class="text-center">استفاده از مطالب فروشگاه اینترنتی خرید خوب فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به وب سولو می‌باشد</p>
            </div>
        </div>

    </div>
@endsection

