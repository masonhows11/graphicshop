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
                            <td>{{ $payment->order->user->name }}</td>
                            <td>{{ customJalaliDate($payment->created_at) }}</td>
                            <td>{{ priceFormat($payment->oreder->amount ) }} {{ __('messages.toman') }}</td>
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
@push('dash_custom_script')
    <script type="text/javascript">
        $(document).ready(function () {

            window.addEventListener('show-delete-confirmation', event => {
                Swal.fire({
                    title: 'آیا مطمئن هستید این ایتم حذف شود؟',
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله حذف کن!',
                    cancelButtonText: 'خیر',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('deleteConfirmed')
                    }
                });
            });
            const Toast = Swal.mixin({
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
            window.addEventListener('show-result', ({ detail: {type, message} }) => {
                Toast.fire({
                    icon: type,
                    title: message
                })
            })
            @if( session()->has('warning') )
            Toast.fire({
                icon: 'warning',
                title: '{{ session()->get('warning') }}'
            })
            @elseif( session()->has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session()->get('success') }}'
            })
            @endif

        });

    </script>
@endpush

