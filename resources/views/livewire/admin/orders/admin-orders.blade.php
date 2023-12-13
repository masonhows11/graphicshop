<div>
    @section('dash_page_title')
        {{ __('messages.orders') }}
    @endsection
    @section('breadcrumb')
        {{--  {{ Breadcrumbs::render('admin.category.index') }}--}}
    @endsection
    <div class="container-fluid">

        <div class="row my-4 bg-white rounded-3">
            <div class="col  my-4">
                <h3 class="h3 my-4"> {{ __('messages.orders') }}</h3>
            </div>
            <div class="col-12">
                <div class="mb-3 mt-3">
                    <input wire:model.debounce.500ms="search" placeholder="{{ __('messages.search') }}" type="text"
                           class="form-control" id="search">
                </div>
            </div>
        </div>

        <div class="row  category-list bg-white rounded-3">
            <div class="my-5">
                <table class="table">
                    <thead class="">
                    <tr class="text-center">
                        <th class="text-muted">{{ __('messages.id') }} </th>
                        <th class="text-muted">{{ __('messages.user') }}</th>
                        <th class="text-muted">{{ __('messages.created_at') }}</th>
                        <th class="text-muted">{{ __('messages.single_price') }}</th>
                        <th class="text-muted">{{ __('messages.status')}}</th>
                        <th class="text-muted">{{ __('messages.ref_code')}}</th>
                        <th class="text-muted">{{ __('messages.show_order') }} </th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach( $orders as $order)
                        <tr class="text-center">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ customJalaliDate($order->created_at) }}</td>
                            <td>{{ priceFormat($order->amount ) }} {{ __('messages.toman') }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td><a href="#"><i class="fa fa-shopping-basket"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="row d-flex justify-content-center bg-white my-4 ">
            <div class="col-lg-2 col-md-2 my-2 pt-2 pb-2 ">
               {{ $orders->links() }}
            </div>
        </div>

    </div>
</div>
@include('admin.include.alert.alert_response')
