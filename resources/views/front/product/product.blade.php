@extends( 'front.layouts.master_front')
@section( 'page_title')
    {{ $product->title }}
@endsection
@section('main_content')

    <!-- start breadcrumb -->
    {{--@include('front.product.partials.breadcrumb_product',['productCategories' => $productCategories])--}}
    <!-- end breadcrumb -->

    <main>
        <div class="container">
            <div class="product-content mt-5">
                <div class="row mt-5">
                    <div class="col-lg-4 col-12">
                        <div class="row">
                            <div class="col-1 text-center product-icons">
                                <i class="far fa-heart heart d-block my-4" data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="افزودن به علاقمندی ها"></i>
                                <span data-bs-toggle="modal" data-bs-target="#share-modal"><i
                                        class="fa fa-share-alt share d-block my-4" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="اشتراک گذاری"></i></span>
                                <div class="modal fade" id="share-modal">
                                    <div class="modal-dialog  modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title font-13">اشتراک گذاری</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="font-12">این کالا را با دوستان خود به اشتراک بگذارید!</p>
                                                <a href="#" class="btn btn-share"><i class="fa fa-copy me-2"></i>کپی
                                                    کردن لینک</a>
                                                <div class="d-flex justify-content-center mt-4">
                                                    <a href="#"><i class="fab fa-instagram text-danger social-media"></i></a>
                                                    <a href="#"><i class="fab fa-telegram text-info social-media"></i></a>
                                                    <a href="#"><i class="fab fa-whatsapp text-success social-media"></i></a>
                                                    <a href="#"><i class="fab fa-twitter text-primary social-media"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <i class="fas fa-random random d-block my-4" data-bs-toggle="tooltip" data-bs-placement="top" title="مقایسه کالا"></i>
                            </div>

                            <div class="col-11 pb-5 mb-3">
                                <div class="carousel slide pb-5 product-slider-2" id="product-slider" data-bs-ride="carousel">
                                    @if( $product->thumbnail_path != null && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->thumbnail_path))
                                     <div class="carousel-indicators carousel-indicator-custom">
                                         <button type="button" data-bs-target="#product-slider" data-bs-slide-to="0" class="active">
                                             <img src="{{ asset('storage/'.$product->thumbnail_path ) }}" alt="product_image" class="d-block w-100">
                                         </button>
                                         <button type="button" data-bs-target="#product-slider" data-bs-slide-to="1">
                                             <img src="{{ asset( 'storage/'.$product->thumbnail_path ) }}" alt="product_image" class="d-block w-100">
                                         </button>
                                         <button type="button" data-bs-target="#product-slider" data-bs-slide-to="2">
                                             <img src="{{ asset('storage/'. $product->thumbnail_path ) }}" alt="product_image" class="d-block w-100">
                                         </button>
                                     </div>
                                        @else
                                        <img src="{{ asset('default_image/no-image-icon-23494.png') }}" alt="no-image" class="slider-pic">
                                    @endif
                                    <div class="carousel-inner">
                                        @if( $product->thumbnail_path != null && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->thumbnail_path))
                                            <div class="carousel-item active">
                                                <img src="{{ asset('storage/'. $product->thumbnail_path ) }}" alt="product_image" class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset( 'storage/'.$product->thumbnail_path ) }}" alt="product_image"  class="d-block w-100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset( 'storage/'.$product->thumbnail_path ) }}" alt="product_image"  class="d-block w-100">
                                            </div>
                                        @else
                                        @endif
                                        {{-- <div class="carousel-item">
                                             <img src="assets/images/product-slider2.jpg" class="d-block w-100">
                                         </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-8 d-flex align-items-end product-details">
                        <div class="alert alert-light font-12 line-height text-justify mt-5">
                            {!!  substr($product->description,3,500)    !!}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <livewire:front.product.add-to-cart :product_id="$product_id"/>
                    </div>
                </div>
            </div>



            <div class="product-tab-content">
                <div class="row pb-3">
                    <div class="col-12">
                        @include('front.product.partials.product_tab_section_links')
                        @include('front.product.partials.product_tab_content')
                    </div>
                </div>
            </div>

            <!-- product slider related products -->
            <div class="product-slider related-products">
                @include('front.product.partials.related_products',['products' => $relatedProducts])
            </div>
            <!--end product slider related products -->

        </div>

    </main>


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
    {{-- toast section for add to favorites --}}
    {{-- <div class="toast position-fixed ms-4" data-delay="7000"
         style="z-index: 9999999;left:1.5rem;top:3rem;width: 24rem;max-width: 80%">
        <div class="toast-header">
            <strong class="me-auto">{{ __('messages.site_name') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ __('messages.for_add_to_favorites_you_must_login') }}
        </div>
     </div>--}}


@endsection
@push('front_custom_scripts')
    <script type="text/javascript">
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'آیا مطمئن هستید این ایتم حذف شود؟',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف کن!',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            });
        })
    </script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        window.addEventListener('show-result', ({detail: {type, message}}) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
        @if( session()->has('warning') )
        Toast.fire({
            icon: 'warning',
            title: '{{ session()->get('warning') }}'
        })
        @elseif( session()->has('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session()->get('success') }}'
        })
        @endif
    </script>

   {{-- <script>
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
                }).done(function (result) {

                    if (result.status === 1)    // for add to compare
                    {
                        $(element).removeClass('text-dark');
                        $(element).addClass('text-danger');
                        $(element).removeClass('far');
                        $(element).addClass('fa-solid');
                        // below code for add style with rule:value like color:tomato
                        $(element).attr('style', "color:tomato");
                        $(element).attr('title', "{{ __('messages.remove_from_compare') }}");

                    } else if (result.status === 2)   // for remove from compare
                    {
                        $(element).removeClass('text-danger');
                        $(element).addClass('text-dark');
                        $(element).removeClass('fa-solid');
                        $(element).addClass('far');
                        $(element).removeAttr('style');
                        $(element).attr('title', "{{ __('messages.add_to_compare') }}");

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
                }).done(function (result) {

                    if (result.status === 1)    // for add to fave
                    {
                        $(element).removeClass('text-dark');
                        $(element).addClass('text-danger');
                        $(element).removeClass('far');
                        $(element).addClass('fa-solid');
                        // below code for add style with rule:value like color:tomato
                        $(element).attr('style', "color:tomato");
                        $(element).attr('title', "{{ __('messages.remove_from_favorites') }}");

                    } else if (result.status === 2)   // for remove from fave
                    {
                        $(element).removeClass('text-danger');
                        $(element).addClass('text-dark');
                        $(element).removeClass('fa-solid');
                        $(element).addClass('far');
                        $(element).removeAttr('style');
                        $(element).attr('title', "{{ __('messages.add_to_favorites') }}");

                    } else if (result.status === 3)  // for user not login
                    {
                        // $('.toast').toast('show');
                    }
                })
            })

        })
    </script>--}}
@endpush
