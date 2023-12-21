<div>
    @section('dash_page_title')
       {{ __('messages.users_management') }}
    @endsection
     @section('breadcrumb')
          {{--  {{ Breadcrumbs::render('admin.users') }}--}}
     @endsection
    <div class="container-fluid">


        <div class="row my-4 bg-white rounded-3">
            <div class="col  my-4">
                <h3 class="h3 my-4"> {{ __('messages.users_management') }} / {{ __('messages.users') }}</h3>
            </div>
            <div class="col d-flex justify-content-end my-4">
                <div>
                    <a href="{{ route('admin.user.create') }}"
                       class="btn btn-primary">{{ __('messages.new_user') }} </a>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3 mt-3">
                    <input wire:model.debounce.500ms="search" placeholder="{{ __('messages.search') }}" type="text"
                           class="form-control" id="search">
                </div>
            </div>
        </div>

        <div class="row admin-list-users bg-white rounded-3">

            <div class="my-5">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>{{__('messages.id')}}</th>
                        <th>{{ __('messages.user_name') }}</th>
                        <th>{{ __('messages.created_at') }}</th>
                        <th>{{ __('messages.edit_model') }}</th>
                        <th>{{ __('messages.delete_model') }}</th>
                        <th>{{ __('messages.status') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($users)
                        @foreach( $users as $user)
                            <tr class="text-center">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ customJalaliDate($user->created_at) }}</td>
                                <td>
                                    <a  href="{{ route('admin.user.edit',$user) }}" class="btn btn-sm btn-primary mx-4">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger mx-4" wire:click.prevent="deleteConfirmation({{ $user->id }})">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" wire:click.prevent="activeUser({{ $user->id }})" class="mx-4 btn btn-sm {{ $user->activate === 0 ? 'btn-danger' : 'btn-success' }} ">
                                        {{ $user->activate === 0 ? __('messages.deactivate') : __('messages.active') }}
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row d-flex justify-content-center bg-white my-4 ">
            <div class="col-lg-2 col-md-2 my-2 pt-2 pb-2 ">
                {{ $users->links() }}
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

{{--@if($user->hasRole('admin'))
@else
    <td class="mb-3">
        <a href="javascript:void(0)"
           class="btn btn-sm btn-danger"
           wire:click.prevent="deleteConfirmation({{ $user->id }})">
            {{ __('messages.delete_model') }}
        </a>
    </td>
    <td class="mb-3">
        <a href="#" wire:click.prevent="activeUser({{ $user->id }})"
           class="btn
                                        {{ $user->activate == 0 ?   'btn-danger' : 'btn-success' }} btn-sm mb-3">
            {{ $user->activate == 0 ? __('messages.deactivate') : __('messages.active') }}
        </a>
    </td>
@endif--}}
