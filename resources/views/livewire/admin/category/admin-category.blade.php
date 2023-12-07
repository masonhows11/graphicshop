<div>
    <div class="container-fluid">
        <!-- list categories -->

        <div class="row d-flex justify-content-start my-4 bg-white">
            <div class="col-lg-4 col-md-4 col  my-5  border-bottom title-add-to-stock">
                <div class="alert my-4">
                    <h3> {{ __('messages.categories') }}</h3>
                </div>
            </div>
        </div>

        <div class="row my-4 bg-white">
            <div class="col-lg-4 col-md-4 col my-2">
                <a href="{{--{{ route('admin.category.create') }}--}}"
                   class="btn btn-sm btn-primary">{{ __('messages.new_category') }}</a>
            </div>
        </div>

        <div class="row d-flex justify-content-center search-category-section">
            <div class="col">
                <div class="mb-3 mt-3">
                    <input wire:model.debounce.500ms="search" placeholder="{{ __('messages.search') }}" type="text" class="form-control" id="search">
                </div>
            </div>
        </div>

        <div class="row  category-list bg-white">
            <div class="my-5">
                <table class="table table-striped">
                    <thead class="border-bottom-3 border-top-3">
                    <tr class="text-center">
                        <th>{{ __('messages.id') }} </th>
                        <th>{{ __('messages.name')}}</th>
                        <th>{{ __('messages.category_parent')}}</th>
                        <th>{{ __('messages.image')}}</th>
                        <th>{{ __('messages.status')}}</th>
                        <th>{{ __('messages.Detach')}}</th>
                        <th>{{ __('messages.edit_model')}}</th>
                        <th>{{ __('messages.delete_model')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr class="text-center">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->parent_id ? $category->parent->title : __('messages.main_category') }}</td>
                            <td><img src="{{ $category->image_path ?
                                              asset('storage/images/category/'.$category->image_path) :
                                              asset('dash/images/no-image-icon-23494.png')  }}"
                                     width="100" height="100" alt="image_category">
                            </td>
                            <td><a href="#" wire:click.prevent="changeState({{ $category->id }})"
                                   class="mx-4 btn btn-sm {{ $category->is_active === 0 ? 'btn-danger' : 'btn-success' }} ">
                                    {{ $category->is_active === 0 ? __('messages.deactivate') : __('messages.active') }}
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
        @if(session()->has('warning'))
        Toast.fire({
            icon: 'warning',
            title: '{{ session()->get('warning') }}'
        })
        @elseif(session()->has('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session()->get('success') }}'
        })
        @endif
    </script>
@endpush
