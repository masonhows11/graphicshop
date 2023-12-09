<div>
    @section('dash_page_title')
        {{ __('messages.products') }}
    @endsection
    @section('breadcrumb')
        {{--  {{ Breadcrumbs::render('admin.category.index') }}--}}
    @endsection
        <div class="container-fluid">

            <div class="row my-4 bg-white rounded-3">
                <div class="col  my-4">
                    <h3 class="h3 my-4"> {{ __('messages.products') }}</h3>
                </div>
                <div class="col d-flex justify-content-end my-4">
                    <div>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">{{ __('messages.new_product') }}</a>
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
                            <th  class="text-muted">{{ __('messages.publish_date') }}</th>
                            <th  class="text-muted">{{ __('messages.image')}}</th>
                            <th  class="text-muted">{{ __('messages.status')}}</th>
                            <th  class="text-muted">{{ __('messages.edit_model')}}</th>
                            <th  class="text-muted">{{ __('messages.delete_model')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $products as $product)
                            <tr class="text-center">
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>{{ customJalaliDate($product->created_at) }}</td>
                                <td><img class="img-thumbnail" src="{{ $product->image_path ?
                                              asset($product->image_path) :
                                              asset('admin_assets/images/no-image-icon-23494.png')  }}"
                                         width="60" height="60" alt="image_category">
                                </td>
                                <td><a href="#" wire:click.prevent="changeState({{ $product->id }})"
                                       class="mx-4 btn btn-sm {{ $product->status === 0 ? 'btn-danger' : 'btn-success' }} ">
                                        {{ $product->status === 0 ? __('messages.deactivate') : __('messages.active') }}
                                    </a>
                                </td>
                                <td><a href="{{ route('admin.product.edit',['id'=>$product->id]) }}" class="mx-4">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td><a href="#" wire:click.prevent="deleteConfirmation({{ $product->id }})">
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
                    {{ $products->links() }}
                </div>
            </div>
        </div>
</div>
@include('admin.include.alert.alert_response')
