@extends('admin.include.master_dash')
@section('dash_page_title')
    {{ __('messages.new_category') }}
@endsection
@section('breadcrumb')
@endsection

@section('dash_main_content')

    <div class="container-fluid">

        <div class="row d-flex justify-content-start my-4 bg-white">
            <div class="col-lg-4 col-md-4 col  my-5  border-bottom title-add-to-stock">
                <div class="alert my-4">
                    <h3> {{ __('messages.new_category') }}</h3>
                </div>
            </div>
        </div>

        <div class="row my-4 bg-white">
            <div class="col-lg-4 col-md-4 col my-2">
                <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-primary">{{ __('messages.categories') }}</a>
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

        </form>
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



