<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('front.layouts.header_styles')
    <title>گرافیک شاپ</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

@include('front.layouts.include.header')

@include('front.layouts.include.header_responsive')

@include('front.layouts.include.nav')



<main>
    <div class="container">

        @include('front.layouts.product_slider.slider_banner')

        @include('front.layouts.product_slider.slider_visit_card')

        @include('front.layouts.product_slider.slider_tract')

        @include('front.layouts.include.categories')

        @include('front.layouts.include.blog')

    </div>
</main>

@include('front.layouts.include.footer')

@include('front.layouts.footer_scripts')

</body>
</html>
