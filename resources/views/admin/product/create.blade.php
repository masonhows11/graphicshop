@extends('admin.include.master_dash')
@section('dash_page_title')
    {{ __('messages.new_product') }}
@endsection
@push('dash_custom_style')
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/jalalidatepicker/dist/css/persian-datepicker.min.css') }}">
@endpush
@section('breadcrumb')
    {{--{{ Breadcrumbs::render('admin.create.product.basic') }}--}}
@endsection
@section('dash_main_content')

    <div class="container-fluid">


        <div class="row product-create-body mx-auto my-5 bg-white rounded-3">
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data" id="product-form">
                @csrf

                <div class="row product-basic-field mx-2">

                    <div class="col-sm-4 mt-5 mb-5">

                        <div class="col mt-5 mb-5">
                            <label for="title" class="form-label">عنوان</label>
                            <input type="text"
                                   class="form-control"
                                   id="title"
                                   placeholder=""
                                   name="title"
                                   value="{{ old('title') }}">
                            @error('title')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col mt-5 mb-5">
                            <label for="status" class="form-label">وضعیت کالا</label>
                            <select name="status" id="status" class="form-select">
                                <option>انتخاب کنید...</option>
                                <option value="1" >{{ __('messages.published') }}</option>
                                <option value="0">{{ __('messages.unpublished') }}</option>

                            </select>
                            @error('status')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col mt-5 mb-5">
                            <label for="product_tags" class="form-label">تگ ها</label>
                            <input type="hidden" name="product_tags" id="product_tags"
                                   value="{{ old('product_tags') }}">
                            <select class="form-select" id="product_selected_tags" multiple>
                            </select>
                            @error('product_tags')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col mt-5 mb-5">
                            <label for="category-select" class="form-label">انتخاب دسته بندی</label>
                            <select class="form-select"  id="category-select" name="categories">
                                <option value="">{{ __('messages.choose') }}</option>
                                @foreach( $categories as $category)
                                    <option value="{{ $category->id }}" {{ (collect(old("categories"))->contains($category->id)  ? "selected":"") }} >{{ $category->title }}</option>
                                @endforeach
                            </select>

                            @error('categories')
                            <div class="my-5 alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                      {{--  <div class="col mt-5 mb-5">
                            <label for="category-select" class="form-label">انتخاب دسته بندی</label>
                            <select class="category-select form-select" multiple id="category-select" name="categories[]">
                                @foreach( $categories as $category)
                                    <option value="{{ $category->id }}" {{ (collect(old("categories"))->contains($category->id)  ? "selected":"") }} >{{ $category->title }}</option>
                                @endforeach
                            </select>

                            @error('categories')
                            <div class="my-5 alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>--}}


                    </div>

                    <div class="col-sm-4 mt-5 mb-5">

                        <div class="col mt-5 mb-5">
                            <label for="demo_url" class="form-label">تصویر محصول</label>
                            <input type="file" class="form-control"  accept="image/png, image/jpeg ,image/webp" id="demo_url" name="demo_url" value="{{ old('demo_url') }}">
                            @error('demo_url')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="col mt-5 mb-5">
                            <label for="source_url" class="form-label">فایل اصلی</label>
                            <input type="file" class="form-control" id="source_url" name="source_url" value="{{ old('source_url') }}">
                            @error('source_url')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col mt-5 mb-5">
                            <label for="sku" class="form-label">شناسه محصول (SKU)</label>
                            <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}">
                            @error('sku')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col mt-5 mb-5">
                            <label for="price" class="form-label">{{ __('messages.price') }}</label>
                            <input type="number" dir="ltr" min="1" class="form-control" id="price"
                                   name="price" value="{{ old('price') }}">
                            @error('price')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col mt-5 mb-5">
                            <label for="published_at" class="form-label">تاریخ انتشار</label>

                            <input type="text" id="published_at" class="d-none form-control form-control-sm"
                                   name="published_at" value="{{ old('published_at') }}">

                            <input type="text" id="published_at_view" class="form-control form-control-sm">

                            @error('published_at')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-sm-4 mt-5 mb-5">
                        {{--  image section  --}}
                        <div class="row d-flex flex-column justify-content-center align-content-center product-image">
                            <div class="col-lg-8">
                                <img src="{{ asset('admin_assets/images/no-image-icon-23494.png') }}"
                                     id="image_view"
                                     class="img-thumbnail"
                                     height="300" width="300"
                                     alt="image">
                            </div>
                            <div class="col-lg-8">
                                <label for="image_label"
                                       class="mt-5 form-label">{{ __('messages.thumbnail_image') }}</label>
                                <input type="file" class="form-control" accept="image/png, image/jpeg ,image/webp" id="image_select"
                                       name="thumbnail_path" value="{{ old('thumbnail_path') }}" readonly>
                                @error('thumbnail_path')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>




                <div class="row product-description mx-2">


                    <div class="col-sm mt-5">
                        <label for="description" class="mb-5">توضیحات</label>
                        <textarea class="form-control mt-5" id="description" name="description">
                            {{ old('description') }}
                            </textarea>
                        @error('description')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm mt-5">
                        <label for="seo_desc" class="mb-5">توضیحات سئو</label>
                        <textarea class="form-control" rows="8" dir="rtl" name="seo_desc" id="seo_desc">
                            {{ old('seo_desc') }}
                            </textarea>
                        @error('seo_desc')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row my-4 mx-2">
                    <div class="col d-flex justify-content-start">
                        <div>
                            <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                        </div>
                        <div class="ms-2">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">{{ __('messages.products') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('dash_custom_script')
    <script type="text/javascript" src="{{ asset('admin_assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('admin_assets/plugins/jalalidatepicker/assets/persian-date.min.js')  }}"></script>
    <script type="text/javascript"
            src="{{ asset('admin_assets/plugins/jalalidatepicker/dist/js/persian-datepicker.min.js')  }}"></script>
    <script type="javascript" src="{{ asset('dash/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            language: 'fa',
            removePlugins: 'image',
        });
        CKEDITOR.replace('seo_desc', {
            language: 'fa',
            removePlugins: 'image',
        });
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        })
        $(document).ready(function () {
            $('.category-select').select2({
                dir: 'rtl',
                tags: 'true',
                theme: "classic"
            });
        });
        $(document).ready(function () {
            var tags_input = $('#product_tags'); // go for backend
            var selected_tags = $('#product_selected_tags'); // user enter tags
            var default_tags = tags_input.val();
            var default_data = null;
            // for keeping old value after failed validation
            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
                console.log(default_data);
            }
            // select2 config
            selected_tags.select2({
                theme: 'classic',
                dir: 'rtl',
                tags: 'true',
                data: default_data,
            });
            selected_tags.children('option').attr('selected', true).trigger('change');
            // save all tags into hidden input & go for backed
            $('#product-form').submit(function (event) {
                if (selected_tags.val() !== null && selected_tags.val().length > 0) {
                    var selectedSource = selected_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            })
        });

        $(document).ready(function () {
            const input = document.getElementById("image_select");
            const previewImage = document.getElementById("image_view");
            input.addEventListener("change", function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.addEventListener("load", function () {
                        previewImage.setAttribute("src", this.result);
                    });
                    reader.readAsDataURL(file);
                }
            });
        })
        $(document).ready(function () {
            @if( session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                newWindow: true,
                close: false,
                gravity: "top", // `top` or `bottom`
                position: "center", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
            }).showToast();
            @elseif(session('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "center", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
            }).showToast();
            @endif
        })
    </script>
    <script>
        $(document).ready(function () {

            $('#add_attribute').on('click', function () {
                var element = $(this).parent().prev().clone(true);
                $(this).before(element);
            })
        })
    </script>
    {{--  const Toast = Swal.mixin({
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
      @if(session()->has('error'))
      Toast.fire({
          icon: 'error',
          title: '{{ session()->get('error') }}'
      })
      @elseif(session()->has('success'))
      Toast.fire({
          icon: 'success',
          title: '{{ session()->get('success') }}'
      })
      @endif--}}


@endpush
