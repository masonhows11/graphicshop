<div>
    <main>
        <div class="container">

            <div class="row d-flex justify-content-center">

                @if( count($cartItems) > 0  )
                    <div class="col-lg-9">
                        <div class="cart-content">
                            <div class="title">
                                <h4> سبد خرید </h4>
                            </div>
                            <div class="row shopping-cart-item">
                                <table class="table">
                                    <thead class="">
                                    <tr class="text-center">
                                        <th class="text-muted">{{ __('messages.id') }} </th>
                                        <th class="text-muted">{{ __('messages.title')}}</th>
                                        <th class="text-muted">{{ __('messages.purchase_date') }}</th>
                                        <th class="text-muted">{{ __('messages.demo_link') }}</th>
                                        <th class="text-muted">{{ __('messages.product_price') }}</th>
                                        <th class="text-muted">{{ __('messages.delete_model')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $cartItems as $item )
                                        <tr class="text-center">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->product_title }}</td>
                                            <td>{{ customJalaliDate($item->created_at) }}</td>
                                            <td><img class="img-thumbnail"
                                                     src="{{ $item->demo_url ?asset($item->demo_url) : asset('front_assets/images/no-image-icon-23494.png')  }}"
                                                     width="60" height="60" alt="image_category">
                                            </td>
                                            <td>{{ priceFormat($item->price ) }} {{ __('messages.toman') }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-danger mx-4"
                                                   wire:click.prevent="deleteConfirmation({{ $item->id }})"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <form action="{{ route('payment.pay') }}" method="post">
                                @csrf
                                <div class="row d-flex justify-content-between">
                                    <div class="col">
                                        <div class="my-2"> {{ __('messages.total_price') }} {{ $total_price }} {{ __('messages.toman') }}</div>
                                    </div>
                                    <input type="hidden" name="amount" value="{{ $total_price }}" id="">
                                    <div class="col d-flex justify-content-end">
                                        <div>
                                            <button type="submit" class="btn btn-success">ادامه پرداخت</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                @else
                    <div class="col-lg-9 mb-5" style="height: 280px">
                        <div class="cart-content my-4 d-flex justify-content-center align-items-center h-425px"
                             style="height: 280px">
                            <div>
                                <p class="text-center">{{ __('messages.your_shopping_cart_is_empty') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>


        </div>
    </main>
</div>
@push('front_custom_scripts')
    <script type="text/javascript">
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'آیا مطمئن هستید این ایتم حذف شود؟',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: 'javascript:void(0)3085d6',
                cancelButtonColor: 'javascript:void(0)d33',
                confirmButtonText: 'بله حذف کن!',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            });
        })
    </script>
    <script>
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
        window.addEventListener('show-result', ({detail: {type, message}}) => {
            Swal.fire({
                icon: type,
                text: message,
            });
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
    </script>
@endpush
