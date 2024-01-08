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

        <div class="row  order-list bg-white rounded-3">
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
                            <td>{{ $order->order_status == 1 ? __('messages.unpaid') : __('messages.paid')  }}</td>
                            <td>{{ $order->payment_number }}</td>
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

