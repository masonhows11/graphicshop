@extends('admin.include.master_dash')
@section('dash_page_title')
    {{ __('messages.edit_category') }}
@endsection
@section('breadcrumb')
@endsection

@section('dash_main_content')

    <div class="container-fluid">
        <div id="kt_content_container" class="container-xxl" data-select2-id="select2-data-kt_content_container">
            <form action="{{ route('admin.category.update') }}" method="post" id="kt_ecommerce_add_category_form"
                  class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
                  data-select2-id="select2-data-kt_ecommerce_add_category_form"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $category->id }}">

                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10" data-select2-id="select2-data-131-q2wc">
                    @if( $category->image_path != null )
                        <div class="card card-flush py-1">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>{{ __('messages.preview_image') }}</h4>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <img src="{{  asset($category->image_path) }}" class="img-thumbnail" width="180" height="180" alt="">
                            </div>
                        </div>
                    @else
                    @endif
                    <div class="card card-flush py-1">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>{{ __('messages.thumbnail_image') }}</h4>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-outline mb-3 image-input-changed" data-kt-image-input="true">
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

                    <div class="card card-flush py-1" style="height: 210px" data-select2-id="select2-data-130-t5sc">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>وضعیت</h4>
                            </div>
                        </div>
                        <div class="card-body pt-0" data-select2-id="select2-data-129-eku1">
                            <label for="status"></label>
                            <select id="status" class="form-select mb-2" name="status">
                                <option selected="selected"
                                        data-select2-id="select2-data-135-v7e1">{{ __('messages.choose') }}</option>
                                <option
                                    value="1" {{ $category->status == 1 ? 'selected' : '' }}>{{ __('messages.active') }}</option>
                                <option
                                    value="0" {{ $category->status == 0 ? 'selected' : '' }}>{{ __('messages.deactivate') }}</option>
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
                                <input type="text" id="title" name="title" class="form-control mb-2"
                                       placeholder="نام دسته بندی" value="{{ $category->title }}">
                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label for="slug" class="required form-label">{{ __('messages.slug') }}</label>
                                <input type="text" id="slug" name="slug" class="form-control mb-2" placeholder="نامک دسته بندی" value="{{ $category->slug }}">
                                @error('slug')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label for="parent"
                                       class="required form-label">{{ __('messages.category_parent') }}</label>
                                <select id="parent" name="parent" class="form-select mb-2">
                                    <option value="">{{ __('messages.choose') }}</option>
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
                                    <textarea id="description" rows="10" class="form-control" name="description">{{ $category->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.category.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-secondary me-5">انصراف</a>
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">ذخیره تغییرات</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection



