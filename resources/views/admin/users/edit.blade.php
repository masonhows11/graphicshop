@extends('admin.include.master_dash')
@section('dash_page_title')
    {{ __('messages.edit_user') }}
@endsection
@section('breadcrumb')
@endsection

@section('dash_main_content')

    <div class="container-fluid">
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <div class="card-title">
                    <h2>{{ __('messages.add_new_user') }}</h2>
                </div>

            </div>

            <div class="card-body pt-5">

                <form action="{{ route('admin.user.update') }}" method="post" enctype="multipart/form-data" id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
                    @csrf

                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="row">


                        <div class="col-sm-4">
                            <div class="fv-row fv-plugins-icon-container">
                                <div class="card card-flush py-1">

                                    <div class="card-header d-flex justify-content-center">
                                        <div class="card-title">
                                            <h2 class="text-center">{{ __('messages.update_avatar')}}</h2>
                                        </div>
                                    </div>

                                    <div class="card-body mt-4 text-center pt-0">
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
                                        <div class="text-muted fs-7"> فقط فایل های تصویری *.png، *.jpg
                                            و *.jpeg پذیرفته می شوند
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">نام کاربری</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="name" value="{{ $user->name }}">
                                    @error('name')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">ایمیل</span>
                                        </label>
                                        <input type="email" class="form-control form-control-solid" name="email" value="{{ $user->email }}">
                                        @error('email')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">تلفن</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="mobile" value="{{ $user->mobile }}">
                                        @error('mobile')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">نقش</span>
                                        </label>
                                        <select class="form-control form-control-solid" name="role">
                                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }} >کاربر</option>
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }} >ادمین</option>
                                            <option value="seller" {{ $user->role == 'seller' ? 'selected' : '' }} >طراح یا فروشنده</option>
                                        </select>
                                        @error('role')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">نام</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="first_name" value="{{ $user->first_name }}">
                                    @error('first_name')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">نام خانوادگی</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="last_name" value="{{ $user->last_name }}">
                                        @error('last_name')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">کد ملی</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="national_code" value="{{ $user->national_code }}">
                                        @error('national_code')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="separator mb-6"></div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.users.index') }}"  class="btn btn-light me-3">{{ __('messages.cancel') }}</a>

                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                            <span class="indicator-label">{{ __('messages.save') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


