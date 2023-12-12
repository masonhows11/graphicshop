@extends('admin.include.master_dash')
@section('dash_page_title')
    {{ __('messages.new_user') }}
@endsection
@section('breadcrumb')
@endsection

@section('dash_main_content')

    <div class="container-fluid">

        <div class="col">

            <div class="card card-flush h-lg-100" id="kt_contacts_main">
                <div class="card-header pt-7" id="kt_chat_contacts_header">
                    <div class="card-title">
                        <i class="ki-duotone ki-badge fs-1 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                        <h2>{{ __('messages.add_new_user') }}</h2>
                    </div>

                </div>

                <div class="card-body pt-5">

                    <form action="{{ route('admin.user.store') }}" method="post" id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
                        @csrf
                        <div class="mb-7">

                            <label class="fs-6 fw-semibold mb-3">
                                <span>بروزرسانی آواتار</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                      aria-label="همه بدهکار هستیم file types: png, jpg, jpeg."
                                      data-bs-original-title="همه بدهکار هستیم file types: png, jpg, jpeg." data-kt-initialized="1">
																	<i class="ki-duotone ki-information fs-7">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																	</i>
																</span>
                            </label>

                            <div class="mt-1">

                                <style>.image-input-placeholder
                                    { background-image: url({{ asset('admin_assets/images/svg/blank-image.svg') }}); }
                                    [data-bs-theme="dark"] .image-input-placeholder
                                    { background-image: url({{ asset('admin_assets/images/svg/blank-image-dark.svg') }}); }</style>

                                <div class="image-input image-input-outline image-input-placeholder image-input-empty image-input-empty" data-kt-image-input="true">
                                    <div class="image-input-wrapper w-100px h-100px" style="background-image: url('')"></div>

                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="تعویض آواتار" data-bs-original-title="تعویض آواتار" data-kt-initialized="1">
                                        <i class="ki-duotone ki-pencil fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="file" name="image_path" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="انصراف avatar" data-bs-original-title="انصراف avatar" data-kt-initialized="1">
																		<i class="ki-duotone ki-cross fs-2">
																			<span class="path1"></span>
																			<span class="path2"></span>
																		</i>
																	</span>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="حذف آواتار" data-bs-original-title="حذف آواتار" data-kt-initialized="1">
																		<i class="ki-duotone ki-cross fs-2">
																			<span class="path1"></span>
																			<span class="path2"></span>
																		</i>
																	</span>

                                </div>

                            </div>

                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">نام</span>
                                <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1">
																	<i class="ki-duotone ki-information fs-7">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																	</i>
																</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" name="name" value="">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>



                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">

                            <div class="col">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">ایمیل</span>
                                        <span class="ms-1" data-bs-toggle="tooltip"
                                              aria-label="Enter the contact's email."
                                              data-bs-original-title="Enter the contact's email." data-kt-initialized="1">
																			<i class="ki-duotone ki-information fs-7">
																				<span class="path1"></span>
																				<span class="path2"></span>
																				<span class="path3"></span>
																			</i>
																		</span>
                                    </label>
                                    <input type="email" class="form-control form-control-solid" name="email" value="">
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>تلفن</span>
                                        <span class="ms-1" data-bs-toggle="tooltip"
                                              aria-label="Enter the contact's phone number (اختیاری)."
                                              data-bs-original-title="Enter the contact's phone number (اختیاری)." data-kt-initialized="1">
																			<i class="ki-duotone ki-information fs-7">
																				<span class="path1"></span>
																				<span class="path2"></span>
																				<span class="path3"></span>
																			</i>
																		</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="phone" value="">
                                </div>
                            </div>
                        </div>



                        <div class="separator mb-6"></div>
                        <div class="d-flex justify-content-end">
                            <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">انصراف</button>

                            <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                <span class="indicator-label">{{ __('messages.save') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



