<div>
    <div class="product-slider mt-5">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h4>{{ $category_title != null ? $category_title : 'دسته بندی' }}</h4>
                </div>


                <div class="owl-carousel owl-theme custom-product-slider">
                    @if( $products != null )
                        @foreach( $products as $product)
                            <div class="item">
                                <div class="card border-0 custom-card mt-3">
                                    <a href="{{ route('product',$product->title) }}" class="d-block w-100">
                                        @if( $product->thumbnail_path != null && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->thumbnail_path))
                                            <img src="{{ asset('storage/'.$product->thumbnail_path) }}" alt="{{ $product->title . $product->thumbnail_path }}" class="slider-pic"></a>
                                    @else
                                        <img src="{{ asset('default_image/no-image-icon-23494.png') }}" alt="no-image" class="slider-pic">
                                    @endif
                                    <div class="card-body">
                                        <a href="{{ route('product',$product->title) }}"
                                           class="product-title">{{ $product->title }}</a>
                                        <div class="d-flex justify-content-between">
                                            <div class="mt-3 ps-4">
                                            <span class="heart"><i
                                                    class="far fa-heart font-14 text-muted me-2"></i></span>
                                                <span class="random"><i
                                                        class="fa fa-random font-14 text-muted me-2"></i></span>
                                                <span class="add-to-cart"><i class="fa fa-cart-plus font-13 text-muted"></i></span>
                                            </div>
                                            <p class="font-13 mt-3 pe-4"> {{ priceFormat($product->price) }} تومان </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="item">
                            <div class="card border-0 custom-card mt-3">
                                <a href="{{ route('not.found') }}" class="d-block w-100"><img
                                        src="{{ asset('front_assets/images/no-image-icon-23494.png') }}" class="slider-pic"></a>
                                <div class="card-body">
                                    <a href="{{ route('not.found') }}" class="product-title">کارت ویزیت</a>
                                    <div class="d-flex justify-content-between">
                                        <div class="mt-3 ps-4">
                                            <span class="heart"><i class="far fa-heart font-14 text-muted me-2"></i></span>
                                            <span class="random"><i class="fa fa-random font-14 text-muted me-2"></i></span>
                                            <span class="add-to-cart"><i
                                                    class="fa fa-cart-plus font-13 text-muted"></i></span>
                                        </div>
                                        <p class="font-13 mt-3 pe-4">{{ __('messages.no_price') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

</div>

