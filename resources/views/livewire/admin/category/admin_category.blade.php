<div>
    @section('dash_page_title')
        دسته بندی ها
    @endsection
    @section('breadcrumb')
      {{--  {{ Breadcrumbs::render('admin.category.index') }}--}}
    @endsection
    <div class="container-fluid">

        <div class="row my-4 bg-white rounded-3">
            <div class="col  my-4">
                    <h3 class="h3 my-4"> {{ __('messages.categories') }}</h3>
            </div>
            <div class="col d-flex justify-content-end my-4">
                <div>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">{{ __('messages.new_category') }}</a>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3 mt-3">
                    <input wire:model.debounce.500ms="search" placeholder="{{ __('messages.search') }}" type="text" class="form-control" id="search">
                </div>
            </div>
        </div>

        <div class="row  category-list bg-white rounded-3">
            <div class="my-5">
                <table class="table table-striped">
                    <thead class="">
                    <tr class="text-center">
                        <th class="text-muted">{{ __('messages.id') }} </th>
                        <th  class="text-muted">{{ __('messages.title')}}</th>
                        <th  class="text-muted">{{ __('messages.slug') }}</th>
                        <th  class="text-muted">{{ __('messages.category_parent')}}</th>
                        <th  class="text-muted">{{ __('messages.image')}}</th>
                        <th  class="text-muted">{{ __('messages.status')}}</th>
                        <th  class="text-muted">{{ __('messages.detach')}}</th>
                        <th  class="text-muted">{{ __('messages.edit_model')}}</th>
                        <th  class="text-muted">{{ __('messages.delete_model')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $categories as $category)
                        <tr class="text-center">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->parent_id ? $category->parent->title : __('messages.main_category') }}</td>
                            <td><img class="img-thumbnail" src="{{ $category->image_path ?
                                              asset($category->image_path) :
                                              asset('admin_assets/images/no-image-icon-23494.png')  }}"
                                     width="60" height="60" alt="image_category">
                            </td>
                            <td><a href="#" wire:click.prevent="changeState({{ $category->id }})"
                                   class="mx-4 btn btn-sm {{ $category->status === 0 ? 'btn-danger' : 'btn-success' }} ">
                                    {{ $category->status === 0 ? __('messages.deactivate') : __('messages.active') }}
                                </a>
                            </td>
                            <td><a href="#" wire:click.prevent="detachCategory({{ $category->id }})" class="mx-4">
                                    <i class="fa fa-unlink"></i>
                                </a>
                            </td>
                            <td><a href="{{ route('admin.category.edit',['id'=>$category->id]) }}" class="mx-4">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td><a href="#" wire:click.prevent="deleteConfirmation({{ $category->id }})">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="row d-flex justify-content-center bg-white my-4 ">
            <div class="col-lg-2 col-md-2 my-2 pt-2 pb-2 ">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@push('dash_custom_script')
    <script type="text/javascript">
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
    </script>
@endpush
