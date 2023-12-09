<div>
    @section('dash_page_title')
        {{ __('messages.products') }}
    @endsection
    @section('breadcrumb')
        {{--  {{ Breadcrumbs::render('admin.category.index') }}--}}
    @endsection

</div>
@include('admin.include.alert.alert_response')
