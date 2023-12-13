<div class="product-slider mt-5">
    <div class="row">
        <div class="col-12">
            <div class="title">
                <h4>بنر</h4>
            </div>
            <div class="owl-carousel owl-theme custom-product-slider">

                @forelse( $banners as $banner)
                <div class="item"><!-- start item -->
                    <div class="card border-0 custom-card mt-3">
                        <a href="#" class="d-block w-100"><img src="{{ asset($banner->thumbnail_path) }}}" class="slider-pic"></a>
                        <div class="card-body">
                            <a href="#" class="product-title">{{ $banner->title }}</a>
                            <div class="d-flex justify-content-between">
                                <div class="mt-3 ps-4">
                                    <span class="heart"><i class="far fa-heart font-14 text-muted me-2"></i></span>
                                    <span class="random"><i class="fa fa-random font-14 text-muted me-2"></i></span>
                                    <span class="add-to-cart"><i class="fa fa-cart-plus font-13 text-muted"></i></span>
                                </div>
                                <p class="font-13 mt-3 pe-4"> {{ priceFormat($banner->price) }} تومان </p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
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
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>