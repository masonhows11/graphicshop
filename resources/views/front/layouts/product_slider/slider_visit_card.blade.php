<div class="product-slider mt-5"><!-- start product slider -->
    <div class="row">
        <div class="col-12">
            <div class="title">
                <h4>کارت ویزیت</h4>
            </div>
            <div class="owl-carousel owl-theme custom-product-slider">

                @forelse( $products as $product)
                    <div class="item"><!-- start item -->
                        <div class="card border-0 custom-card mt-3">
                            <a href="{{ route('product',$product->title) }}" class="d-block w-100"><img src="{{ asset($product->thumbnail_path) }}" class="slider-pic"></a>
                            <div class="card-body">
                                <a href="{{ route('product',$product->title) }}" class="product-title">{{ $product->title }}</a>
                                <div class="d-flex justify-content-between">
                                    <div class="mt-3 ps-4">
                                        <span class="heart"><i class="far fa-heart font-14 text-muted me-2"></i></span>
                                        <span class="random"><i class="fa fa-random font-14 text-muted me-2"></i></span>
                                        <span class="add-to-cart"><i class="fa fa-cart-plus font-13 text-muted"></i></span>
                                    </div>
                                    <p class="font-13 mt-3 pe-4"> {{ priceFormat($product->price) }} تومان </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="item"><!-- start item -->
                        <div class="card border-0 custom-card mt-3">
                            <a href="{{ route('not.found') }}" class="d-block w-100"><img src="{{ asset('front_assets/images/mobile1.jpg') }}" class="slider-pic"></a>
                            <div class="card-body">
                                <a href="{{ route('not.found') }}" class="product-title">گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS</a>
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

