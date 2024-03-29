@extends( 'front.layouts.master_front')
@section( 'page_title')
    {{ __('messages.site_name') }}
@endsection
@section('main_content')

    <!-- start breadcrumb -->
    {{-- <div class="container">
         <div class="row mt-3">
             <div class="col-12">
                 <ul class="breadcrumb">
                     <li class="breadcrumb-item">
                         <a href="{{ route('home') }}"
                            class="breadcrumb-custom">{{ __('messages.good_shopping_online_store') }}</a>
                     </li>
                     @if( !empty($productCategories) )
                         @foreach( $productCategories as $category)
                             <li class="breadcrumb-item">
                                 <a href="#" class="breadcrumb-custom">{{ $category->title_persian }}</a>
                             </li>
                         @endforeach
                     @endif
                     <li class="breadcrumb-item">
                         <a href="#" class="breadcrumb-custom">{{ $product->title_persian }}</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>--}}
    <!-- end breadcrumb -->

    <!-- list filters -->
    {{--  <div class="col-12 my-2">
          @if( request()->search )
              <span class="d-inline-block border p-1 rounded bg-light">
              {{ __('messages.search_result') }}
              <span class="badge bg-blue-100 text-dark">
                  {{ request()->search }}
              </span>
          </span>
          @endif
          @if( request()->brands )
              <span class="d-inline-block border p-1 rounded bg-light">
              {{ __('messages.brands') }}
              <span class="badge bg-blue-100 text-dark">
                  {{ implode(',',$selected_brands)  }}
              </span>
          </span>
          @endif

          --}}{{-- @if( request()->categories )
               <span class="d-inline-block border p-1 rounded bg-light">
               {{ __('messages.category') }}
               <span class="badge bg-blue-100 text-dark">
                   {{ request()->categoies }}
               </span>
           </span>
           @endif--}}{{--

          @if( request()->min_price )
              <span class="d-inline-block border p-1 rounded bg-light">
              {{ __('messages.price_from') }}
              <span class="badge bg-blue-100 text-dark">
                  {{ request()->min_price }}
              </span>
          </span>
          @endif

          @if( request()->max_price )
              <span class="d-inline-block border p-1 rounded bg-light">
              {{ __('messages.price_to') }}
              <span class="badge bg-blue-100 text-dark">
                  {{ request()->max_price }}
              </span>
          </span>
          @endif
      </div>--}}


    <div class="container mt-5">


        <div class="row">
            <!-- sidebar section-->
            <div class="col-lg-3">
                @include('front.product.partials.sidebar_filter_products')
            </div>
            <!-- products section -->
            <div class="col-lg-9">
                <div class="product-items">
                   {{-- <div class="row d-flex flex-column">
                        @include('front.product.partials.filtered_products_header')
                    </div>--}}

                    @if( count($products) > 0 )
                        <div class="row">
                            @foreach( $products as $key => $product)
                                <div class="col-lg-4 col-md-6">
                                    <a href="{{ route('product',$product->title) }}" class="d-block">
                                        <div class="card custom-card mt-3">

                                            <!-- image & color section in product card -->
                                            <div class="d-flex">
                                                @if( $product->thumbnail_path != null)
                                                <img src="{{ asset('storage/'.$product->thumbnail_path) }}" alt="{{ asset( $product->product) . '-' . ($key) }}" class="slider-pic" loading="lazy">
                                                @else
                                                    <img src="{{ asset('default_image/no-image-icon-23494.png') }}" alt="no-image" class="slider-pic">
                                                @endif
                                            </div>
                                            <!-- description section in product card -->
                                            <div class="card-body">
                                                <a href="{{ route('product',$product->title) }}"
                                                   class="product-title">{{ Str::limit($product->title,50)}}</a>
                                                <div class="d-flex justify-content-between">
                                                    <div class="mt-3 ps-4">
                                                        <span class="heart"><i class="far fa-heart font-14 text-muted me-2"></i></span>
                                                        <span class="random"><i class="fa fa-random font-14 text-muted me-2"></i></span>
                                                        <span class="add-to-cart"><i class="fa fa-cart-plus font-13 text-muted"></i></span>
                                                    </div>
                                                    <p class="font-13 mt-3 pe-4">{{ priceFormat($product->price) }} {{ __('messages.toman') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="row d-flex justify-content-center product-pagination">
                                <div class="col-4 mt-2">
                                    {{ $products->links('pagination::my-paginate') }}
                                </div>
                        </div>
                    @else
                        <div class="row d-flex justify-content-center align-items-center" style="height: 400px">
                            <div class="col">
                                <p class="text-center text-danger">{{ __('messages.no_product_found') }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>





@endsection
@push('front_custom_scripts')

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
    </script>
@endpush

