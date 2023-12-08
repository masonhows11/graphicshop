@extends('admin.include.master_dash')
@section('dash_page_title')
    {{ __('messages.new_category') }}
@endsection
@section('breadcrumb')
@endsection

@section('dash_main_content')

    <div class="container-fluid">
        <div id="kt_content_container" class="container-xxl" data-select2-id="select2-data-kt_content_container">
            <form action="{{ route('admin.category.store') }}" method="post" id="kt_ecommerce_add_category_form"
                  class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
                  data-select2-id="select2-data-kt_ecommerce_add_category_form"
                    enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10"
                     data-select2-id="select2-data-131-q2wc">

                    <div class="card card-flush py-4">

                        <div class="card-header">

                            <div class="card-title">
                                <h2>تصویر شاخص</h2>
                            </div>

                        </div>

                        <div class="card-body text-center pt-0">

                            <div class="image-input image-input-outline mb-3 image-input-changed"
                                 data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="تعویض آواتار">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="image_path" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove">
                                </label>
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="انصراف avatar"><i class="bi bi-x fs-2"></i></span>
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="حذف آواتار"><i class="bi bi-x fs-2"></i></span>
                            </div>
                            <div class="text-muted fs-7">تصویر کوچک دسته را تنظیم کنید. فقط فایل های تصویری *.png، *.jpg
                                و *.jpeg پذیرفته می شوند
                            </div>
                        </div>

                    </div>

                    <div class="card card-flush py-4" style="height: 210px" data-select2-id="select2-data-130-t5sc">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>وضعیت</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0" data-select2-id="select2-data-129-eku1">
                            <label for="status"></label>
                            <select id="status" class="form-select mb-2" name="status">
                                <option selected="selected" data-select2-id="select2-data-135-v7e1">{{ __('messages.choose') }}</option>
                                <option value="1">{{ __('messages.active') }}</option>
                                <option value="0">{{ __('messages.deactivate') }}</option>
                            </select>
                            @error('status')
                             <div class="alert alert-danger">
                                 {{ $message }}
                             </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>عمومی</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">

                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label for="title" class="required form-label">{{ __('messages.title') }}</label>
                                <input type="text" id="title" name="title" class="form-control mb-2" placeholder="نام دسته بندی" value="{{ old('title') }}">
                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label for="slug" class="required form-label">{{ __('messages.slug') }}</label>
                                <input type="text" id="slug" name="slug" class="form-control mb-2" placeholder="نامک دسته بندی" value="{{ old('slug') }}">
                                @error('slug')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label for="parent" class="required form-label">{{ __('messages.category_parent') }}</label>
                                <select id="parent" name="parent" class="form-select mb-2">
                                    <option  value="">{{ __('messages.choose') }}</option>
                                    @foreach( $categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('parent')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="description" class="form-label">{{ __('messages.description') }}</label>
                                <div class="">
                                    <textarea id="description" rows="10" class="form-control" name="description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="" id="kt_ecommerce_add_product_cancel" class="btn btn-secondary me-5">انصراف</a>
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">ذخیره تغییرات</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>


        {{-- <div class="row d-flex justify-content-start my-4 bg-white">
             <div class="col  my-5">
                 <h3> {{ __('messages.new_category') }}</h3>
             </div>
             <div class="col d-flex justify-content-end my-2">
                 <div>
                     <a href="{{ route('admin.category.index') }}" class="btn  btn-primary">{{ __('messages.categories') }}</a>
                 </div>
             </div>
         </div>
         <form action="{{ route('admin.category.store') }}" method="post">
             @csrf
             <div class="row product-stock-list mt-5 py-5 bg-white">

                 <div class="col-sm-6">
                     <div class="mt-3">
                         <label for=title" class="form-label">{{ __('messages.title') }}</label>
                         <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                     </div>
                     @error('title')
                     <div class="alert alert-danger mt-3">
                         {{ $message }}
                     </div>
                     @enderror
                 </div>


                 <div class="col-sm-6">
                     <div class="mb-3 mt-3">
                         <label for="status" class="form-label">وضعیت دسته بندی:</label>
                         <select class="form-control" wire:model.lazy="status" id="status">
                             <option>انتخاب کنید</option>
                             <option value="0">{{ __('messages.deactivate') }}</option>
                             <option value="1">{{ __('messages.active') }}</option>
                         </select>

                         @error('status')
                         <div class="alert alert-danger mt-3">{{ $message}}</div>
                         @enderror
                     </div>

                 </div>


                 <div class="col-sm-6">
                     <div class=" mb-3 mt-3">
                         <label for="parent" class="form-label">انتخاب دسته بندی والد:</label>
                         <select class="form-control" wire:model.lazy="parent" id="parent">
                             <option value="null">فاقد دسته بندی</option>
                             @foreach($categories as $item)
                                 <option value="{{ $item->id }}">{{ $item->title_persian }}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>


                 <div class="col-lg-4 col-md-4 col-sm-4">
                     <div class="row d-flex flex-column justify-content-center align-content-center">
                         <div class="col-lg-8 top-banner-section">
                             <img src="{{  asset('dash/images/no-image-icon-23494.png') }}"
                                  id="image_view"
                                  class="img-thumbnail" height="300" width="300" alt="image">
                         </div>
                         <div class="col-lg-5">
                             <label for="image_select" class="mt-5 form-label">{{ __('messages.image') }}</label>
                             <input type="file" class="form-control" accept="image/png, image/jpeg , image/jpg ,image/gif" id="image_select" name="image_path">
                             @error('image_path')
                             <div class="alert alert-danger mt-3">
                                 {{ $message }}
                             </div>
                             @enderror
                         </div>
                     </div>

                 </div>

                 <div class="col-12 discount-common-save">
                     <div class="mt-3">
                         <input type="submit" class="btn btn-success" value="{{ __('messages.save') }}">
                     </div>
                 </div>

             </div>

         </form>--}}
    </div>
@endsection
@push('dash_custom_script')
    <script>
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
    </script>
@endpush



