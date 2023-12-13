<div>
    @section('dash_page_title')
        {{ __('messages.payments') }}
    @endsection
    @section('breadcrumb')
        {{--  {{ Breadcrumbs::render('admin.category.index') }}--}}
    @endsection
    <div class="container-fluid">

        <div class="row my-4 bg-white rounded-3">
            <div class="col  my-4">
                <h3 class="h3 my-4"> {{ __('messages.payments') }}</h3>
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
                        <th class="text-muted">{{ __('messages.payment_gateway') }} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $payments as $payment)
                        <tr class="text-center">
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->user->name }}</td>
                            <td>{{ customJalaliDate($payment->created_at) }}</td>
                            <td>{{ priceFormat($payment->amount ) }} {{ __('messages.toman') }}</td>
                            <td>{{ $payment->status  }}</td>
                            <td>{{ $payment->ref_id}}</td>
                            <td>{{ $payment->gateway }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="row d-flex justify-content-center bg-white my-4 ">
            <div class="col-lg-2 col-md-2 my-2 pt-2 pb-2 ">
                {{ $payments->links() }}
            </div>
        </div>

    </div>
</div>
@include('admin.include.alert.alert_response')
