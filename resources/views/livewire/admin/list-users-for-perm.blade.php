<div>
    @section('dash_page_title')
        {{ __('messages.perms_assignment') }}
    @endsection
    @section('breadcrumb')
        {{-- {{ Breadcrumbs::render('admin.perms.assign.users') }}--}}
    @endsection
    <div class="container-fluid">

        <div class="row d-flex justify-content-start my-4 bg-white">
            <div class="col-lg-4 col-md-4 col  my-5  border-bottom title-add-to-stock">
                <div class="alert my-4">
                    <h3>{{ __('messages.perms_assignment') }} / {{ __('messages.admins') }}</h3>
                </div>
            </div>
        </div>

        <div class="row admin-list-users bg-white">
            <div class="my-2  rounded-3 list-content">
                <table class="table table-striped">
                    <thead class="border-bottom-3 border-top-3">
                    <tr class="text-center">
                        <th>{{ __('messages.id') }}</th>
                        <th>{{ __('messages.user') }}</th>
                        <th>{{ __('messages.perms') }}</th>
                        <th>{{ __('messages.perm_assignment') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset( $users )
                        @if( \Illuminate\Support\Facades\Auth::guard('admin')->user()->hasRole('admin') )
                            @foreach( $users as $user)
                                <tr class="text-center">
                                    @if( in_array('super_admin',$user->getRoleNames()->toArray()) )
                                    @else
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->getPermissionNames() ? implode(" | ", $user->getPermissionNames()->toArray()) : null }}</td>
                                        <td class="mb-3">
                                            <a href="{{ route('admin.perms.assign.form',['user_id'=>$user->id]) }}"
                                               class="btn btn-primary  btn-sm mb-3">
                                                {{ __('messages.perm_assignment') }}
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @elseif(\Illuminate\Support\Facades\Auth::guard('admin')->user()->hasRole('super_admin'))
                            @foreach( $users as $user)
                                <tr class="text-center">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->getPermissionNames() ? implode(" | ", $user->getPermissionNames()->toArray()) : null }}</td>
                                        <td class="mb-3">
                                            <a href="{{ route('admin.perms.assign.form',['user_id'=>$user->id]) }}"
                                               class="btn btn-primary  btn-sm mb-3">
                                                {{ __('messages.perm_assignment') }}
                                            </a>
                                        </td>
                                </tr>
                            @endforeach
                        @endif
                    @endisset
                    </tbody>
                </table>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 mt-5">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

{{-- \Illuminate\Support\Facades\Auth::guard('admin')->user()->hasRole('admin') --}}
