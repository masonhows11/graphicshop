<div>
    @section('dash_page_title')
        {{ __('messages.roles_assignment') }}
    @endsection
    @section('breadcrumb')
        {{-- {{ Breadcrumbs::render('admin.roles.assign.users') }}--}}
    @endsection
    <div class="container-fluid">

        <div class="row d-flex justify-content-start my-4 bg-white">
            <div class="col-lg-4 col-md-4 col  my-5  border-bottom title-add-to-stock">
                <div class="alert my-4">
                    <h3>{{ __('messages.roles_assignment') }} / {{ __('messages.admins') }}</h3>
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
                        <th>{{ __('messages.roles') }}</th>
                        <th>{{ __('messages.role_assignment') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($users)
                        @foreach( $users as $user)
                            <tr class="text-center">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->getRoleNames()   ?  implode(" | ",$user->getRoleNames()->toArray()) : null }}</td>
                                <td class="mb-3">
                                    <a href="{{ route('admin.roles.assign.form',['user_id'=>$user->id]) }}"
                                       class="btn btn-primary btn-sm mb-3">
                                        {{ __('messages.role_assignment') }}
                                    </a>
                                </td>
                              {{--  @if( in_array('super_admin',$user->getRoleNames()->toArray()) )
                                    <td class="btn btn-danger mt-2  btn-sm">{{ __('messages.you_do_not_have_access_to_this_section') }}</td>
                                @else
                                    <td class="mb-3">
                                        <a href="{{ route('admin.roles.assign.form',['user_id'=>$user->id]) }}"
                                           class="btn btn-primary btn-sm mb-3">
                                            تخصیص نقش
                                        </a>
                                    </td>
                                @endif--}}
                              {{--  @if( \Illuminate\Support\Facades\Auth::guard('admin')->user()->hasRole('admin'))
                                    <td class="btn btn-danger">{{ __('messages.you_do_not_have_access_to_this_section') }}</td>
                                @else
                                    <td class="mb-3">
                                        <a href="{{ route('admin.roles.assign.form',['user_id'=>$user->id]) }}"
                                           class="btn btn-primary btn-sm mb-3">
                                            تخصیص نقش
                                        </a>
                                    </td>
                                @endif--}}
                            </tr>
                        @endforeach
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
