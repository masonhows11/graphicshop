<div class="category-box">
    <h4>دسته‌بندی‌های گرافیک شاپ</h4>
    <div class="row">
        @forelse( $mainCategories as $category)
            <div class="col-4 col-md-3 col-lg text-center">
                <a href="javascript:void(0)">
                    <img src="{{ $category->image_path ? asset('storage/images/category/'.$category->image_path) : asset('default_image/no-image-icon-23494.png') }}" height="64" width="64"  class="mt-2 mb-2" alt="category-image">
                    <p>{{ $category->title }}</p></a>
            </div>
        @empty
            <div class="col-4 col-md-3 col-lg text-center">
                <a href="javascript:void(0)">
                    <img src="{{  asset('default_image/no-image-icon-23494.png') }}" height="64" width="64"  class="mt-2 mb-2" alt="category-image">
                    <p>{{ __('messages.not_record_found') }}</p></a>
            </div>
        @endforelse
    </div>
</div>
