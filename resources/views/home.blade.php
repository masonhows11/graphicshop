<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('front.layouts.header_styles')
    <title>{{ __('messages.site_name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@include('front.layouts.include.header')
@include('front.layouts.include.header_responsive')
@include('front.layouts.include.nav')
<main>
    <div class="container">
        <livewire:front.slider.slider-one/>


        <livewire:front.slider.slider-two/>


        <livewire:front.slider.slider-three/>

        @include('front.layouts.include.categories')

        @include('front.layouts.include.blog')
    </div>
</main>
@include('front.layouts.include.footer')
@include('front.layouts.footer_scripts')
@include('front.layouts.alert.alert')

</body>
</html>
