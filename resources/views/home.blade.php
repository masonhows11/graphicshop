<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('front.layouts.header_styles')
    <title>GraphicShop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- start header -->
@include('front.layouts.include.header')
<!-- end header -->
<!-- start responsive header-->
@include('front.layouts.include.header_responsive')
<!-- end responsive header-->
<!-- start main menu -->
@include('front.layouts.include.nav')
<!-- end main menu -->

<!-- start main content -->
<main>
    <div class="container">
        <!-- start ads -->
        {{--  @include('front.layouts.include.main_top_adds')--}}
        <!-- end ads -->
        <!-- start product slider -->
        @include('front.layouts.include.product_slider')
        <!-- end product slider -->
        <!-- start ads -->
        {{--  @include('front.layouts.include.main_bottom_ads')--}}
        <!-- end ads -->
        <!-- start category box -->
        @include('front.layouts.include.categories')
        <!-- end category box -->
        <!-- start blog box -->
        @include('front.layouts.include.blog')
        <!-- end blog box -->
    </div>
</main><!-- end main -->
<!-- start footer -->
@include('front.layouts.include.footer')
<!-- end footer -->
<!-- scripts -->
@include('front.layouts.footer_scripts')
<!--end scripts -->
</body>
</html>
